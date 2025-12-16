@if($posts->count())
    @foreach($posts as $post)
        <div class="group cursor-pointer border border-accent rounded-2xl p-5 transition-all duration-300 hover:border-accent/60">
            <div class="flex items-center mb-6">
                <a href="{{ route('blog.show', ['category' => $post->category->slug, 'slug' => $post->slug]) }}" class="h-48 w-full overflow-hidden">
                    @if($post->imageAsset)
                        <img src="{{ $post->imageAsset->image_url }}" alt="{{ $post->title }}" class="rounded-lg w-full h-full object-cover object-center">
                    @else
                        <img src="https://placehold.co/500x300/cad593/FFFFFF?text=Demo Post" alt="Placeholder Image" class="rounded-lg w-full h-full object-cover object-center">
                    @endif
                </a>
            </div>
            <div class="block">
                <h4 class="dark:text-base-300/50 font-medium leading-8 mb-4"><a href="{{ route('blog.show', ['category' => $post->category->slug, 'slug' => $post->slug]) }}">{{ $post->title }}</a></h4>
                <p class="text-gray-500 text-sm mb-9">{{ Str::limit(strip_tags($post->body), 100) }}</p>
                <div class="flex items-center justify-between  font-medium">
                    <h6 class="text-sm dark:text-base-300/80">By {{ $post->author->name }}</h6>
                    <span class="text-sm dark:text-base-300/80">{{ $post->published_at->diffForHumans() }}</span>
                </div>
            </div>
        </div>
    @endforeach
@else
    <div class="text-center text-gray-500 col-span-3">No posts found.</div>
@endif
