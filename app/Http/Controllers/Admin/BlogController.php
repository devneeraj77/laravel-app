<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post; // Assuming you have a Post model
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Support\Facades\Log;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class BlogController extends Controller
{
    /**
     * Display a listing of all posts for the admin.
     * 
     */
   public function create()
    {
        // This returns the view you specified
        return view('admin.blog.AddNewPost');
    }

    /**
     * Store a newly created blog post in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'nullable|string|max:1000',
            'content' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'image_url' => 'nullable|url',
            'image_upload' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'is_published' => 'nullable|boolean',
            'published_at' => 'nullable|date',
            'caption' => 'nullable|string|max:255', // Add caption validation
        ]);

        $post = Post::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'excerpt' => $request->excerpt,
            'content' => $request->content,
            'category_id' => $request->category_id,
            'admin_id' => auth('admin')->id(),
            'is_published' => $request->has('is_published'),
            'published_at' => $request->published_at,
        ]);

        if ($request->has('image_url')) {
            $imageAsset = new \App\Models\ImageAsset([
                'url' => $request->image_url,
                'is_url' => true,
                'post_id' => $post->id,
                'cloudinary_id' => null,
                'caption' => $request->caption, // Pass caption
            ]);
            $imageAsset->save();
        } elseif ($request->hasFile('image_upload')) {
            try {
                $uploadedFileUrl = Cloudinary::upload($request->file('image_upload')->getRealPath())->getSecurePath();
                $publicId = Cloudinary::getPublicId();

                $imageAsset = new \App\Models\ImageAsset([
                    'url' => $uploadedFileUrl,
                    'is_url' => false,
                    'post_id' => $post->id,
                    'cloudinary_id' => $publicId,
                    'caption' => $request->caption, // Pass caption
                ]);
                $imageAsset->save();
            } catch (\Exception $e) {
                // Log the exception for debugging
                Log::error('Cloudinary upload failed in store method: ' . $e->getMessage());
                return redirect()->back()->withInput()->with('error', 'The image upload failed. Please check your Cloudinary configuration and try again.');
            }
        }

        return redirect()->route('admin.posts.index')->with('success', 'Blog post created successfully!');
    }

    /**
     * Show the form for editing the specified blog post.
     */
    public function edit(Post $post)
    {
        return view('admin.blog.AddNewPost', compact('post'));
    }

    /**
     * Update the specified blog post in storage.
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'nullable|string|max:1000',
            'content' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'image_url' => 'nullable|url', // This is now for direct URL input
            'image_upload' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048', // This is for file uploads via cld-upload-button
            'is_published' => 'nullable|boolean',
            'published_at' => 'nullable|date',
            'clear_image' => 'nullable|boolean',
            'image_source' => 'required|in:url,upload', // Validate the radio button selection
        ]);

        $post->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'excerpt' => $request->excerpt,
            'content' => $request->content,
            'category_id' => $request->category_id,
            'is_published' => $request->has('is_published'),
            'published_at' => $request->published_at,
        ]);

        // Existing image handling logic
        $currentImageAsset = $post->imageAsset;

        // Handle image clearing
        if ($request->has('clear_image')) {
            if ($currentImageAsset) {
                $currentImageAsset->delete();
                $post->imageAsset()->dissociate(); // Remove association from post
                $currentImageAsset = null; // Clear current asset after deletion
            }
        }

        // Handle new image based on image_source
        if ($request->input('image_source') === 'url') {
            $imageUrl = $request->input('image_url');

            if (!empty($imageUrl)) {
                // If a new URL is provided, update or create ImageAsset
                if ($currentImageAsset) {
                    // If existing asset is not a URL, delete it first
                    if (!$currentImageAsset->is_url) {
                        $currentImageAsset->delete();
                    } else {
                        // If it's an existing URL, just update it
                        $currentImageAsset->update(['url' => $imageUrl]);
                        goto endImageHandling; // Skip creating new asset
                    }
                }
                // Create new image asset for URL
                $newImageAsset = new \App\Models\ImageAsset([
                    'url' => $imageUrl,
                    'is_url' => true,
                    'post_id' => $post->id,
                    'cloudinary_id' => null,
                ]);
                $newImageAsset->save();
            } else {
                // If image_source is 'url' but image_url is empty, clear existing image
                if ($currentImageAsset) {
                    $currentImageAsset->delete();
                    $post->imageAsset()->dissociate();
                }
            }
        } elseif ($request->input('image_source') === 'upload') {
            if ($request->hasFile('image_upload')) {
                // If a new file is uploaded, delete existing asset first
                if ($currentImageAsset) {
                    $currentImageAsset->delete();
                }
                try {
                    $uploadedFileUrl = Cloudinary::upload($request->file('image_upload')->getRealPath())->getSecurePath();
                    $publicId = Cloudinary::getPublicId();

                    $newImageAsset = new \App\Models\ImageAsset([
                        'url' => $uploadedFileUrl,
                        'is_url' => false,
                        'post_id' => $post->id,
                        'cloudinary_id' => $publicId,
                    ]);
                    $newImageAsset->save();
                } catch (\Exception $e) {
                    Log::error('Cloudinary upload failed in update method: ' . $e->getMessage());
                    return redirect()->back()->withInput()->with('error', 'The image upload failed. Please check your Cloudinary configuration and try again.');
                }
            }
            // If image_source is 'upload' but no file is uploaded, keep existing image unless clear_image was checked
            // (handled by clear_image block above)
        }

        endImageHandling:; // Label for goto

        return redirect()->route('admin.posts.index')->with('success', 'Blog post updated successfully!');
    }

    public function allPosts()
    {
        // 1. Fetch all posts (or paginate them for a real application)
        // For testing, we will pass a simple array if the Post model doesn't exist yet.
        try {
            $posts = Post::all()->sortByDesc('created_at');
        } catch (\Throwable $th) {
            // Fallback for testing if the DB/Model is not set up
            $posts = collect([
                (object)['id' => 1, 'title' => 'First Test Post', 'slug' => 'first-test-post', 'created_at' => now()],
                (object)['id' => 2, 'title' => 'Second Test Post', 'slug' => 'second-test-post', 'created_at' => now()],
                (object)['id' => 3, 'title' => 'thrid Test Post', 'slug' => 'third-test-post', 'created_at' => now()->subDay()],
            ]);
        }
        
        // 2. Return the view with the data
        return view('admin.blog.allposts', compact('posts'));
    }
}