<?php
namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User; // Assuming User model is needed for author assignment
use App\Models\Category; // Assuming Category model is needed for relationships
use App\Http\Requests\Admin\Blog\PostRequest;
use App\Models\Admin;
use App\Models\Faq;
use App\Models\ImageAsset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log; // Added for logging
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use App\Jobs\PingSearchEngines;

class PostController extends Controller
{
    /**
     * Display a listing of the posts.
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $query = Post::with(['author', 'category'])->latest();

        if ($request->filled('title')) {
            $query->where('title', 'like', '%' . $request->title . '%');
        }

        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        if ($request->filled('author')) {
            $query->where('admin_id', $request->author);
        }

        if ($request->filled('status')) {
            $isPublished = $request->status === 'published';
            $query->where('is_published', $isPublished);
        }

        $posts = $query->paginate(10)->withQueryString();
        
        $categories = Category::orderBy('name')->get();
        $authors = Admin::orderBy('name')->get();

        return view('admin.blog.posts.index', compact('posts', 'categories', 'authors'));
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
        
        $post = Post::create($data);

        if ($post->is_published) {
            PingSearchEngines::dispatch();
        }

        $this->syncFaqs($post, $data['faqs'] ?? []);

        if ($request->hasFile('image_upload')) {
            Log::info('Image upload detected for new post.');
            $file = $request->file('image_upload');
            Log::info('Original Filename: ' . $file->getClientOriginalName() . ', Mime Type: ' . $file->getMimeType() . ', Size: ' . $file->getSize());

            if (!extension_loaded('gd')) {
                Log::error('GD library is not installed or enabled.');
                return back()->withInput()->with('error', 'Image processing requires the GD library, which is not enabled on the server.');
            }

            try {
                Log::info('Starting image processing with Intervention Image.');
                $manager = new ImageManager(new Driver());
                $image = $manager->read($file);
                
                $webpPath = 'blog/post/images/' . Str::random(40) . '.webp';
                Log::info('Generated new WebP path: ' . $webpPath);
                
                $encoded = $image->toWebp(25);
                Log::info('Image encoded to WebP format.');

                Storage::disk('public')->makeDirectory(dirname($webpPath));
                Storage::disk('public')->put($webpPath, (string) $encoded);

                Log::info('Image saved successfully to disk.');

                $post->imageAsset()->create(['path' => $webpPath]);
                Log::info('ImageAsset record created for uploaded file.');

            } catch (\Throwable $e) {
                Log::error('Image Upload Error in store method: ' . $e->getMessage(), ['trace' => $e->getTraceAsString()]);
                return back()->withInput()->with('error', 'Failed to upload image. Please try again. Check logs for details.');
            }
        } elseif ($request->filled('image_url')) {
            Log::info('Image URL detected for new post: ' . $request->input('image_url'));
            $post->imageAsset()->create(['path' => $request->input('image_url')]);
            Log::info('ImageAsset record created for image URL.');
        } else {
            Log::info('No image upload or URL provided for new post.');
        }

        return redirect()->route('admin.blog.posts.index')->with('success', "Post '{$post->title}' created successfully!");
    }

    /**
     * Show the form for editing the specified post.
     * @param Post $post
     * @return \Illuminate\View\View
     */
    public function edit(Post $post)
    {
        $post->load('faqs');
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
        
        $post->update($data);

        $this->syncFaqs($post, $data['faqs'] ?? []);

        // Handle image update
        if ($request->hasFile('image_upload')) {
            Log::info('Image upload detected for post update (Post ID: ' . $post->id . ').');
            $file = $request->file('image_upload');
            Log::info('Original Filename: ' . $file->getClientOriginalName() . ', Mime Type: ' . $file->getMimeType() . ', Size: ' . $file->getSize());

            if (!extension_loaded('gd')) {
                Log::error('GD library is not installed or enabled.');
                return back()->withInput()->with('error', 'Image processing requires the GD library, which is not enabled on the server.');
            }

            try {
                if ($post->imageAsset) {
                    Log::info('Existing imageAsset found for post ' . $post->id . '. Deleting old asset.');
                    $post->imageAsset->delete();
                    Log::info('Old ImageAsset record deleted.');
                }

                Log::info('Starting image processing with Intervention Image for post update.');
                $manager = new ImageManager(new Driver());
                $image = $manager->read($file);

                $webpPath = 'blog/post/images/' . Str::random(40) . '.webp';
                Log::info('Generated new WebP path for post update: ' . $webpPath);
                
                $encoded = $image->toWebp(25);
                Log::info('Image encoded to WebP format for post update.');

                Storage::disk('public')->makeDirectory(dirname($webpPath));
                Storage::disk('public')->put($webpPath, (string) $encoded);

                Log::info('Updated image saved successfully to disk.');

                $post->imageAsset()->create(['path' => $webpPath]);
                Log::info('New ImageAsset record created for updated file.');
            } catch (\Throwable $e) {
                Log::error('Image Upload Error in update method: ' . $e->getMessage(), ['trace' => $e->getTraceAsString()]);
                return back()->withInput()->with('error', 'Failed to upload image during update. Please try again. Check logs for details.');
            }
        } elseif ($request->filled('image_url')) {
            Log::info('Image URL detected for post update (Post ID: ' . $post->id . '): ' . $request->input('image_url'));
            try {
                if ($post->imageAsset) {
                    Log::info('Existing imageAsset found for post ' . $post->id . '. Deleting old asset.');
                    $post->imageAsset->delete();
                    Log::info('Old ImageAsset record deleted.');
                }

                $post->imageAsset()->create(['path' => $request->input('image_url')]);
                Log::info('New ImageAsset record created for image URL.');
            } catch (\Exception $e) {
                Log::error('Image Process Error in update method with new URL: ' . $e->getMessage(), ['trace' => $e->getTraceAsString()]);
                return back()->withInput()->with('error', 'Failed to process image during update with new URL. Please try again.');
            }
        } elseif ($request->boolean('clear_image') && $post->imageAsset) {
            Log::info('Clear image option detected for post update (Post ID: ' . $post->id . ').');
            try {
                $post->imageAsset->delete();
                Log::info('ImageAsset record deleted during clear.');
            } catch (\Exception $e) {
                Log::error('Image Clear Error in update method: ' . $e->getMessage(), ['trace' => $e->getTraceAsString()]);
                return back()->withInput()->with('error', 'Failed to clear image. Please try again.');
            }
        } else {
            Log::info('No image upload, URL, or clear option provided for post update (Post ID: ' . $post->id . ').');
        }

        return redirect()->route('admin.blog.posts.index')->with('success', "Post '{$post->title}' updated successfully!");
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
            $post->imageAsset->delete(); 
        } else {
            Log::info('No ImageAsset found for Post ID: ' . $post->id . '.');
        }
        $post->delete();

        return redirect()->route('admin.blog.posts.index')->with('success', "Post '{$post->title}' deleted successfully!");
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

        if ($post->is_published) {
            PingSearchEngines::dispatch();
        }

        $status = $post->is_published ? 'published' : 'draft';
        return back()->with('success', "Post marked as {$status} successfully!");
    }

    private function syncFaqs(Post $post, array $faqsData): void
    {
        $existingFaqIds = $post->faqs->pluck('id')->all();
        $incomingFaqIds = [];

        foreach ($faqsData as $faqData) {
            if (empty($faqData['question']) && empty($faqData['answer'])) {
                continue;
            }

            $faqId = $faqData['id'] ?? null;
            if ($faqId) {
                $incomingFaqIds[] = (int)$faqId;
                $faq = Faq::find($faqId);
                if ($faq) {
                    $faq->update([
                        'question' => $faqData['question'],
                        'answer' => $faqData['answer'],
                    ]);
                }
            } else {
                $post->faqs()->create([
                    'question' => $faqData['question'],
                    'answer' => $faqData['answer'],
                ]);
            }
        }

        $idsToDelete = array_diff($existingFaqIds, $incomingFaqIds);
        if (!empty($idsToDelete)) {
            Faq::destroy($idsToDelete);
        }
    }
}
