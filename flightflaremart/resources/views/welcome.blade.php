<!DOCTYPE html>

@include('layouts.htmlcore')

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="//unpkg.com/alpinejs" defer></script>
  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
  @include('layouts.head')
  <!-- @vite(['resources/css/app.css', 'resources/js/app.js']) -->
  <!-- <script src="https://cdn.tailwindcss.com"></script> -->
</head>

<body class=" antialiased bg-primary font-display dark:bg-black dark:text-secondary  px-2 ">
  @include('layouts.navmanu')
  <main>
    <section class="flex mx-auto max-w-6xl min-h-96 flex-col max-md:gap-20 md:flex-row pb-20 items-center justify-between md:mt-5 ">
      <div class="flex  flex-col items-center md:items-start">
        <div class="flex flex-wrap items-center justify-center p-1.5 rounded-full border border-slate-600 text-black text-xs">
          <div class="flex items-center">
            <img class="size-7 rounded-full border-3 border-white"
              src="https://images.unsplash.com/photo-1633332755192-727a05c4013d?q=80&w=50" alt="userImage1">
            <img class="size-7 rounded-full border-3 border-white -translate-x-2"
              src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?q=80&w=50" alt="userImage2">
            <img class="size-7 rounded-full border-3 border-white -translate-x-4"
              src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?q=80&w=50&h=50&auto=format&fit=crop"
              alt="userImage3">
          </div>
          <p class="-translate-x-2">Join community of 1m+ founders </p>
        </div>
        <h1 class="text-center text-accent dark:text-secondary md:text-left text-5xl leading-[68px] md:text-6xl md:leading-[84px] font-medium max-w-xl ">
          Find Your Perfect Flight, Guaranteed Lowest Fare.
        </h1>
        <p class="text-center md:text-left dark:text-slate-50 text-sm  max-w-lg mt-2">
          Unlock smarter workflows with AI tools designed to boost productivity, simplify tasks and help you do more with less effort.
        </p>
        <div class="flex items-center gap-4 mt-8 text-sm">
          <button class="bg-accent hover:bg-accent/20 text-primary active:scale-95 rounded-md px-7 h-11">
            Get started
          </button>
          <button class="flex items-center gap-2 border border-slate-600 active:scale-95 hover:bg-white/10 transition text-black rounded-md px-6 h-11">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-video-icon lucide-video">
              <path d="m16 13 5.223 3.482a.5.5 0 0 0 .777-.416V7.87a.5.5 0 0 0-.752-.432L16 10.5" />
              <rect x="2" y="6" width="14" height="12" rx="2" />
            </svg>
            <span>Watch demo</span>
          </button>
        </div>
      </div>
      <!-- <img src="https://raw.githubusercontent.com/prebuiltui/prebuiltui/main/assets/hero/hero-section-showcase-3.png" alt="hero" class="max-w-xs sm:max-w-sm lg:max-w-md transition-all duration-300"> -->
      <div class="w-full sm:max-w-sm lg:max-w-md transition-all duration-300 px-4">
        <x-flight-search-form />

      </div>
    </section>
    <!-- section 2 -->
    <section class="py-5  mx-auto max-w-7xl">
      <p class="mx-auto px-5 md:px-4 max-w-6xl text-xl ">Trip on</p>
      <h2 class="text-4xl  md:text-6xl mx-auto max-w-6xl px-5 md:px-3">Popular Flight Deals Right Now</h2>
      <div class="flex-1 md:flex my-6 bg-trans items-center">
        <div class="basis-4/3">
          <div class="container mx-auto px-4 md:py-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
              <!-- Large item -->
              <div class="md:col-span-2 md:row-span-2 relative overflow-hidden rounded-2xl shadow-lg group">
                <img src="https://images.unsplash.com/photo-1485871981521-5b1fd3805eee?q=80&w=870&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Nature" class="w-full h-full object-cover object-center transition duration-500 group-hover:scale-105">
                <div
                  class="absolute inset-0 bg-black bg-opacity-60 opacity-0 group-hover:opacity-50 transition-opacity duration-300">
                  <div class="absolute bottom-0 left-0 right-0 p-4">
                    <h3 class="text-2xl font-bold text-white">New York</h3>
                    <p class="text-white">Discover the beauty of the natural world</p>
                  </div>
                </div>
              </div>

              <!-- Two small items -->
              <div class="relative overflow-hidden rounded-2xl shadow-lg group">
                <img src="https://images.unsplash.com/photo-1618259278412-2819cbdea4dc?q=80&w=821&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Food" class="w-full h-48 object-cover object-center transition duration-500 group-hover:scale-105 object-center transition duration-500 group-hover:scale-105">
                <div
                  class="absolute inset-0 bg-black bg-opacity-60 opacity-0 group-hover:opacity-50 transition-opacity duration-300">
                  <div class="absolute bottom-0 left-0 right-0 p-4">
                    <h4 class="text-xl font-bold text-white">Germany</h4>
                  </div>
                </div>
              </div>
              <div class="relative overflow-hidden rounded-2xl shadow-lg group">
                <img src="https://images.unsplash.com/photo-1547448415-e9f5b28e570d?q=80&w=870&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Technology" class="w-full h-48 object-cover object-center transition duration-500 group-hover:scale-105">
                <div
                  class="absolute inset-0 bg-black bg-opacity-60 opacity-0 group-hover:opacity-50 transition-opacity duration-300">
                  <div class="absolute bottom-0 left-0 right-0 p-4">
                    <h4 class="text-xl font-bold text-white">Moscow</h4>
                  </div>
                </div>
              </div>

              <!-- Three medium items -->
              <div class="relative overflow-hidden rounded-2xl shadow-lg group">
                <img src="https://images.unsplash.com/photo-1499856871958-5b9627545d1a?q=80&w=820&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Travel" class="w-full h-48 object-cover object-center transition duration-500 group-hover:scale-105">
                <div
                  class="absolute inset-0 bg-black bg-opacity-60 opacity-0 group-hover:opacity-50 transition-opacity duration-300">
                  <div class="absolute bottom-0 left-0 right-0 p-4">
                    <h4 class="text-xl font-bold text-white">France</h4>
                  </div>
                </div>
              </div>
              <div class="relative overflow-hidden rounded-2xl shadow-lg group">
                <img src="https://images.unsplash.com/photo-1488747279002-c8523379faaa?q=80&w=870&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Art" class="w-full h-48 object-cover object-center transition duration-500 group-hover:scale-105">
                <div
                  class="absolute inset-0 bg-black bg-opacity-60 opacity-0 group-hover:opacity-50 transition-opacity duration-300">
                  <div class="absolute bottom-0 left-0 right-0 p-4">
                    <h4 class="text-xl font-bold text-white">London(UK)</h4>
                  </div>
                </div>
              </div>

              <!-- bottom cards -->
              <div class="relative overflow-hidden rounded-2xl shadow-lg group">
                <img src="https://plus.unsplash.com/premium_photo-1697730336238-5d1d342127e8?q=80&w=945&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Sport" class="w-full h-48 object-cover object-center transition duration-500 group-hover:scale-105">
                <div
                  class="absolute inset-0 bg-black bg-opacity-60 opacity-0 group-hover:opacity-50 transition-opacity duration-300">
                  <div class="absolute bottom-0 left-0 right-0 p-4">
                    <h4 class="text-xl font-bold text-white">Mexico</h4>
                  </div>
                </div>
              </div>
              <div class="relative overflow-hidden rounded-2xl shadow-lg group">
                <img src="https://images.unsplash.com/photo-1520175480921-4edfa2983e0f?q=80&w=1467&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Sport" class="w-full h-48 object-cover object-center transition duration-500 group-hover:scale-105">
                <div
                  class="absolute inset-0 bg-black bg-opacity-60 opacity-0 group-hover:opacity-50 transition-opacity duration-300">
                  <div class="absolute bottom-0 left-0 right-0 p-4">
                    <h4 class="text-xl font-bold text-white">Italy</h4>
                  </div>
                </div>
              </div>
              <div class="relative overflow-hidden rounded-2xl shadow-lg group">
                <img src="https://plus.unsplash.com/premium_photo-1661962958462-9e52fda9954d?q=80&w=870&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Sport" class="w-full h-48 object-cover object-center transition duration-500 group-hover:scale-105">
                <div
                  class="absolute inset-0 bg-black bg-opacity-60 opacity-0 group-hover:opacity-50 transition-opacity duration-300">
                  <div class="absolute bottom-0 left-0 right-0 p-4">
                    <h4 class="text-xl font-bold text-white">Thailand</h4>
                  </div>
                </div>
              </div>
              <div class="relative overflow-hidden rounded-2xl shadow-lg group">
                <img src="https://images.unsplash.com/photo-1624138784614-87fd1b6528f8?q=80&w=1033&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Sport" class="w-full h-48 object-cover object-center transition duration-500 group-hover:scale-105">
                <div
                  class="absolute inset-0 bg-black bg-opacity-60 opacity-0 group-hover:opacity-50 transition-opacity duration-300">
                  <div class="absolute bottom-0 left-0 right-0 p-4">
                    <h4 class="text-xl font-bold text-white">Australia</h4>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="basis-2/3 h-min-60 p-3 w-full mt-3 md:mt-6 ">
          <h3 class="text-2xl text-accent dark:text-secondary sm:text-3xl px-3  font-semibold">Lorem ipsum dolor sit.</h3>
          <p class="py-2 px-3 dark:text-base-300">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quisquam aliquid consequatur eum. Laudantium, quaerat quibusdam suscipit voluptatem consequuntur esse consequatur?</p>
          <p class="py-2 px-3 dark:text-base-300">Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia perspiciatis eaque, harum ex doloremque sed.</p>
          <a href="#" class="text-base underline p-3 my-2 pt-5">Find more</a>
          <div class="flex justify-start p-8 items-end h-64 mx-3 my-4 dark:bg-secondary rounded-3xl mt-6 md:mt-10 bg-base-300">
            <a href="#" class="flex gap-2 content-center items-center text-dark dark:text-accent">Grab Now
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-8">
                <path fill-rule="evenodd" d="M5.22 14.78a.75.75 0 0 0 1.06 0l7.22-7.22v5.69a.75.75 0 0 0 1.5 0v-7.5a.75.75 0 0 0-.75-.75h-7.5a.75.75 0 0 0 0 1.5h5.69l-7.22 7.22a.75.75 0 0 0 0 1.06Z" clip-rule="evenodd" />
              </svg>
            </a>
          </div>
        </div>
      </div>
    </section>
    <section class="min-h-screen">
      <p class="mx-auto px-5 md:px-3 max-w-6xl">Trust & Social Proof Section</p>
      <h2 class="text-2xl md:text-6xl mx-auto max-w-6xl px-5 md:px-3">Join Thousands of Happy Travelers</h2>

    </section>
    <section class="min-h-screen">
      <h2 class="text-2xl md:text-6xl mx-auto max-w-6xl px-5 md:px-3">Where Will You Explore Next?</h2>

    </section>
    <section class="min-h-screen">
      <p class="mx-auto px-5 md:px-3 max-w-6xl">Trust & Social Proof Section</p>
      <h2 class="text-2xl md:text-6xl mx-auto max-w-6xl px-5 md:px-3">The FlightFareMart Difference</h2>

    </section>
    <section class="min-h-screen">
      <h2 class="text-2xl md:text-6xl mx-auto max-w-6xl px-5 md:px-3">Never Miss a Takeoff</h2>

    </section>
  </main>
  @include('layouts.footer')
</body>

</html>