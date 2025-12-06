@extends('layouts.blog')

@section('title', 'Blog')

@section('sidebar')
    <aside class=" rounded-t-2xl p-10  w-60">
        <h1 class="text-lg">Categories</h1>
        <ul class="px-2 dark:text-base-200/40 text-accent/70">
            @foreach($categories as $category)
                <li><a href="{{ route('blog.category', $category->slug) }}">{{ $category->name }}</a></li>
            @endforeach
        </ul>
    </aside>
@endsection

@section('main-content')
    <section class="py-4 ">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex items-center gap-3 max-w-md w-full py-14">
                <div class="flex items-center w-full border pl-3 gap-2 bg-white border-gray-500/30 h-[46px] rounded-md overflow-hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 30 30" fill="#6B7280">
                        <path d="M13 3C7.489 3 3 7.489 3 13s4.489 10 10 10a9.95 9.95 0 0 0 6.322-2.264l5.971 5.971a1 1 0 1 0 1.414-1.414l-5.97-5.97A9.95 9.95 0 0 0 23 13c0-5.511-4.489-10-10-10m0 2c4.43 0 8 3.57 8 8s-3.57 8-8 8-8-3.57-8-8 3.57-8 8-8" />
                    </svg>
                    <input type="text" placeholder="Search for products" class="w-full h-full outline-none text-gray-500 placeholder-gray-500 text-sm">
                </div>
                <button type="submit" class="bg-accent w-32 h-[46px] rounded-md text-sm text-white">Search</button>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($posts as $post)
                    <div class="group cursor-pointer border border-gray-300 rounded-2xl p-5 transition-all duration-300 hover:border-indigo-600">
                        <div class="flex items-center mb-6">
                            <a href="{{ route('blog.show', ['category' => $post->category->slug, 'slug' => $post->slug]) }}">
                                @if($post->imageAsset)
                                    <img src="{{ $post->imageAsset->image_url }}" alt="{{ $post->title }}" class="rounded-lg w-full object-cover h-48">
                                @else
                                    <img src="https://placehold.co/500x300/cad593/FFFFFF?text=Demo Post" alt="Placeholder Image" class="rounded-lg w-full object-cover h-48">
                                @endif
                            </a>
                        </div>
                        <div class="block">
                            <h4 class="text-gray-900 font-medium leading-8 mb-9"><a href="{{ route('blog.show', ['category' => $post->category->slug, 'slug' => $post->slug]) }}">{{ $post->title }}</a></h4>
                            <div class="flex items-center justify-between  font-medium">
                                <h6 class="text-sm text-gray-500">By {{ $post->author->name }}</h6>
                                <span class="text-sm text-indigo-600">{{ $post->published_at->diffForHumans() }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mt-14">
                {{ $posts->links() }}
            </div>
        </div>
    </section>
@endsection
