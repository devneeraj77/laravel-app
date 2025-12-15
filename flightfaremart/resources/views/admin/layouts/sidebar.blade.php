<aside
    class="fixed inset-y-0 left-0 z-40  flex h-screen flex-shrink-0 flex-col bg-[#11180f] text-slate-300 transition-all duration-300 ease-in-out lg:static lg:translate-x-0 border-r border-slate-800"
    :class="{
        'w-64': !sidebarMinimized,
        'w-20': sidebarMinimized,
        'translate-x-0': sidebarOpen,
        '-translate-x-full': !sidebarOpen
    }">

    <!-- Brand and Logo -->
    <div class="flex h-16 shrink-0 items-center justify-between" :class="!sidebarMinimized ? 'px-4' : 'px-2 justify-center'">
        <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-x-2 text-white" x-show="!sidebarMinimized">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-plane-departure"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14.639 10.258l4.83 -1.294a2 2 0 1 1 1.035 3.863l-14.489 3.883l-4.45 -5.02l2.897 -.776l2.45 1.414l2.897 -.776l-3.743 -6.244l2.898 -.777l5.675 5.727z" /><path d="M3 21h18" /></svg>
            <span class="text-xl font-semibold">FlightFlare</span>
        </a>
        <a href="{{ route('admin.dashboard') }}" class="p-2" x-show="sidebarMinimized" title="FlightFlare">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-plane-departure"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14.639 10.258l4.83 -1.294a2 2 0 1 1 1.035 3.863l-14.489 3.883l-4.45 -5.02l2.897 -.776l2.45 1.414l2.897 -.776l-3.743 -6.244l2.898 -.777l5.675 5.727z" /><path d="M3 21h18" /></svg>
        </a>
    </div>

    <!-- Navigation Links -->
    <nav class="flex-1 space-y-1 overflow-y-auto px-2 py-4">
        <!-- Main -->
        <a href="{{ route('admin.dashboard') }}" class="group flex items-center rounded-md px-3 py-2 text-sm font-medium @if(request()->routeIs('admin.dashboard')) bg-accent text-white @else text-slate-300 hover:bg-accent/20 hover:text-white @endif" :title="sidebarMinimized ? 'Dashboard' : ''">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M4 4h6v8h-6z" />
                <path d="M4 16h6v4h-6z" />
                <path d="M14 12h6v8h-6z" />
                <path d="M14 4h6v4h-6z" />
            </svg>
            <span class="ml-3" x-show="!sidebarMinimized">Dashboard</span>
        </a>
        <a href="#" class="group flex items-center rounded-md px-3 py-2 text-sm font-medium text-slate-300 hover:bg-accent/20 hover:text-white" :title="sidebarMinimized ? 'Flights' : ''">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M16 10h4a2 2 0 0 1 0 4h-4l-4 7h-3l2 -7h-4l-2 2h-3l2 -4l-2 -4h3l2 2h4l-2 -7h3z" />
            </svg>
            <span class="ml-3" x-show="!sidebarMinimized">Flights</span>
        </a>
        <a href="#" class="group flex items-center rounded-md px-3 py-2 text-sm font-medium text-slate-300 hover:bg-accent/20 hover:text-white" :title="sidebarMinimized ? 'Bookings' : ''">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M15 5l0 2" />
                <path d="M15 11l0 2" />
                <path d="M15 17l0 2" />
                <path d="M5 5h14a2 2 0 0 1 2 2v3a2 2 0 0 0 0 4v3a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-3a2 2 0 0 0 0 -4v-3a2 2 0 0 1 2 -2" />
            </svg>
            <span class="ml-3" x-show="!sidebarMinimized">Bookings</span>
        </a>
        <a href="#" class="group flex items-center rounded-md px-3 py-2 text-sm font-medium text-slate-300 hover:bg-accent/20 hover:text-white" :title="sidebarMinimized ? 'Users' : ''">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                <path d="M21 21v-2a4 4 0 0 0 -3 -3.85" />
            </svg>
            <span class="ml-3" x-show="!sidebarMinimized">Users</span>
        </a>

        <!-- Blog Management -->
        <div class="pt-4" :class="!sidebarMinimized ? 'space-y-1' : 'space-y-2'">
            <h3 class="px-3 text-xs font-semibold uppercase text-slate-500" x-show="!sidebarMinimized">
                Blog
            </h3>
            <a href="{{ route('admin.blog.posts.index') }}" class="group flex items-center rounded-md px-3 py-2 text-sm font-medium @if(request()->routeIs('admin.blog.posts.index')) bg-accent text-white @else text-slate-300 hover:bg-accent/20 hover:text-white @endif" :title="sidebarMinimized ? 'All Posts' : ''">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M3 4m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z" />
                    <path d="M7 8h10" />
                    <path d="M7 12h10" />
                    <path d="M7 16h10" />
                </svg>
                <span class="ml-3" x-show="!sidebarMinimized">All Posts</span>
            </a>
            <a href="{{ route('admin.blog.posts.create') }}" class="group flex items-center rounded-md px-3 py-2 text-sm font-medium @if(request()->routeIs('admin.blog.posts.create')) bg-accent text-white @else text-slate-300 hover:bg-accent/20 hover:text-white @endif" :title="sidebarMinimized ? 'Add New Post' : ''">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                    <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
                    <path d="M12 11l0 6" />
                    <path d="M9 14l6 0" />
                </svg>
                <span class="ml-3" x-show="!sidebarMinimized">Add New Post</span>
            </a>
            <a href="{{ route('admin.blog.posts.drafts') }}" class="group flex items-center rounded-md px-3 py-2 text-sm font-medium @if(request()->routeIs('admin.blog.posts.drafts')) bg-accent text-white @else text-slate-300 hover:bg-accent/20 hover:text-white @endif" :title="sidebarMinimized ? 'Drafts' : ''">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                    <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.415 -8.385z" />
                    <path d="M16 5l3 3" />
                </svg>
                <span class="ml-3" x-show="!sidebarMinimized">Drafts</span>
            </a>
            <a href="{{ route('admin.blog.categories.index') }}" class="group flex items-center rounded-md px-3 py-2 text-sm font-medium @if(request()->routeIs('admin.blog.categories.index')) bg-accent text-white @else text-slate-300 hover:bg-accent/20 hover:text-white @endif" :title="sidebarMinimized ? 'Categories' : ''">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M14 4h6v6h-6z" />
                    <path d="M4 14h6v6h-6z" />
                    <path d="M17 17m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                    <path d="M7 7m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                </svg>
                <span class="ml-3" x-show="!sidebarMinimized">Categories</span>
            </a>
        </div>

        <!-- Information -->
        <div class="pt-4" :class="!sidebarMinimized ? 'space-y-1' : 'space-y-2'">
            <h3 class="px-3 text-xs font-semibold uppercase text-slate-500" x-show="!sidebarMinimized">
                Information
            </h3>
            <a href="{{ route('admin.messages.index') }}" class="group flex items-center rounded-md px-3 py-2 text-sm font-medium @if(request()->routeIs('admin.messages.index')) bg-accent text-white @else text-slate-300 hover:bg-accent/20 hover:text-white @endif" :title="sidebarMinimized ? 'Contact Messages' : ''">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M3 7a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10z" />
                    <path d="M3 7l9 6l9 -6" />
                </svg>
                <span class="ml-3" x-show="!sidebarMinimized">Messages</span>
            </a>
            <a href="{{ route('admin.subscriptions.index') }}" class="group flex items-center rounded-md px-3 py-2 text-sm font-medium @if(request()->routeIs('admin.subscriptions.index')) bg-accent text-white @else text-slate-300 hover:bg-accent/20 hover:text-white @endif" :title="sidebarMinimized ? 'Subscriptions' : ''">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                    <path d="M6 21v-2a4 4 0 0 1 4 -4h4" />
                    <path d="M19 22v-6" />
                    <path d="M22 19l-6 0" />
                </svg>
                <span class="ml-3" x-show="!sidebarMinimized">Subscriptions</span>
            </a>
        </div>
    </nav>

    <!-- User area -->
        <div class="mt-auto shrink-0 border-t border-slate-800">
        <a href="#" class="flex items-center p-4" :class="{ 'justify-center': sidebarMinimized, 'hover:bg-accent/20': !sidebarMinimized }">
            <img class="h-10 w-10 rounded-full object-cover" src="https://ui-avatars.com/api/?name={{ session('admin_name') }}" alt="Admin">
            <div class="ml-3" x-show="!sidebarMinimized">
                <p class="text-sm font-semibold text-white">{{ session('admin_name') }}</p>
                <p class="text-xs text-slate-400">{{ session('admin_email') }}</p>
            </div>
        </a>
    </div>

    <!-- Sidebar Toggle -->
    <div class="shrink-0 border-t border-slate-800 p-2">
        <button @click="sidebarMinimized = !sidebarMinimized" class="hidden w-full items-center justify-center rounded-md p-2 text-slate-300 hover:bg-accent/20 hover:text-white lg:flex">
            <svg x-show="!sidebarMinimized" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M15 4l-8 8l8 8" />
            </svg>
            <svg x-show="sidebarMinimized" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M9 4l8 8l-8 8" />
            </svg>
        </button>
    </div>
</aside>