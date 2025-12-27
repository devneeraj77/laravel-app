@if($posts->count())
@foreach($posts as $post)
<div class="group  border border-base-300 rounded-2xl 
         transition-all duration-300 ease-out hover:-translate-y-1 hover:shadow-lg max-w-sm group cursor-pointer border border-base-200 bg-base-300 dark:bg-accent/50 rounded-2xl p-3 hover:border-accent/60">
    <figure class="pb-4 overflow-hidden rounded-xl">
        <a href="{{ route('blog.show', ['category' => $post->category->slug, 'slug' => $post->slug]) }}"
            class="block h-48 w-full overflow-hidden rounded-xl">
            @if($post->imageAsset)
            <img
                src="{{ $post->imageAsset->image_url }}"
                alt="{{ $post->title }}"
                class="w-full h-full object-cover object-center
                           transition-transform duration-500 ease-out
                           group-hover:scale-105" />
            @else
            <img
                src="https://placehold.co/600x400"
                alt="Placeholder"
                class="w-full h-full object-cover
                           transition-transform duration-500
                           group-hover:scale-105" />
            @endif
        </a>
    </figure>
    <div class="block">
        <h4 class="dark:text-base-300/50 font-medium leading-4 mb-4 min-h-8 "><a href="{{ route('blog.show', ['category' => $post->category->slug, 'slug' => $post->slug]) }}">{{ $post->title }}</a></h4>
        <p class="text-gray-500 text-sm mb-9">{{ Str::limit(strip_tags($post->body), 100) }}</p>
        <div class="flex items-center justify-between  font-medium">
            <em class="text-sm dark:text-base-300/80">By {{ $post->author->name }}</em>
            <span class="text-sm dark:text-base-300/80">{{ $post->published_at->diffForHumans() }}</span>
        </div>
    </div>
</div>
@endforeach
@else
<div class="text-center text-gray-500 col-span-3">No posts found.</div>
@endif