<header class="w-full  bg-primary text-secondary  text-sm top-0  left-0 z-50">


  <!-- <div class="bg-primary  p-2 md:flex justify-between hidden  dark:bg-[#0b1e1f]">
    <ul class="max-w-7xl  flex gap-4 justify-between mx-auto bg-primary dark:bg-[#0b1e1f]">
      <li class="flex gap-2">@svg('ionicon-location-sharp', 'w-5 h-5') 703 Waterford Way, Suite 600. Miami, FL 33126.</li>
      <li class="flex gap-2">@svg('eva-phone', 'w-5 h-5') (789) 484 5545</li>
    </ul>
    <ul class="max-w-7xl  flex justify-between mx-auto bg-primary dark:bg-[#0b1e1f]">
      <li class="flex gap-2">@svg('entypo-email', 'w-5 h-5') example@gmail.com</li>
    </ul>
  </div> -->
  <div class="max-w-6xl mx-auto flex items-center justify-between px-4 h-16">

    <!-- Logo -->
    <a href="/" class="text-xl font-semibold dark:text-[#EDEDEC] text-[#1b1b18]">
      flightflaremart
    </a>

    <!-- Desktop Nav -->
    <nav id="desktop-nav" class="hidden md:flex text-secondary items-center gap-6">

      <!-- Theme Toggle -->
      <div class="flex items-center gap-3">
        <div class="checkbox-wrapper-35 flex justify-center">
          <input value="private" name="switch" id="switch" type="checkbox" class="switch" />
          <label for="switch" class="cursor-pointer">
            <span class="switch-x-text">Theme</span>
            <span class="switch-x-toggletext">
              <span class="switch-x-unchecked">Light</span>
              <span class="switch-x-checked">Dark</span>
            </span>
          </label>
        </div>

        <!-- <button
          onclick="toggleTheme()"
          class="bg-accent text-primary dark:bg-[#4ddada] dark:text-[#0b1e1f] px-3 py-2 rounded-md font-medium hover:bg-highlight dark:hover:bg-[#d2c13d] transition">
          Toggle
        </button> -->
      </div>
      <ul class="flex gap-5 text-secondary text-base">
        <li><a href="/" class="hover:text-accent transition">Home</a></li>
        <li><a href="/about" class="hover:text-accent transition">About</a></li>
        <li><a href="/blog" class="hover:text-accent transition">Blog</a></li>
        <li><a href="/contact" class="hover:text-accent transition">Contact</a></li>
      </ul>
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
    </nav>

    <!-- Mobile Button (Animated Hamburger) -->
    <button class="button-three md:hidden" aria-expanded="false" id="menu-btn">
      <svg stroke="var(--button-color)" fill="none" class="hamburger" viewBox="-10 -10 120 120" width="40">
        <path class="line" stroke-width="10" stroke-linecap="round" stroke-linejoin="round"
          d="m 20 40 h 60 a 1 1 0 0 1 0 20 h -60 a 1 1 0 0 1 0 -40 h 30 v 80" />
      </svg>
    </button>
  </div>

  <!-- Mobile Dropdown -->
  <nav id="mobile-nav"
    class="hidden md:hidden bg-primary absolute  top-20 w-full dark:bg-[#0b1e1f] border-t border-[#19140035] dark:border-[#3E3E3A] transition-all duration-500">
    <ul class="flex flex-col items-center space-y-4 py-4 text-base">
      <li><a href="/" class="hover:text-accent transition">Home</a></li>
      <li><a href="/about" class="hover:text-accent transition">About</a></li>
      <li><a href="/blog" class="hover:text-accent transition">Blog</a></li>
      <li><a href="/contact" class="hover:text-accent transition">Contact</a></li>

      @auth
      <li class="text-[#1b1b18] dark:text-[#EDEDEC]">Hello, {{ Auth::user()->name }}</li>
      <li><a href="{{ route('logout') }}" class="hover:text-accent transition">Logout</a></li>
      @endauth
    </ul>
  </nav>
</header>

<div class="h-16"></div>