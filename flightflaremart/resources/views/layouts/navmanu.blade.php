<header class="w-full backdrop-blur-sm  dark:bg-dark-primary text-secondary dark:text-dark-light  top-0 left-0 z-50">
  <nav class="max-w-7xl  mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between h-16">

    <!-- Logo -->
    <div class="flex items-center space-x-2">
      <span class="text-base sm:text-2xl font-bold text-secondary italic dark:text-primary">Flight<span class="text-accent dark:text-secondary">faremart</span></span>
    </div>

    <div class="flex ">
      <!-- Right Actions -->
      <div class="flex items-center space-x-4">
        <button
          onclick="toggleTheme()"
          class="bg-accent">
        </button>
        <div class="checkbox-wrapper-35 flex justify-center">
          <input value="private" name="switch" id="switch" type="checkbox" class="switch">
          <label for="switch">
            <span class="switch-x-text">Theme</span>
            <span class="switch-x-toggletext">
              <span class="switch-x-unchecked">Light</span>
              <span class="switch-x-checked">Dark</span>
            </span>
          </label>
        </div>
        <!-- Desktop Menu -->
        <div class="hidden md:flex space-x-4 text-sm px-3 text-accent  font-medium">
          <a href="#" aria-current="page"  class="px-1 py-2 text-sm  font-medium text-accent bg-trans hover:bg-white/5 hover:text-secondary dark:text-primary ">Home</a>
          <a href="#" class="px-1 py-2 text-sm font-medium text-accent hover:bg-white/5 hover:text-secondary dark:text-secondary">Services</a>
          <a href="#" class="px-1 py-2 text-sm font-medium text-accent hover:bg-white/5 hover:text-secondary dark:text-secondary">blog</a>
          <a href="#" class="px-1 py-2 text-sm font-medium text-accent hover:bg-white/5 hover:text-secondary dark:text-secondary">Contact</a>
        </div>
        <!-- Auth / Menu Links -->
        @auth
        <span class="inline-block text-[#1b1b18] dark:text-[#EDEDEC]">
          Hello, {{ Auth::user()->name }}
        </span>
        <a href="{{ route('logout') }}"
          class="inline-block px-4 py-1.5 border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] text-[#1b1b18] dark:text-[#EDEDEC] rounded-sm text-sm leading-normal">
          Logout
        </a>
        @else
        @endauth
      </div>

      <!-- Mobile Menu Button -->
      <button id="menu-btn" class="md:hidden focus:outline-none">
        <svg id="menu-icon" xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-light dark:text-dark-light" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
        <svg id="close-icon" xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-light dark:text-dark-light hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
      </button>
    </div>
  </nav>

  <!-- Mobile Menu -->
  <div id="mobile-menu" class="absolute  top-16 w-full hidden md:hidden bg-primary dark:bg-dark-primary border-t border-secondary dark:border-dark-secondary">
    <div class="flex flex-col items-center space-y-4 py-4 text-light dark:text-dark-light">
      <a href="#" class="hover:text-accent transition">Home</a>
      <a href="#" class="hover:text-accent transition">Services</a>
      <a href="#" class="hover:text-accent transition">Works</a>
      <a href="#" class="hover:text-accent transition">Contact</a>
    </div>
  </div>
</header>

<!-- Page padding for fixed navbar -->
<div class="h-16 "></div>