<aside class="fixed inset-y-0 left-0 w-44 md:w-60 p-6 z-50 bg-[#11180f] text-white flex-shrink-0 min-h-screen ease-in-out duration-300 md:static md:translate-x-0"
    :class="{
        '-translate-x-full': !sidebarOpen,
        'translate-x-0': sidebarOpen,
        'w-60 p-6': !sidebarMinimized,
        'w-16 py-6 px-2': sidebarMinimized
    }">
    <div class="text-base md:text-xl flex flex-col font-semibold mb-8">
        <p class="">FlightFlareMart</p>
        <p>Admin Panel</p>
        
    </div>
    <nav class="space-y-2">

        {{-- Dashboard Link --}}
        <a href="{{ route('admin.dashboard') }}" class="flex items-center py-1 px-3 rounded hover:bg-accent @if(request()->routeIs('admin.dashboard')) bg-accent @endif">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5 mr-3" :class="{'mr-0': sidebarMinimized} icon icon-tabler icons-tabler-outline icon-tabler-chalkboard-teacher"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 19h-3a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v11a1 1 0 0 1 -1 1" /><path d="M12 14a2 2 0 1 0 4.001 -.001a2 2 0 0 0 -4.001 .001" /><path d="M17 19a2 2 0 0 0 -2 -2h-2a2 2 0 0 0 -2 2" /></svg>
            <span x-show="!sidebarMinimized">Dashboard</span>
        </a>

        <a href="#" class="flex items-center py-1 px-3 rounded hover:bg-accent">
            <svg class="h-5 w-5 mr-3" :class="{'mr-0': sidebarMinimized}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
            </svg>
            <span x-show="!sidebarMinimized">Flights</span>
        </a>
        <a href="#" class="flex items-center py-1 px-3 rounded hover:bg-accent">
            <svg class="h-5 w-5 mr-3" :class="{'mr-0': sidebarMinimized}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"></path>
            </svg>
            <span x-show="!sidebarMinimized">Bookings</span>
        </a>
        <a href="#" class="flex items-center py-1 px-3 rounded hover:bg-accent">
            <svg class="h-5 w-5 mr-3" :class="{'mr-0': sidebarMinimized}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
            </svg>
            <span x-show="!sidebarMinimized">Users</span>
        </a>

        <div class="mt-6 ">
            <p class="uppercase text-xs text-slate-400 mb-2" x-show="!sidebarMinimized">Blog Management</p>

            {{-- All Posts Link --}}
            <a href="{{ route('admin.blog.posts.index') }}" class="flex items-center py-2 px-3 rounded hover:bg-accent @if(request()->routeIs('admin.blog.posts.index')) bg-accent @endif">
                <svg class="h-5 w-5 mr-3" :class="{'mr-0': sidebarMinimized}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
                <span x-show="!sidebarMinimized">All Posts</span>
            </a>
            <a href="{{ route('admin.blog.posts.create') }}"
                class="flex items-center py-2 px-3 rounded hover:bg-accent @if(request()->routeIs('admin.blog.posts.create')) bg-accent @endif">
                <svg class="h-5 w-5 mr-3" :class="{'mr-0': sidebarMinimized}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
                <span x-show="!sidebarMinimized">Add New Post</span>
            </a>
            <a href="{{ route('admin.blog.posts.drafts') }}" class="flex items-center py-2 px-3 rounded hover:bg-accent @if(request()->routeIs('admin.blog.posts.drafts')) bg-accent @endif">
                <svg class="h-5 w-5 mr-3" :class="{'mr-0': sidebarMinimized}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                </svg>
                <span x-show="!sidebarMinimized">Drafts</span>
            </a>
            <a href="{{ route('admin.blog.categories.index') }}" class="flex items-center py-2 px-3 rounded hover:bg-accent @if(request()->routeIs('admin.blog.categories.index')) bg-accent @endif">
                <svg class="h-5 w-5 mr-3" :class="{'mr-0': sidebarMinimized}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path>
                </svg>
                <span x-show="!sidebarMinimized">Categories</span>
            </a>
        </div>
        <div class="mt-6">
            <p class="uppercase text-xs text-slate-400 mb-2">Info Opt.</p>
            <a href="{{ route('admin.messages.index') }}"
                class="block py-2 px-3 rounded text-white hover:bg-[#34495e] transition duration-150 @if(request()->routeIs('admin.messages.index')) bg-accent font-semibold @endif">
                Contact Messages
            </a>
        </div>
    </nav>
</aside>