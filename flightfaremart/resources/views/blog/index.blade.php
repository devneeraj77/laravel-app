@extends('layouts.blog')

@section('title', 'Blog')

@section('sidebar')
    <aside class=" rounded-t-2xl p-10  w-70 sticky top-0">
        <h1 class="text-lg pb-2">Categories</h1>
        <ul class="px-2 dark:text-base-200/40 pb-4  text-accent/70  ">
            @foreach($categories as $category)
                <li><a href="{{ route('blog.category', $category->slug) }}">{{ $category->name }}</a></li>
            @endforeach
        </ul>
    </aside>
@endsection

@section('main-content')
    <section class="py-4  min-h-screen">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex items-center gap-3 max-w-md w-full py-14">
                <div class="flex items-center w-full border pl-3 gap-2 bg-white border-gray-500/30 h-[46px] rounded-md overflow-hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 30 30" fill="#6B7280">
                        <path d="M13 3C7.489 3 3 7.489 3 13s4.489 10 10 10a9.95 9.95 0 0 0 6.322-2.264l5.971 5.971a1 1 0 1 0 1.414-1.414l-5.97-5.97A9.95 9.95 0 0 0 23 13c0-5.511-4.489-10-10-10m0 2c4.43 0 8 3.57 8 8s-3.57 8-8 8-8-3.57-8-8 3.57-8 8-8" />
                    </svg>
                    <input type="text" id="search-input" placeholder="Search for posts..." class="w-full h-full outline-none text-gray-500 placeholder-gray-500 text-sm">
                </div>
            </div>
            <div class="h-10 py-4">
                <div id="search-status" class=" text-gray-500 " style="display: none;"></div>
            </div>
            <div id="posts-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @include('blog._posts', ['posts' => $posts])
            </div>
            <div id="pagination-links" class="mt-14 ">
                {{ $posts->links('vendor.pagination.custom') }}
            </div>
        </div>
    </section>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('search-input');
    const postsGrid = document.getElementById('posts-grid');
    const pagination = document.getElementById('pagination-links');
    const status = document.getElementById('search-status');
    const originalPosts = postsGrid.innerHTML;
    const originalPagination = pagination.innerHTML;

    function debounce(func, delay) {
        let timeout;
        return function(...args) {
            const context = this;
            clearTimeout(timeout);
            status.textContent = 'Typing...';
            status.style.display = 'block';
            timeout = setTimeout(() => func.apply(context, args), delay);
        };
    }

    const debouncedSearch = debounce(function(query) {
        if (query.length === 0) {
            postsGrid.innerHTML = originalPosts;
            pagination.innerHTML = originalPagination;
            pagination.style.display = 'block';
            status.style.display = 'none';
            return;
        }
        
        if (query.length > 2) {
            status.textContent = 'Loading...';
            fetch(`/blog/search?query=${encodeURIComponent(query)}`)
                .then(response => response.text())
                .then(html => {
                    postsGrid.innerHTML = html;
                    pagination.style.display = 'none';
                    status.style.display = 'none';
                })
                .catch(error => {
                    console.error('Error fetching search results:', error);
                    status.textContent = 'Error loading results.';
                });
        } else {
            status.style.display = 'none';
        }
    }, 500);

    searchInput.addEventListener('input', function() {
        debouncedSearch(this.value);
    });
});
</script>
@endsection
