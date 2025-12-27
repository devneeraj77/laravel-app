@extends('layouts.blog')

@section('title', 'Posts in ' . $category->name)
@section('category', 'Posts in ' . $category->name)


@section('sidebar')
<aside class=" rounded-t-2xl p-10  w-70 sticky top-0">
    <h1 class="text-lg pb-2">Categories</h1>
    <ul class="px-2 dark:text-base-200/40 text-accent/70">
        @foreach($categories as $cat)
        <li class="{{ $cat->slug == $category->slug ? 'font-bold dark:text-secondary text-accent list-disc' : '' }}"><a href="{{ route('blog.category', $cat->slug) }}">{{ $cat->name }}</a></li>
        @endforeach
    </ul>
</aside>
@endsection

@section('main-content')
<section class="py-4 min-h-screen">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <h1 class="text-4xl text-accent/90  dark:text-base-200 mb-8 border-b pb-4">Posts in: {{ $category->name }}</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-8">
            @foreach($posts as $post)
            <div class="group cursor-pointer border border-base-200 bg-base-300 dark:bg-accent/50 rounded-2xl p-5 transition-all duration-300 hover:border-secondary">
                <div class="flex items-center mb-6">
                    <a href="{{ route('blog.show', ['category' => $post->category->slug, 'slug' => $post->slug]) }}" class="h-48 w-full overflow-hidden">
                        @if($post->imageAsset)
                        <img src="{{ $post->imageAsset->image_url }}" alt="{{ $post->title }}" class="rounded-lg w-full h-full object-cover object-center " width="800" height="400" fetchpriority="high" loading="lazy" decoding="async">
                        @else
                        <img src="https://placehold.co/800x400/cad593/FFFFFF?text=Demo Post" alt="Placeholder Image" class="rounded-lg w-full h-full object-cover object-center ">
                        @endif
                    </a>
                </div>
                <div class="block">
                    <h4 class="dark:text-base-300/50 font-medium leading-4 mb-6 min-h-8"><a href="{{ route('blog.show', ['category' => $post->category->slug, 'slug' => $post->slug]) }}">{{ $post->title }}</a></h4>
                    <div class="flex items-center justify-between font-medium">
                        <em class="text-sm dark:text-base-300/80">By {{ $post->author->name }}</em>
                        <span class="text-sm dark:text-base-300/80">{{ $post->published_at->diffForHumans() }}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="mt-14 dark:bg-secondary">
            {{ $posts->links() }}
        </div>
    </div>
</section>
@endsection