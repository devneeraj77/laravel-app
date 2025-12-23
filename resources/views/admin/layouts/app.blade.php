<!DOCTYPE html>
@include('layouts.htmlcore')

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard - @yield('title', 'Welcome')</title>
  @include('admin.layouts.adminHead')
  {{-- Alpine.js for small interactivity (sidebar toggle, dropdowns) --}}
  @cloudinaryJS
  <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
  <style>
    /* CSS to hide Alpine.js elements until they are initialized */
    [x-cloak] {
      display: none !important;
    }
  </style>
</head>

<body class="md:w-full text-left text-sm hover:bg-base-300">
  @include('admin.layouts.preloading')

  <div x-data="{ sidebarOpen: false, sidebarMinimized: true }" x-cloak class="flex h-screen overflow-hidden">

    @include('admin.layouts.sidebar')

    <div x-show="sidebarOpen" x-transition.opacity class="fixed inset-0 z-20 bg-black/50 sm:hidden" @click="sidebarOpen = false"></div>

    <div class="flex flex-1 flex-col overflow-hidden"
      :class="{'lg:ml-auto': !sidebarMinimized, 'md:ml-auto': sidebarMinimized}">
      @include('admin.layouts.adminHeader')


      <main class="flex-1 overflow-y-auto p-4 sm:p-6 lg:p-8">

        {{-- MAIN CONTENT YIELD --}}
        @yield('content')

        <footer class="mt-8 text-center text-xs text-slate-400">
          © {{ date('Y') }} FlightFareMart — Admin Dashboard <br>
          <pre>Created by <a href="https://www.github.com/devneeraj77">neerajrekwar</a></pre>
        </footer>

      </main>
    </div>
  </div>
  <script src="{{ asset('js/app.js') }}"></script>
  @stack('scripts')

</body>

</html>