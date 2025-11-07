
<header class="w-full bg-primary dark:bg-dark-primary text-light dark:text-dark-light shadow-md fixed top-0 left-0 z-50">
  <nav class="max-w-7xl border mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between h-16">

    <!-- Logo -->
    <div class="flex items-center space-x-2">
      <span class="text-2xl font-bold text-accent dark:text-dark-accent">FlightFlareMart</span>
    </div>

    <!-- Desktop Menu -->
    <div class="hidden md:flex space-x-8 text-sm font-medium">
      <a href="#" class="hover:text-accent transition">Home</a>
      <a href="#" class="hover:text-accent transition">Services</a>
      <a href="#" class="hover:text-accent transition">Works</a>
      <a href="#" class="hover:text-accent transition">Contact</a>
    </div>

    <!-- Right Actions -->
    <div class="flex items-center space-x-4">
      <button
      onclick="toggleTheme()"
      class="bg-accent ">
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

      <!-- Mobile Menu Button -->
      <button id="menu-btn" class="md:hidden focus:outline-none">
        <svg id="menu-icon" xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-light dark:text-dark-light" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
        </svg>
        <svg id="close-icon" xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-light dark:text-dark-light hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
        </svg>
      </button>
    </div>
  </nav>
  
  <!-- Mobile Menu -->
  <div id="mobile-menu" class="hidden md:hidden bg-primary dark:bg-dark-primary border-t border-secondary dark:border-dark-secondary">
    <div class="flex flex-col items-center space-y-4 py-4 text-light dark:text-dark-light">
      <a href="#" class="hover:text-accent transition">Home</a>
      <a href="#" class="hover:text-accent transition">Services</a>
      <a href="#" class="hover:text-accent transition">Works</a>
      <a href="#" class="hover:text-accent transition">Contact</a>
    </div>
  </div>
</header>

<!-- Page padding for fixed navbar -->
<div class="h-16"></div>
