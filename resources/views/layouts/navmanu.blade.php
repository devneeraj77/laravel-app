<header class="w-full relative z-10 dark:bg-dark-primary text-accent text-sm dark:text-dark-light top-0 left-0 z-50">
  <div class="text-center font-medium py-2  bg-gradient-to-r from-base-200 dark:from-base-200/10  to-transparent dark:text-secondary">
    <p>Exclusive Price Drop! Hurry, <span class="underline underline-offset-2">Offer Ends Soon!</span></p>
  </div>
  <nav class="max-w-7xl font-sembold  mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between h-20">

    <!-- Logo -->
    <a href="/" class="flex justify-center items-center p-2 text-2xl p-2 text-accent font-semibold italic">
      <!-- <img src="/logo.png" class="p-4 md:p-2 md:py-6" width="100" height="100" alt=""> -->
      <em class="">flight<span class="text-secondary font-normal">faremart</span></em>
    </a>

    <div class="flex">
      <!-- Right Actions -->
      <div class="flex items-center space-x-4">
        <button
          onclick="toggleTheme()"
          class="bg-accent"
          aria-label="Toggle theme">
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
        <ul class="hidden md:flex items-center space-x-6 px-4 text-sm">
          <li>
            <a href="/" aria-current="page"
              class="relative mx-2 py-2 text-accent font-medium 
          rounded-md transition-colors dark:text-base-300
          after:content-[''] after:absolute after:left-0 after:bottom-0 
          after:w-0 after:h-[2px] after:bg-secondary after:transition-all after:duration-300 
          hover:after:w-full">
              Home
            </a>
          </li>
          <li>
            <a href="{{ route('about') }}"
              class="relative mx-2 py-2 text-accent font-medium 
          rounded-md transition-colors dark:text-secondary 
          after:content-[''] after:absolute after:left-0 after:bottom-0 
          after:w-0 after:h-[2px] after:bg-secondary after:transition-all after:duration-300 
          hover:after:w-full">
              About
            </a>

          </li>
          <li>
            <a href="{{ route('services') }}"
              class="relative mx-2 py-2 text-accent font-medium 
          rounded-md transition-colors dark:text-secondary 
          after:content-[''] after:absolute after:left-0 after:bottom-0 
          after:w-0 after:h-[2px] after:bg-secondary after:transition-all after:duration-300 
          hover:after:w-full">
              Services
            </a>
          </li>
          <li>
            <a href="{{ route('blog.index') }}"
              class="relative mx-2 py-2 text-accent font-medium 
          rounded-md transition-colors dark:text-secondary 
          after:content-[''] after:absolute after:left-0 after:bottom-0 
          after:w-0 after:h-[2px] after:bg-secondary after:transition-all after:duration-300 
          hover:after:w-full">
              Blog
            </a>
          </li>
          <li>
            <a href="{{ route('faqs') }}"
              class="relative mx-2 py-2 text-accent font-medium 
          rounded-md transition-colors dark:text-secondary 
          after:content-[''] after:absolute after:left-0 after:bottom-0 
          after:w-0 after:h-[2px] after:bg-secondary after:transition-all after:duration-300 
          hover:after:w-full">
              FAQs
            </a>
          </li>
          <li>
            <a href="{{ route('contact.create') }}"
              class="relative mx-2 py-2 text-accent font-medium 
          rounded-md transition-colors dark:text-secondary 
          after:content-[''] after:absolute after:left-0 after:bottom-0 
          after:w-0 after:h-[2px] after:bg-secondary after:transition-all after:duration-300 
          hover:after:w-full">
              Contact
            </a>
          </li>
        </ul>

        <!-- Auth / Menu Links -->
        @auth
        <span class="md:inline-block text-[#1b1b18] hidden  dark:text-[#EDEDEC]">
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
      <button id="menu-btn" class="md:hidden focus:outline-none dark:text-secondary" aria-label="Open menu">
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
  <div id="mobile-menu" class="absolute top-24 w-full hidden md:hidden bg-base-100 dark:bg-black border-t border-secondary dark:border-dark-secondary shadow-md">
    <ul class="flex flex-col items-center space-y-4 py-4 text-light dark:text-secondary text-sm">
      <li>
        <a href="/" class="hover:text-accent transition-colors">Home</a>
      </li>
      <li>
        <a href="{{ route('about') }}" class="hover:text-accent transition-colors">About</a>
      </li>
      <li>
        <a href="{{ route('services') }}" class="hover:text-accent transition-colors">Services</a>
      </li>
      <li>
        <a href="{{ route('blog.index') }}" class="hover:text-accent transition-colors">Blog</a>
      </li>
      <li>
        <a href="{{ route('faqs') }}" class="hover:text-accent transition-colors">FAQs</a>
      </li>
      <li>
        <a href="{{ route('contact.create') }}" class="hover:text-accent transition-colors">Contact</a>
      </li>
    </ul>
  </div>

</header>
<!-- Page padding for fixed navbar -->