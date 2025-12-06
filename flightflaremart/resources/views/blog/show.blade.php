@extends('layouts.blog')

@section('title', $post->title)

@section('sidebar')
    <aside class=" rounded-t-2xl p-10  w-60">
        <h1 class="text-lg">Categories</h1>
        <ul class="px-2 dark:text-base-200/40 text-accent/70">
            @foreach($categories as $category)
                <li class="{{ $category->slug == $post->category->slug ? 'font-bold' : '' }}"><a href="{{ route('blog.category', $category->slug) }}">{{ $category->name }}</a></li>
            @endforeach
        </ul>
    </aside>
@endsection

@section('main-content')
    <div class="max-w-4xl mx-auto py-10">
        
        {{-- Breadcrumbs (Optional, but good for navigation) --}}
        <div class="text-sm breadcrumbs mb-6">
            <ul>
                <li><a href="{{ route('blog.index') }}">Blog</a></li> 
                <li><a href="{{ route('blog.category', $post->category->slug) }}">{{ $post->category->name }}</a></li> 
                <li>{{ $post->title }}</li>
            </ul>
        </div>
        
        {{-- Featured Image --}}
        <figure class="rounded-box overflow-hidden mb-8 shadow-xl">
            @if($post->imageAsset)
                <img src="{{ $post->imageAsset->image_url }}" alt="{{ $post->title }}" class="w-full h-96 object-cover">
            @else
                <img src="https://placehold.co/800x400/cad593/FFFFFF?text=Demo Post" alt="Placeholder Image" class="w-full h-96 object-cover">
            @endif
        </figure>
        
        <article class="prose lg:prose-xl max-w-none">
            
            <header class="mb-6">
                {{-- Title and Badges --}}
                <h1 class="text-5xl font-extrabold mb-2">{{ $post->title }}</h1>
                <div class="flex items-center space-x-3 mb-4">
                    <div class="badge badge-lg badge-secondary">{{ $post->category->name }}</div>
                    <span class="text-sm text-base-content/70">Published on {{ $post->published_at->format('F d, Y') }}</span>
                </div>
            </header>

            {{-- Author Info (Avatar) --}}
            <div role="alert" class="alert shadow-lg mb-8 bg-base-200 border-l-4 border-primary">
                <div class="flex items-center">
                    <div class="avatar mr-4">
                        <div class="w-12 rounded-full">
                            <img src="{{ $post->author->avatar_url ?? 'https://placehold.co/50x50/cad593/cad593?text=profile' }}" alt="Author Avatar" />
                        </div>
                    </div>
                    <div>
                        <h4 class="font-bold">Written by {{ $post->author->name }}</h4>
                        <span class="text-sm text-base-content/70">{{ $post->author->bio ?? 'Blogger & Developer.' }}</span>
                    </div>
                </div>
            </div>
            
            {{-- Post Content --}}
            <div class="article-content">
                {{-- Note: Use {!! $post->content !!} if the content is stored as sanitized HTML --}}
                {!! $post->content !!} 
            </div>
            
        </article>
        
        <div class="divider"></div> 

        {{-- Back Button --}}
        <a href="{{ route('blog.index') }}" class="btn btn-outline btn-sm mt-8">← Back to Blog Posts</a>

    </div>
@endsection