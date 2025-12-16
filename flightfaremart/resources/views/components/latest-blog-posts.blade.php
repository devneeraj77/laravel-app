@if($posts->isNotEmpty())
<div class="py-12 ">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h2 class="text-2xl md:text-6xl mx-auto max-w-6xl dark:text-secondary text-accent px-5 md:px-3">
                From the Blog
            </h2>
            <p class="mt-4 mx-auto px-5 md:px-4 max-w-6xl text-lg dark:text-secondary/50 text-accent/80 my-2 pb-3">
                Latest articles and news from our team.
            </p>
        </div>

        <div class="mt-12 grid gap-8 lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1">
            @foreach($posts as $post)
                @if($post->category && $post->author)
                <div class="flex flex-col rounded-lg shadow-lg overflow-hidden">
                    <div class="flex-shrink-0">
                        <a href="{{ route('blog.show', ['category' => $post->category->slug, 'slug' => $post->slug]) }}">
                            <img class="h-48 w-full object-cover" src="{{ $post->imageAsset->image_url ?? 'https://via.placeholder.com/400x200' }}" alt="{{ $post->title }}">
                        </a>
                    </div>
                    <div class="flex-1 bg-base-300 p-6 flex flex-col justify-between">
                        <div class="flex-1">
                            <p class="text-sm font-medium text-accent/80">
                                <a href="{{ route('blog.category', $post->category->slug) }}" class="hover:underline">
                                    {{ $post->category->name }}
                                </a>
                            </p>
                            <a href="{{ route('blog.show', ['category' => $post->category->slug, 'slug' => $post->slug]) }}" class="block mt-2">
                                <p id="post-title" class=" md:text-2xl font-semibold text-gray-900">
                                    {{ Str::limit($post->title, 50) }}
                                </p>
                                <p class="mt-3 text-base text-gray-500">
                                     {{ Str::limit($post->excerpt, 90) }}
                                </p>
                            </a>
                        </div>
                        <div class="mt-6 flex items-center">
                            <div class="flex-shrink-0">
                                <!-- Assuming author has a profile photo, otherwise a placeholder -->
                                <span class="sr-only">{{ $post->author->name }}</span>
                                <img class="h-10 w-10 rounded-full" src="{{ $post->author->profile_photo_url ?? 'https://ui-avatars.com/api/?name=' . urlencode($post->author->name) . '&color=CAD593&background=EBF4FF' }}" alt="">
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-gray-900">
                                    {{ $post->author->name }}
                                </p>
                                <div class="flex space-x-1 text-sm text-gray-500">
                                    <time datetime="{{ $post->published_at->toDateString() }}">
                                        {{ $post->published_at->diffForHumans() }}
                                    </time>
                                    <span aria-hidden="true">&middot;</span>
                                    <span>{{ ceil(str_word_count(strip_tags($post->content)) / 200) }} min read</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            @endforeach
        </div>
    </div>
</div>
@endif
