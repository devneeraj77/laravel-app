<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class PublicBlogController extends Controller
{
    public function index()
    {
        $posts = Post::published()->paginate(6);
        $categories = Category::all();
        return view('blog.index', compact('posts', 'categories'));
    }

    public function show($category, $slug)
    {
        $post = Post::with('faqs')->where('slug', $slug)->whereHas('category', function ($query) use ($category) {
            $query->where('slug', $category);
        })->firstOrFail();
        $categories = Category::all();

        return view('blog.show', compact('post', 'categories'));
    }

    public function showCategory($category)
    {
        $category = Category::where('slug', $category)->firstOrFail();
        $posts = $category->posts()->published()->paginate(6);
        $categories = Category::all();

        return view('blog.showCategory', compact('posts', 'category', 'categories'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        if (empty($query)) {
            return view('blog._posts', ['posts' => []]);
        }

        $posts = Post::with(['category', 'author', 'imageAsset'])
            ->where(function ($q) use ($query) {
                $q->where('title', 'LIKE', "%{$query}%")
                    ->orWhere('content', 'LIKE', "%{$query}%")
                    ->orWhereHas('author', function ($subq) use ($query) {
                        $subq->where('name', 'LIKE', "%{$query}%");
                    });
            })
            ->published()
            ->get();

        return view('blog._posts', compact('posts'));
    }
}
