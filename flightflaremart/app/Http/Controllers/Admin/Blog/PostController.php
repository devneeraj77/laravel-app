<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User; // Assuming User model is needed for author assignment
use App\Models\Category; // Assuming Category model is needed for relationships
use App\Http\Requests\Admin\Blog\PostRequest;
use App\Models\Admin;
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
     * Show the form for creating a new post.
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

        // Handle slug generation if not provided, ensuring uniqueness
        $data['slug'] = Str::slug($data['slug'] ?? $data['title']);

        // Set 'is_published' boolean based on checkbox submission
        $data['is_published'] = $request->has('is_published');

        // Set 'published_at' if it's published and not already set
        if ($data['is_published'] && empty($data['published_at'])) {
            $data['published_at'] = now();
        } elseif (!$data['is_published']) {
            $data['published_at'] = null; // Clear publication date if unpublished
        }

        Post::create($data);

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
        $authors = User::all(['id', 'name']);

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

        // Handle slug generation if not provided, ensuring uniqueness
        $data['slug'] = Str::slug($data['slug'] ?? $data['title']);

        // Set 'is_published' boolean
        $data['is_published'] = $request->has('is_published');

        // Set 'published_at' logic for update
        if ($data['is_published'] && is_null($post->published_at)) {
            $data['published_at'] = now();
        } elseif (!$data['is_published']) {
            $data['published_at'] = null; // Clear publication date if unpublished
        }

        $post->update($data);

        return redirect()->route('admin.blog.posts.index')->with('success', 'Post updated successfully!');
    }

    /**
     * Remove the specified post from storage.
     * @param Post $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Post $post)
    {
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
