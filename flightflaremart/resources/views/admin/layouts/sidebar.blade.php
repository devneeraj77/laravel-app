<aside class="w-64 bg-[#11180f] text-white flex-shrink-0 min-h-screen p-6">
    <div class="text-2xl font-semibold mb-8">
        FlightFlareMart
        Admin Panel
    </div>
    <nav class="space-y-2">

        {{-- Dashboard Link --}}
        <a href="{{ route('admin.dashboard') }}" class="block py-1 px-3 rounded hover:bg-accent @if(request()->routeIs('admin.dashboard')) bg-accent @endif">Dashboard</a>

        <a href="#" class="block py-1 px-3 rounded hover:bg-accent">Flights</a>
        <a href="#" class="block py-1 px-3 rounded hover:bg-accent">Bookings</a>
        <a href="#" class="block py-1 px-3 rounded hover:bg-accent">Users</a>

        <div class="mt-6 ">
            <p class="uppercase text-xs text-slate-400 mb-2">Blog Management</p>

            {{-- All Posts Link --}}
            <a href="{{ route('admin.blog.posts.index') }}" class="block py-2 px-3 rounded hover:bg-accent @if(request()->routeIs('admin.blog.posts.index')) bg-accent @endif">All Posts</a>
            <a href="{{ route('admin.blog.posts.create') }}"
                class="block py-2 px-3 rounded hover:bg-accent @if(request()->routeIs('admin.blog.posts.create')) bg-accent @endif">
                Add New Post
            </a>
            <a href="#" class="block py-2 px-3 rounded hover:bg-accent">Drafts</a>
            <a href="{{ route('admin.blog.categories.index') }}" class="block py-2 px-3 rounded hover:bg-accent @if(request()->routeIs('admin.blog.categories.index')) bg-accent @endif">Categories</a>
        </div>
        <div class="mt-6">
            <p class="uppercase text-xs text-slate-400 mb-2">Info Opt.</p>
            <a href="{{ route('admin.messages.index') }}"
                class="block py-2 px-3 rounded text-white hover:bg-[#34495e] transition duration-150 @if(request()->routeIs('admin.messages.index')) bg-indigo-600 font-semibold @endif">
                Contact Messages
            </a>
        </div>
    </nav>
</aside>