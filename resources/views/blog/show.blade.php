@extends('layouts.blog')

@section('title', $post->title)
@section('head')
<meta name="description" content="{{ $post->excerpt }}">

{{-- Open Graph / Facebook --}}
<meta property="og:type" content="article">
<meta property="og:url" content="{{ url('/blog/' . $post->category->slug . '/' . $post->slug) }}">
<meta property="og:title" content="{{ $post->title }}">
<meta property="og:description" content="{{ $post->excerpt }}">
@if($post->imageAsset)
<meta property="og:image" content="{{ $post->imageAsset->image_url }}">
@endif

{{-- Twitter --}}
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="{{ url('/blog/' . $post->category->slug . '/' . $post->slug) }}">
<meta property="twitter:title" content="{{ $post->title }}">
<meta property="twitter:description" content="{{ $post->excerpt }}">
@if($post->imageAsset)
<meta property="twitter:image" content="{{ $post->imageAsset->image_url }}">
@endif
@endsection

@section('sidebar')
<aside class=" rounded-t-2xl p-10  w-70 sticky top-0">
    <h1 class="text-lg pb-2">Categories</h1>
    <ul class="px-2 dark:text-base-200/40 text-accent/70 flex flex-col justify-center items-start ">
        @foreach($categories as $category)
        <li class="{{ $category->slug == $post->category->slug ? 'font-bold font-bold dark:text-secondary text-accent list-disc' : '' }}"><a href="{{ route('blog.category', $category->slug) }}">{{ $category->name }}</a></li>
        @endforeach
    </ul>
</aside>
@endsection

@section('main-content')
<div id="blog" class="max-w-4xl mx-auto py-10">

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
        <img
            src="{{ $post->imageAsset->image_url }}"
            srcset="{{ $post->imageAsset->image_url }} 800w, {{ $post->imageAsset->image_url_small }} 400w"
            sizes="(max-width: 600px) 400px, 800px"
            alt="Featured image for {{ $post->title }}"
            fetchpriority="high"
            width="1280"
            height="549"
            class="w-full h-96 object-cover" />

        @else
        <img src="https://placehold.co/800x400/cad593/FFFFFF?text=Demo Post" alt="Placeholder Image" class="w-full h-96 object-cover">
        @endif
    </figure>

    <article class="prose lg:prose-xl max-w-none">

        <header class="mb-6">
            {{-- Title and Badges --}}
            <div class="flex flex-col   py-4">
                <h1 class="text-5xl text-accent dark:text-secondary mb-2">{{ $post->title }}</h1>
                <span class="text-base italic text-accent/70 dark:text-base-300/70"> ~ Written by {{ $post->author->name }}</span>
            </div>
            <!-- <small class=" text-accent/50">{{$post->excerpt}}</small> -->
            <div class="flex  items-start justify-between space-x-3 mb-2">
                <div class="badge badge-lg badge-secondary dark:bg-secondary dark:text-accent  text-accent">{{ $post->category->name }}</div>
                <span class="text-sm dark:text-base-200 text-accent/80">Published on {{ $post->published_at->format('F d, Y') }}</span>
            </div>
            <hr class="text-gray-200">
        </header>
        {{-- Author Info (Avatar) --}}
        <div role="alert"
            class=" flex flex-col-reverse gap-4 md:flex-row items-start justify-between text-accent  dark:text-secondary py-4 mb-6">

            <!-- Author Section -->
            <div class="flex items-start text-accent/60 dark:text-base-300/50 gap-4">
                <!-- Description Info -->
                {{ $post->excerpt }}
            </div>
            <!-- Social Share -->
            <div class="flex-shrink-0 mb-4 md:mb-0">
                <x-social-share :post="$post" />
            </div>
        </div>



        {{-- Post Content --}}
        <div class="article-content text-accent dark:text-base-300/80">
            {{-- Note: Use {!! $post->content !!} if the content is stored as sanitized HTML --}}
            {!! nl2br($post->content) !!}

        </div>

    </article>

    @if($post->faqs->count() > 0)
    <section class="mt-12 p-3 shadow-xl rounded-box"
        itemscope
        itemtype="https://schema.org/FAQPage">

        <h2 class="text-3xl font-bold mb-6 text-center text-accent dark:text-secondary">
            Frequently Asked Questions
        </h2>

        <div class="space-y-4">
            {{-- The @foreach loop handles dynamic content --}}
            @foreach($post->faqs as $faq)
            {{-- itemscope and itemtype define a single FAQ entry (Question) --}}
            <div tabindex="0"
                class="collapse collapse-plus border border-base-300 dark:dark:bg-accent/50 bg-base-200/50 rounded-box"
                itemscope
                itemprop="mainEntity"
                itemtype="https://schema.org/Question">

                {{-- itemprop="name" for the Question title --}}
                <div class="collapse-title text-xl font-medium dark:text-base-300"
                    itemprop="name">
                    {{ $faq->question }}
                </div>

                {{-- itemscope and itemtype define the Answer section --}}
                <div class="collapse-content dark:text-base-200/80"
                    itemscope
                    itemprop="acceptedAnswer"
                    itemtype="https://schema.org/Answer">

                    {{-- itemprop="text" for the Answer content --}}
                    <p itemprop="text">{{ $faq->answer }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </section>
    @endif

    <div class="divider"></div>

    {{-- Back Button --}}
    <a href="{{ route('blog.index') }}" class="btn btn-outline btn-sm mt-8">← Back to Blog Posts</a>
</div>
@endsection