<?php

namespace App\View\Components;

use App\Models\Post;
use Illuminate\View\Component;

class LatestBlogPosts extends Component
{
    public $posts;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->posts = Post::with('category', 'author')
            ->published()
            ->whereNotNull('category_id')
            ->orderBy('published_at', 'desc')
            ->take(6)
            ->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.latest-blog-posts');
    }
}
