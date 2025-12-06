<?php
namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User; // Assuming User model is needed for author assignment
use App\Models\Category; // Assuming Category model is needed for relationships
use App\Http\Requests\Admin\Blog\PostRequest;
use App\Models\Admin;
use App\Models\ImageAsset;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log; // Added for logging
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the posts.
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Fetch all posts, ordered by latest, with relationships
        $posts = Post::with(['author', 'category'])->latest()->paginate(10);
        return view('admin.blog.posts.index', compact('posts'));
    }

    /**
     * Display a listing of the draft posts.
     * @return \Illuminate\View\View
     */
    public function drafts()
    {
        // Fetch all posts, ordered by latest, with relationships
        $posts = Post::with(['author', 'category'])->where('is_published', false)->latest()->paginate(10);
        return view('admin.blog.posts.drafts', compact('posts'));
    }

    /**
     * Show the for for creating a new post.
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // Get necessary data for the form (e.g., categories and authors)
        $post = new Post();
        $categories = Category::all();
        // Assuming all users can be authors
        $authors = Admin::select('id', 'name')->get();

        return view('admin.blog.posts.create', compact('post', 'categories', 'authors'));
    }

    /**
     * Store a newly created post in storage.
     * @param PostRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PostRequest $request)
    {
        $data = $request->validated();
        
        // Create the post first
        $post = Post::create($data);

        if ($request->hasFile('image_upload')) {
            Log::info('Image upload detected for new post.');
            $file = $request->file('image_upload');
            Log::info('Original Filename: ' . $file->getClientOriginalName() . ', Mime Type: ' . $file->getMimeType());

            try {
                $imagePath = $file->store('blog/post/images', 'public');
                Log::info('Image stored at: ' . $imagePath);

                $post->imageAsset()->create([
                    'path' => $imagePath,
                ]);
                Log::info('ImageAsset record created for uploaded file.');
            } catch (\Exception $e) {
                Log::error('Image Upload Error in store method: ' . $e->getMessage(), ['trace' => $e->getTraceAsString()]);
                return back()->withInput()->with('error', 'Failed to upload image. Please try again.');
            }
        } elseif ($request->filled('image_url')) {
            Log::info('Image URL detected for new post: ' . $request->input('image_url'));
            $post->imageAsset()->create([
                'path' => $request->input('image_url'),
            ]);
            Log::info('ImageAsset record created for image URL.');
        } else {
            Log::info('No image upload or URL provided for new post.');
        }

        return redirect()->route('admin.blog.posts.index')->with('success', 'Post created successfully!');
    }

    /**
     * Show the form for editing the specified post.
     * @param Post $post
     * @return \Illuminate\View\View
     */
    public function edit(Post $post)
    {
        $categories = Category::all(['id', 'name']);
        $authors = Admin::select('id', 'name')->get();

        return view('admin.blog.posts.edit', compact('post', 'categories', 'authors'));
    }

    /**
     * Update the specified post in storage.
     * @param PostRequest $request
     * @param Post $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(PostRequest $request, Post $post)
    {
        $data = $request->validated();
        
        // Update the post
        $post->update($data);

        // Handle image update
        if ($request->hasFile('image_upload')) {
            Log::info('Image upload detected for post update (Post ID: ' . $post->id . ').');
            $file = $request->file('image_upload');
            Log::info('Original Filename: ' . $file->getClientOriginalName() . ', Mime Type: ' . $file->getMimeType());

            try {
                // Delete old image from local storage if it exists
                if ($post->imageAsset) {
                    Log::info('Existing imageAsset found for post ' . $post->id . '. Deleting old asset.');
                    $post->imageAsset->delete(); // The model event will handle file deletion
                    Log::info('Old ImageAsset record deleted.');
                }

                $imagePath = $file->store('blog/post/images', 'public');
                Log::info('New image stored at: ' . $imagePath);

                $post->imageAsset()->create([
                    'path' => $imagePath,
                ]);
                Log::info('New ImageAsset record created for uploaded file.');
            } catch (\Exception $e) {
                Log::error('Image Upload Error in update method: ' . $e->getMessage(), ['trace' => $e->getTraceAsString()]);
                return back()->withInput()->with('error', 'Failed to upload image during update. Please try again.');
            }
        } elseif ($request->filled('image_url')) {
            Log::info('Image URL detected for post update (Post ID: ' . $post->id . '): ' . $request->input('image_url'));
            try {
                // If a new URL is provided, and there was an old image, delete it
                if ($post->imageAsset) {
                    Log::info('Existing imageAsset found for post ' . $post->id . '. Deleting old asset.');
                    $post->imageAsset->delete(); // The model event will handle file deletion
                    Log::info('Old ImageAsset record deleted.');
                }

                $post->imageAsset()->create([
                    'path' => $request->input('image_url'),
                ]);
                Log::info('New ImageAsset record created for image URL.');
            } catch (\Exception $e) {
                Log::error('Image Process Error in update method with new URL: ' . $e->getMessage(), ['trace' => $e->getTraceAsString()]);
                return back()->withInput()->with('error', 'Failed to process image during update with new URL. Please try again.');
            }
        } elseif ($request->boolean('clear_image') && $post->imageAsset) {
            Log::info('Clear image option detected for post update (Post ID: ' . $post->id . ').');
            try {
                // Option to clear existing image without uploading new one
                $post->imageAsset->delete();
                Log::info('ImageAsset record deleted during clear.');
            } catch (\Exception $e) {
                Log::error('Image Clear Error in update method: ' . $e->getMessage(), ['trace' => $e->getTraceAsString()]);
                return back()->withInput()->with('error', 'Failed to clear image. Please try again.');
            }
        } else {
            Log::info('No image upload, URL, or clear option provided for post update (Post ID: ' . $post->id . ').');
        }

        return redirect()->route('admin.blog.posts.index')->with('success', 'Post updated successfully!');
    }

    /**
     * Remove the specified post from storage.
     * @param Post $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Post $post)
    {
        Log::info('Destroy method called for Post ID: ' . $post->id);
        if ($post->imageAsset) {
            Log::info('ImageAsset found for Post ID: ' . $post->id . '. Triggering delete on ImageAsset.');
            // The ImageAsset model's deleting event will handle local file deletion.
            $post->imageAsset->delete(); 
        } else {
            Log::info('No ImageAsset found for Post ID: ' . $post->id . '.');
        }
        $post->delete();

        return redirect()->route('admin.blog.posts.index')->with('success', 'Post deleted successfully!');
    }

    /**
     * Toggle the publish status of the specified post.
     * @param Post $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function togglePublish(Post $post)
    {
        $post->is_published = !$post->is_published;
        if ($post->is_published && is_null($post->published_at)) {
            $post->published_at = now();
        } elseif (!$post->is_published) {
            $post->published_at = null;
        }
        $post->save();

        $status = $post->is_published ? 'published' : 'draft';
        return back()->with('success', "Post marked as {$status} successfully!");
    }
}
