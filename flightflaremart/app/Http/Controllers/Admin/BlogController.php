<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post; // Assuming you have a Post model
use Illuminate\Http\Request;

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
        // 1. Validation will go here
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required', // This is the rich text field
            // Add other fields like 'slug', 'image', etc.
        ]);

        // 2. Logic to save the post to the database will go here
        // e.g., Post::create($request->all());

        // 3. Redirect back with a success message
        return redirect()->route('admin.blog.index')->with('success', 'Blog post created successfully!');
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