<header class="w-full border-b border-slate-200 bg-white">
  <div class="mx-auto flex h-16 max-w-7xl items-center justify-between px-4 sm:px-6 lg:px-8">

    <div class="flex items-center gap-3">
      <button @click="sidebarOpen = !sidebarOpen" class="inline-flex items-center gap-2 rounded-md p-2 text-slate-600 hover:bg-slate-100 lg:hidden ">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" class="icon icon-tabler text-accent icons-tabler-filled icon-tabler-layout-sidebar">
          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
          <path d="M6 21a3 3 0 0 1 -3 -3v-12a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v12a3 3 0 0 1 -3 3zm12 -16h-8v14h8a1 1 0 0 0 1 -1v-12a1 1 0 0 0 -1 -1" />
        </svg>
        <span class="sr-only">Open sidebar</span>
      </button>

      <div class="hidden sm:flex sm:items-center sm:gap-4 ">
        {{-- PAGE TITLE --}}
        <h1 class="text-lg font-semibold">@yield('page_title', 'Dashboard')</h1>
        {{-- BREADCRUMB --}}
        <nav class="text-sm text-slate-500">@yield('breadcrumb')</nav>
      </div>
    </div>

    <div class="flex items-center gap-4">
      <div class="hidden sm:flex sm:items-center sm:gap-3">
      </div>

      <div x-data="{ open: false }" class="relative">
        <button @click="open = !open" class="flex items-center gap-2 rounded-full bg-white p-1 text-sm hover:shadow">
          <img class="h-8 w-8 rounded-full" src="https://ui-avatars.com/api/?name={{ session('admin_name') }}" alt="Admin">
          <span class="hidden sm:inline-block text-sm font-medium">Welcome, {{ session('admin_name') }}</span>
          <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
          </svg>
        </button>

        <div x-show="open" **x-cloak** @click.outside="open = false" x-transition class="absolute text-accent right-0 mt-2 w-44 rounded-md border border-slate-100 bg-white shadow-lg">
          <a href="#" class="block px-4 py-2 text-sm hover:bg-base-300">Profile</a>
          <a href="#" class="block px-4 py-2 text-sm hover:bg-base-300">Settings</a>
          <a href="{{ route('admin.logout') }}" class="text-decoration-none text-accent block px-4 py-2 text-sm hover:bg-base-300">Logout</a>
        </div>
      </div>
    </div>

  </div>
</header>