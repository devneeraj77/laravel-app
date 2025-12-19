<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\ImageAsset;
use App\Models\Category;

class SitemapController extends Controller
{
    public function index()
    {
        $posts = Post::published()
            ->with('imageAsset')
            ->latest()
            ->get();

        $categories = Category::all();

        $staticPages = [
            ['url' => url('/'), 'lastmod' => now()->toAtomString(), 'changefreq' => 'daily', 'priority' => '1.0'],
            ['url' => url('/about'), 'lastmod' => now()->toAtomString(), 'changefreq' => 'monthly', 'priority' => '0.8'],
            ['url' => url('/contact'), 'lastmod' => now()->toAtomString(), 'changefreq' => 'monthly', 'priority' => '0.8'],
            ['url' => url('/blog'), 'lastmod' => now()->toAtomString(), 'changefreq' => 'daily', 'priority' => '0.9'],
            ['url' => url('/privacy-policy'), 'lastmod' => now()->toAtomString(), 'changefreq' => 'monthly', 'priority' => '0.7'],
            ['url' => url('/terms-and-conditions'), 'lastmod' => now()->toAtomString(), 'changefreq' => 'monthly', 'priority' => '0.7'],
            ['url' => url('/faqs'), 'lastmod' => now()->toAtomString(), 'changefreq' => 'monthly', 'priority' => '0.7'],
        ];

        return response()->view('sitemap', [
            'posts' => $posts,
            'categories' => $categories,
            'staticPages' => $staticPages,
        ])->header('Content-Type', 'text/xml');
    }
}
