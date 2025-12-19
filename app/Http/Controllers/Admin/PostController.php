<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\ImageAsset;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage; // Added for local storage
use Illuminate\Support\Str; // For slug generation

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with('category', 'author', 'imageAsset')->latest()->paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $post = new Post();
        return view('admin.posts.create', compact('categories', 'post'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255|unique:posts,title',
            'content' => 'required|string',
            'excerpt' => 'nullable|string|max:500',
            'category_id' => 'required|exists:categories,id',
            'is_published' => 'boolean',
            'image_upload' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048', // 2MB Max
            'faqs' => 'array',
            'faqs.*.id' => 'sometimes|nullable|integer|exists:faqs,id',
            'faqs.*.question' => 'required_with:faqs.*.answer|string|max:500',
            'faqs.*.answer' => 'required_with:faqs.*.question|string',
        ]);

        $post = new Post();
        $post->title = $validated['title'];
        $post->slug = Str::slug($validated['title']);
        $post->content = $validated['content'];
        $post->excerpt = $validated['excerpt'];
        $post->category_id = $validated['category_id'];
        $post->admin_id = auth()->guard('admin')->id(); // Assuming authenticated admin
        $post->is_published = $request->has('is_published');
        $post->published_at = $post->is_published ? now() : null;
        $post->save();

        if ($request->hasFile('image_upload')) {
            Log::info('Image upload detected for new post.');
            $file = $request->file('image_upload');
            Log::info('Original Filename: ' . $file->getClientOriginalName() . ', Mime Type: ' . $file->getMimeType());

            try {
                $imagePath = $file->store('post_images', 'public');
                Log::info('Image stored at: ' . $imagePath);

                ImageAsset::create([
                    'path' => $imagePath, // Use 'path' column for local storage
                    'post_id' => $post->id,
                ]);
                Log::info('ImageAsset record created for uploaded file.');
            } catch (\Exception $e) {
                Log::error('Image Upload Error in store method: ' . $e->getMessage(), ['trace' => $e->getTraceAsString()]);
                return back()->withInput()->with('error', 'Failed to upload image. Please try again.');
            }
        } else {
            Log::info('No image upload provided for new post.');
        }

        // Save FAQs
        Log::info('Attempting to save FAQs for new post. Request has faqs: ' . ($request->has('faqs') ? 'true' : 'false'));
        if ($request->has('faqs')) {
            foreach ($request->input('faqs') as $faqData) {
                if (!empty($faqData['question']) && !empty($faqData['answer'])) {
                    Log::info('Creating FAQ for post ' . $post->id . ': ' . json_encode($faqData));
                    $post->faqs()->create([
                        'question' => $faqData['question'],
                        'answer' => $faqData['answer'],
                    ]);
                }
            }
            Log::info('Finished saving FAQs for new post.');
        }

        return redirect()->route('admin.posts.index')->with('success', 'Post created successfully!');
    }



    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        $post->load('imageAsset', 'faqs'); // Eager load image asset and faqs for the form
        return view('admin.posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255|unique:posts,title,' . $post->id,
            'content' => 'required|string',
            'excerpt' => 'nullable|string|max:500',
            'category_id' => 'required|exists:categories,id',
            'is_published' => 'boolean',
            'image_upload' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048', // 2MB Max
            'faqs' => 'array',
            'faqs.*.id' => 'sometimes|nullable|integer|exists:faqs,id',
            'faqs.*.question' => 'required_with:faqs.*.answer|string|max:500',
            'faqs.*.answer' => 'required_with:faqs.*.question|string',
        ]);

        $post->title = $validated['title'];
        $post->slug = Str::slug($validated['title']);
        $post->content = $validated['content'];
        $post->excerpt = $validated['excerpt'];
        $post->category_id = $validated['category_id'];
        $post->is_published = $request->has('is_published');
        $post->published_at = $post->is_published ? ($post->published_at ?? now()) : null; // Keep old date if exists
        $post->save();

        // Handle image update
        if ($request->hasFile('image_upload')) {
            Log::info('New image upload detected for post update (Post ID: ' . $post->id . ').');
            // Delete old image if it exists
            if ($post->imageAsset) {
                Log::info('Existing ImageAsset found for post ' . $post->id . '. Deleting old record.');
                // The ImageAsset model's deleting event will handle storage deletion.
                $post->imageAsset->delete();
            }

            $file = $request->file('image_upload');
            $imagePath = $file->store('post_images', 'public');
            Log::info('New image stored at: ' . $imagePath);

            ImageAsset::create([
                'path' => $imagePath, // Use 'path' column for local storage
                'post_id' => $post->id,
            ]);
            Log::info('New ImageAsset record created for uploaded file.');
        } elseif ($request->boolean('clear_image') && $post->imageAsset) {
            Log::info('Clear image option detected for post update (Post ID: ' . $post->id . ').');
            // Delete old image
            $post->imageAsset->delete(); // This triggers the model's deleting event
            Log::info('ImageAsset record deleted during clear.');
        } else {
            Log::info('No new image upload or clear option provided for post update (Post ID: ' . $post->id . ').');
        }

        // Sync FAQs
        Log::info('Attempting to sync FAQs for post ' . $post->id . '. Request has faqs: ' . ($request->has('faqs') ? 'true' : 'false'));
        $incomingFaqs = $request->input('faqs', []);
        $existingFaqIds = $post->faqs->pluck('id')->toArray();
        $incomingFaqIds = [];

        foreach ($incomingFaqs as $faqData) {
            if (!empty($faqData['question']) && !empty($faqData['answer'])) {
                if (isset($faqData['id']) && in_array($faqData['id'], $existingFaqIds)) {
                    // Update existing FAQ
                    $faq = $post->faqs()->where('id', $faqData['id'])->first();
                    if ($faq) {
                        Log::info('Updating FAQ ID ' . $faqData['id'] . ' for post ' . $post->id . ': ' . json_encode($faqData));
                        $faq->update([
                            'question' => $faqData['question'],
                            'answer' => $faqData['answer'],
                        ]);
                    }
                    $incomingFaqIds[] = $faqData['id'];
                } else {
                    // Create new FAQ
                    Log::info('Creating new FAQ for post ' . $post->id . ': ' . json_encode($faqData));
                    $newFaq = $post->faqs()->create([
                        'question' => $faqData['question'],
                        'answer' => $faqData['answer'],
                    ]);
                    $incomingFaqIds[] = $newFaq->id;
                }
            }
        }
        Log::info('Finished processing incoming FAQs for post ' . $post->id . '. Incoming FAQ IDs: ' . json_encode($incomingFaqIds));

        // Delete FAQs that were removed from the form
        $faqsToDelete = array_diff($existingFaqIds, $incomingFaqIds);
        if (!empty($faqsToDelete)) {
            Log::info('Deleting FAQs for post ' . $post->id . '. IDs to delete: ' . json_encode($faqsToDelete));
            $post->faqs()->whereIn('id', $faqsToDelete)->delete();
        }
        Log::info('Finished syncing FAQs for post ' . $post->id . '.');

        return redirect()->route('admin.posts.index')->with('success', 'Post updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        Log::info('Destroy method called for Post ID: ' . $post->id);
        if ($post->imageAsset) {
            Log::info('ImageAsset found for Post ID: ' . $post->id . '. Triggering delete on ImageAsset.');
            $post->imageAsset->delete(); // This will trigger the ImageAsset model's deleting event
        } else {
            Log::info('No ImageAsset found for Post ID: ' . $post->id . '.');
        }

        $post->delete();
        Log::info('Post deleted successfully (ID: ' . $post->id . ').');

        return redirect()->route('admin.posts.index')->with('success', 'Post deleted successfully!');
    }

    /**
     * Toggle the publish status of the specified resource.
     */
    public function togglePublish(Post $post)
    {
        $post->is_published = !$post->is_published;
        $post->published_at = $post->is_published ? ($post->published_at ?? now()) : null;
        $post->save();

        return back()->with('success', 'Post publish status updated successfully!');
    }
}
