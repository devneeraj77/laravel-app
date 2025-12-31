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
<main id="blog" class="max-w-4xl mx-auto py-10" itemscope itemtype="https://schema.org/BlogPosting">

    {{-- Schema Hidden Metadata --}}
    <meta itemprop="mainEntityOfPage" content="{{ url()->current() }}">
    <meta itemprop="datePublished" content="{{ $post->published_at ? $post->published_at->toIso8601String() : $post->created_at->toIso8601String() }}">
    <meta itemprop="dateModified" content="{{ $post->updated_at->toIso8601String() }}">

    {{-- Fix 1: Publisher & Logo --}}
    <div itemprop="publisher" itemscope itemtype="https://schema.org/Organization" class="hidden">
        <meta itemprop="name" content="FlightFareMart">
        <div itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
            {{-- Ensure this URL is absolute (not relative) --}}
            <meta itemprop="url" content="{{ url('images/logo.png') }}">
        </div>
    </div>

    {{-- Breadcrumbs (Semantic & SEO Validated) --}}
    <nav class="text-sm breadcrumbs mb-6" aria-label="Breadcrumb">
        <ol itemscope itemtype="https://schema.org/BreadcrumbList">
            {{-- Item 1: Blog Index --}}
            <li itemprop="itemListElement" itemscope
                itemtype="https://schema.org/ListItem">
                <a itemprop="item" href="{{ route('blog.index') }}">
                    <span itemprop="name">{{ route('blog.index') }}</span></a>
                <meta itemprop="position" content="1" />
            </li>
            {{-- Item 2: Category --}}
            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                <a itemscope itemtype="https://schema.org/WebPage"
                    itemprop="item"
                    itemid="{{ route('blog.category', $post->category->slug) }}"
                    href="{{ route('blog.category', $post->category->slug) }}">
                    <span itemprop="name">{{ $post->category->name }}</span>
                </a>
                <meta itemprop="position" content="2" />
            </li>

            {{-- Item 3: Current Post (Fixed for Validator) --}}
            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                {{-- Adding the 'item' link here satisfies the 'Missing field item' error --}}
                <a itemscope itemtype="https://schema.org/WebPage"
                    itemprop="item"
                    itemid="{{ url()->current() }}"
                    href="{{ url()->current() }}"
                    class="pointer-events-none cursor-default">
                    <span itemprop="name">{{ $post->title }}</span>
                </a>
                <meta itemprop="position" content="3" />
            </li>
        </ol>
    </nav>

    {{-- Fix 2: Featured Image (Addressing the 'Missing Image' warning) --}}
    <figure class="rounded-box overflow-hidden mb-8 shadow-xl">
        @php
        $imageUrl = ($post->imageAsset && $post->imageAsset->image_url) ? $post->imageAsset->image_url : url('images/default-placeholder.jpg');
        @endphp
        <img
            itemprop="image"
            src="{{ $imageUrl }}"
            alt="{{ $post->title }}"
            fetchpriority="high"
            class="w-full h-96 object-cover" />
    </figure>

    <article class="prose lg:prose-xl max-w-none">
        <header class="mb-2">
            <div class="flex flex-col py-4">
                <h1 itemprop="headline" class="text-5xl text-accent dark:text-secondary mb-2">
                    {{ $post->title }}
                </h1>

                {{-- Fix 3: Author URL (Addressing the 'Missing URL' warning) --}}
                <span class="text-base italic text-accent/70 dark:text-base-300/70" itemprop="author" itemscope itemtype="https://schema.org/Person">
                    ~ Written by
                    <a itemprop="url" href="{{ url('/about') }}" class="no-underline">
                        <span itemprop="name">{{ $post->author->name ?? 'Admin' }}</span>
                    </a>
                </span>
            </div>

            <div class="flex items-start justify-between space-x-3 mb-2">
                <div class="badge badge-lg badge-secondary text-accent">
                    {{ $post->category->name }}
                </div>
                <time datetime="{{ $post->published_at->toIso8601String() }}" class="text-sm dark:text-base-200 text-accent/80">
                    Published on {{ $post->published_at->format('F d, Y') }}
                </time>
            </div>
            <hr class="dark:text-gray-200/20 text-accent/20  mt-8">
        </header>

        <section role="region" aria-label="Summary" class="flex flex-col-reverse gap-4 md:flex-row items-start justify-between text-accent dark:text-secondary py-4 mb-6">
            <div class="flex items-start text-accent/60 dark:text-base-300/50 gap-4" itemprop="description">
                {{ $post->excerpt }}
            </div>
            <aside class="flex-shrink-0 mb-4 md:mb-0">
                <x-social-share :post="$post" />
            </aside>
        </section>

        <div class="article-content text-accent dark:text-base-300/80" itemprop="articleBody">
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
</main>
@endsection