<!DOCTYPE html>

@include('layouts.htmlcore')

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
  <!-- <title>{{ config('app.name', 'Laravel') }}</title> -->
  <title>FlightFareMart | Find the Cheapest Flights & Best Airfare Deals</title>
  <meta name="description" content="FlightFareMart is your trusted source for finding the cheapest flights worldwide. Compare airfare, discover deals, and book your next trip with guaranteed low prices.">
  <meta name="keywords" content="FlightFareMart, cheapest flights, flight booking, best airfare deals, low cost airline tickets, discount flights, flight comparison, travel deals, book flights online">
  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
  @include('layouts.head')
  <!-- @vite(['resources/css/app.css', 'resources/js/app.js']) -->
  <!-- <script src="https://cdn.tailwindcss.com"></script> -->
</head>

<body class=" antialiased bg-primary   overflow-x-hidden font-display dark:bg-black dark:text-secondary  px-2 ">
  <x-preloading />
  @include('layouts.navmanu')
  <main>
    <section class="overflow-hidden max-w-7xl mx-auto md:mb-20 lg:mb-30 lg:mt-4">
      <div class="relative py-8">
        <img
          src="img/aircraft_usu4.svg"
          alt="Stylized aircraft illustration"
          class="absolute -right-15 top-2 sm:left-20 sm:-top-10 md:left-50 md:-top-30 lg:left-50 lg:-top-25 z-30 -rotate-25 md:-rotate-15 lg:-rotate-3"
          width="950"
          height="200"
          fetchpriority="high"
          srcset="img/aircraft_usu4.svg 950w, img/aircraft_usu4.svg 480w"
          sizes="(max-width: 640px) 480px, 950px" />

      </div>
      <div class="flex flex-col relative  max-md:gap-20 md:flex-row pb-8 items-center justify-between mt-20 px-4 ">
        <div class=" flex flex-col z-40  items-center md:items-start">
          <div class="flex flex-wrap p-3 backdrop-blur-sm items-center justify-center p-1.5 rounded-full border border-secondary text-white text-xs">
            <div class="flex items-center ">
              <img class="size-7 rounded-full border-3 border-white"
                src="/img/mbr/m-5.webp" alt="userImage1">
              <img class="size-7 rounded-full border-3 border-white -translate-x-2"
                src="/img/mbr/m-2.webp" alt="userImage2">
              <img class="size-7 rounded-full border-3 border-white -translate-x-4"
                src="/img/mbr/m-1.webp"
                alt="userImage3">
            </div>
            <p class="-translate-x-2 text-slate-500 ">Grab of 100+ countries deals </p>
          </div>
          <h1 class="text-center mt-4 md:text-left text-4xl lg:text-6xl leading-[48px] md:text-5xl md:leading-[74px] font-medium max-w-xl text-accent dark:text-secondary">
            Find Your Perfect Flight, Guaranteed Lowest Fare.
          </h1>
          <p class="text-center text-accent md:text-left text-base dark:text-base-300 max-w-lg mt-2">
            Quickly discover the best deals from hundreds of <strong>600+ airlines and travel providers.</strong> Your exciting journey begins right here!
          </p>
          <!-- <div class="flex items-center gap-4 mt-8 text-sm">
          <button class="bg-accent hover:bg-base-200 text-primary active:scale-95 hover:text-accent duration-300 ease-in rounded-md px-7 h-11">
            Book Now
          </button>
          <button class="flex items-center gap-2 border border-slate-600 active:scale-95 hover:bg-white/10 transition text-accent rounded-md px-6 h-11">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-video-icon lucide-video">
              <path d="m16 13 5.223 3.482a.5.5 0 0 0 .777-.416V7.87a.5.5 0 0 0-.752-.432L16 10.5" />
              <rect x="2" y="6" width="14" height="12" rx="2" />
            </svg>
            <span>Watch demo</span>
          </button>-->
        </div>
        <!-- <img src="https://raw.githubusercontent.com/prebuiltui/prebuiltui/main/assets/hero/hero-section-showcase-3.png" alt="hero" class="max-w-xs sm:max-w-sm lg:max-w-md transition-all duration-300"> -->
        <div class=" z-40 w-90 md:w-fit md:ml-18">
          <x-flight-search-form class="relative" />
        </div>
      </div>

    </section>
    <section>
      <!-- add -->
    </section>
    <!-- section 2 -->
    <section class="py-24 mx-auto max-w-7xl">
      <p class="mx-auto px-5 md:px-4 max-w-6xl md:text-xl text-base text-center ">Trip on</p>
      <h2 class="text-4xl  md:text-6xl mx-auto text-accent dark:text-secondary max-w-6xl px-5 md:px-3 text-center">Popular Flight Deals Right Now</h2>
      <div class="flex-1 md:flex my-6 bg-trans items-center">
        <div class="basis-4/3">
          <div class="container mx-auto px-4 md:py-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
              <!-- Large item -->
              <div class="md:col-span-2 md:row-span-2 relative overflow-hidden rounded-2xl shadow-lg group">
                <img src="https://images.unsplash.com/photo-1485871981521-5b1fd3805eee?q=80&w=870&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Nature" class="w-full h-full object-cover object-center transition duration-500 group-hover:scale-105" loading="lazy">
                <div
                  class="absolute inset-0 bg-black bg-opacity-60 opacity-0 group-hover:opacity-50 transition-opacity duration-300">
                  <div class="absolute bottom-0 left-0 right-0 p-4">
                    <span class="text-2xl font-bold text-white">New York</span>
                    <p class="text-white">Discover the beauty of the natural world</p>
                  </div>
                  
                </div>
              </div>

              <!-- Two small items -->
              <div class="relative overflow-hidden rounded-2xl shadow-lg group">
                <img src="https://images.unsplash.com/photo-1618259278412-2819cbdea4dc?q=80&w=821&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Food" class="w-full h-48 object-cover object-center transition duration-500 group-hover:scale-105 object-center transition duration-500 group-hover:scale-105" loading="lazy">
                <div
                  class="absolute inset-0 bg-black bg-opacity-60 opacity-0 group-hover:opacity-50 transition-opacity duration-300">
                  <div class="absolute bottom-0 left-0 right-0 p-4">
                    <span class="text-xl font-bold text-white">Germany</span>
                  </div>
                </div>
              </div>
              <div class="relative overflow-hidden rounded-2xl shadow-lg group">
                <img src="https://images.unsplash.com/photo-1547448415-e9f5b28e570d?q=80&w=870&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Technology" class="w-full h-48 object-cover object-center transition duration-500 group-hover:scale-105" loading="lazy">
                <div
                  class="absolute inset-0 bg-black bg-opacity-60 opacity-0 group-hover:opacity-50 transition-opacity duration-300">
                  <div class="absolute bottom-0 left-0 right-0 p-4">
                    <span class="text-xl font-bold text-white">Moscow</span>
                  </div>
                </div>
              </div>

              <!-- Three medium items -->
              <div class="relative overflow-hidden rounded-2xl shadow-lg group">
                <img src="https://images.unsplash.com/photo-1499856871958-5b9627545d1a?q=80&w=820&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Travel" class="w-full h-48 object-cover object-center transition duration-500 group-hover:scale-105" loading="lazy">
                <div
                  class="absolute inset-0 bg-black bg-opacity-60 opacity-0 group-hover:opacity-50 transition-opacity duration-300">
                  <div class="absolute bottom-0 left-0 right-0 p-4">
                    <span class="text-xl font-bold text-white">France</span>
                  </div>
                </div>
              </div>
              <div class="relative overflow-hidden rounded-2xl shadow-lg group">
                <img src="https://images.unsplash.com/photo-1488747279002-c8523379faaa?q=80&w=870&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Art" class="w-full h-48 object-cover object-center transition duration-500 group-hover:scale-105" loading="lazy">
                <div
                  class="absolute inset-0 bg-black bg-opacity-60 opacity-0 group-hover:opacity-50 transition-opacity duration-300">
                  <div class="absolute bottom-0 left-0 right-0 p-4">
                    <span class="text-xl font-bold text-white">London(UK)</span>
                  </div>
                </div>
              </div>

              <!-- bottom cards -->
              <div class="relative overflow-hidden rounded-2xl shadow-lg group">
                <img src="https://plus.unsplash.com/premium_photo-1697730336238-5d1d342127e8?q=80&w=945&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Sport" class="w-full h-48 object-cover object-center transition duration-500 group-hover:scale-105" loading="lazy">
                <div
                  class="absolute inset-0 bg-black bg-opacity-60 opacity-0 group-hover:opacity-50 transition-opacity duration-300">
                  <div class="absolute bottom-0 left-0 right-0 p-4">
                    <span class="text-xl font-bold text-white">Mexico</span>
                  </div>
                </div>
              </div>
              <div class="relative overflow-hidden rounded-2xl shadow-lg group">
                <img src="https://images.unsplash.com/photo-1520175480921-4edfa2983e0f?q=80&w=1467&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Sport" class="w-full h-48 object-cover object-center transition duration-500 group-hover:scale-105" loading="lazy">
                <div
                  class="absolute inset-0 bg-black bg-opacity-60 opacity-0 group-hover:opacity-50 transition-opacity duration-300">
                  <div class="absolute bottom-0 left-0 right-0 p-4">
                    <span class="text-xl font-bold text-white">Italy</span>
                  </div>
                </div>
              </div>
              <div class="relative overflow-hidden rounded-2xl shadow-lg group">
                <img src="https://plus.unsplash.com/premium_photo-1661962958462-9e52fda9954d?q=80&w=870&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Sport" class="w-full h-48 object-cover object-center transition duration-500 group-hover:scale-105" loading="lazy">
                <div
                  class="absolute inset-0 bg-black bg-opacity-60 opacity-0 group-hover:opacity-50 transition-opacity duration-300">
                  <div class="absolute bottom-0 left-0 right-0 p-4">
                    <span class="text-xl font-bold text-white">Thailand</span>
                  </div>
                </div>
              </div>
              <div class="relative overflow-hidden rounded-2xl shadow-lg group">
                <img src="https://images.unsplash.com/photo-1624138784614-87fd1b6528f8?q=80&w=1033&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Sport" class="w-full h-48 object-cover object-center transition duration-500 group-hover:scale-105" loading="lazy">
                <div
                  class="absolute inset-0 bg-black bg-opacity-60 opacity-0 group-hover:opacity-50 transition-opacity duration-300">
                  <div class="absolute bottom-0 left-0 right-0 p-4">
                    <span class="text-xl font-bold text-white">Australia</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="basis-2/3 h-min-60 p-3 w-full mt-3 md:mt-6 ">
          <h3 class="text-2xl text-accent dark:text-secondary sm:text-3xl px-3  font-semibold">You are planning the next trip!</h3>
          <p class="py-2 px-3 dark:text-base-300">Plan your next trip to fulfill your desires. Visit our top trending page, which helps you find outstanding deals in great destinations. Our website brings all those things which make your journey.  </p>
          <p class="py-2 px-3 dark:text-base-300">Discover those destinations that make you relax and create unforgettable memories. Whether you're planning any big international journey or a normal weekend getaway.  </p>
          <a href="#" class="text-base underline p-3 my-2 pt-5">Find more</a>
          <div class="flex justify-between items-start flex-col p-8 items-end h-64 mx-3 my-4 dark:bg-secondary rounded-3xl mt-6 md:mt-10 bg-base-300">
            <div class="text-3xl dark:text-accent">
              <span>Flightfaremart brings you the best flight deals and travel offers in real time.</span>
            </div>
            <a href="#" class="flex gap-2 content-center items-center text-dark dark:text-accent">Grab Now
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-8">
                <path fill-rule="evenodd" d="M5.22 14.78a.75.75 0 0 0 1.06 0l7.22-7.22v5.69a.75.75 0 0 0 1.5 0v-7.5a.75.75 0 0 0-.75-.75h-7.5a.75.75 0 0 0 0 1.5h5.69l-7.22 7.22a.75.75 0 0 0 0 1.06Z" clip-rule="evenodd" />
              </svg>
            </a>
          </div>
        </div>
      </div>
    </section>
    <section class="bg-base-200 dark:bg-black  py-12 md:py-20 px-4 sm:px-6 lg:px-8">
      <div class="max-w-7xl mx-auto">
        <h2 class="text-4xl md:text-6xl text-accent dark:text-secondary  mx-auto max-w-6xl text-center px-5 md:px-3 ">Where Will You Explore Next?</h2>
        <p class="mt-4 mx-auto px-5 md:px-4 max-w-6xl text-lg dark:text-secondary/50 text-accent/80 my-2 pb-3">This section engages users who are browsing rather than searching for a specific flight, helping convert passive interest into active search.</p>
        <div class="max-w-6xl mx-auto">
          <div class=" md:flex  py-8 mb-12 md:mb-16">
            <p class="mt-4 p-4 md:p-8 text-xl  text-accent/80 dark:text-base-200 max-w-3xl mx-auto">
              Discover destinations that inspire adventure, relaxation, and unforgettable memories. Whether you're planning a spontaneous weekend getaway or mapping out your next big international journey, <strong class="text-accent dark:text-secondary font-normal">FlightFareMart</strong> brings you the best flight deals and travel offers in real time.
            </p>
            <p class="mt-2 p-4 md:p-8 bg-base-300 dark:bg-accent/20 rounded-lg text-back/70 max-w-4xl mx-auto">
              From sun-soaked beaches to buzzing city skylines, our curated destinations help you find the perfect trip at the perfect price.
            </p>
          </div>
          <div class="mb-12 md:mb-16">
            <h3 class="text-3xl font-bold text-accent dark:text-secondary mb-6 border-b-2 border-secondary pb-2">
              Top Trending Destinations
            </h3>
            @php
            $destinations = [
            [
            'city' => 'Miami',
            'caption' => 'Fly to the Magic City with fares starting as low as $150.',
            'image' => 'https://images.unsplash.com/photo-1514214246283-d427a95c5d2f?q=80&w=780&auto=format&fit=crop',
            ],
            [
            'city' => 'London',
            'caption' => 'Fly to the Magic City with fares starting as low as $150.',
            'image' => 'https://plus.unsplash.com/premium_photo-1671734045770-4b9e1a5e53a0?q=80&w=774&auto=format&fit=crop',
            ],
            [
            'city' => 'Paris',
            'caption' => 'Fly to the Magic City with fares starting as low as $150.',
            'image' => 'https://images.unsplash.com/photo-1511739001486-6bfe10ce785f?q=80&w=387&auto=format&fit=crop',
            ],
            [
            'city' => 'Singapore',
            'caption' => 'Fly to the Magic City with fares starting as low as $150.',
            'image' => 'https://images.unsplash.com/photo-1720941001711-2d1a1d46cc83?q=80&w=387&auto=format&fit=crop',
            ],
            [
            'city' => 'Dubai',
            'caption' => 'Fly to the Magic City with fares starting as low as $150.',
            'image' => 'https://images.unsplash.com/photo-1518684079-3c830dcef090?q=80&w=387&auto=format&fit=crop',
            ],
            ];
            @endphp

            <div class="flex flex-wrap items-center justify-center mt-10 mx-auto gap-4 mb-3 md:mb-8 lg:mb-14">

              @foreach ($destinations as $d)
              <div class="relative">
                <img
                  class="max-w-56 h-80 object-cover rounded-lg hover:-translate-y-1 transition-all duration-300 cursor-pointer"
                  src="{{ $d['image'] }}"
                  alt="{{ $d['city'] }}"
                  loading="lazy">

                <p class="absolute  bottom-2 left-2 text-white bg-black/30 backdrop-blur px-3 py-1 rounded text-sm font-medium">
                  {{ $d['city'] }}
                </p>

              </div>
              @endforeach
            </div>
            <p class="dark:text-base-200 text-lg leading-relaxed max-w-4xl mx-auto text-center md:mb-10">
              Explore some of the world’s most iconic destinations with unbeatable fares and exclusive seasonal offers.
              Whether you're dreaming of Miami’s sun-soaked beaches, London’s historic charm, Dubai’s modern wonders,
              or Singapore’s vibrant city life, FlightFareMart brings you closer to your next adventure with curated deals
              <em>designed for every type of traveler.</em>
            </p>

          </div>

          <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 md:gap-12">

            <div class="bg-base-200 dark:bg-base-300/20 p-5 rounded-3xl">
              <h3 class="text-3xl font-bold text-accent dark:text-secondary  mb-6 border-b-2 border-secondary  pb-2">
                Travel Your Way
              </h3>
              <p class="text-lg text-accent dark:text-base-200 mb-6">Not sure where to go? Let us inspire your next journey. Choose from travel styles designed for every type of explorer:</p>

              <div class="space-y-4">
                <div class="p-4 bg-muted rounded-lg border border-secondary bg-muted-100 transition duration-300">
                  <p class="text-xl font-semibold ">#WeekendTrips</p>
                  <p class="text-accent dark:text-base-200">Quick getaways at wallet-friendly prices.</p>
                </div>
                <div class="p-4 bg-muted rounded-lg border border-secondary bg-muted-100 transition duration-300">
                  <p class="text-xl font-semibold text-muted">#FamilyVacation</p>
                  <p class="text-accent dark:text-base-200">Comfort-filled journeys for the whole family.</p>
                </div>
                <div class="p-4 bg-muted rounded-lg border border-secondary bg-muted-100 transition duration-300">
                  <p class="text-xl font-semibold text-muted">#AdventureTravel</p>
                  <p class="text-accent dark:text-base-200">Explore mountains, beaches, and hidden gems worldwide.</p>
                </div>
                <div class="p-4 bg-muted rounded-lg border border-secondary bg-muted-100 transition duration-300">
                  <p class="text-xl font-semibold text-muted">#DirectFlights</p>
                  <p class="text-accent dark:text-base-200">Nonstop options for smooth, simple travel.</p>
                </div>
              </div>
            </div>

            <div class="bg-base-200 dark:bg-base-300/20 p-5 rounded-3xl">
              <h3 class="text-3xl font-bold text-accent dark:text-secondary  mb-6 border-b-2 border-secondary  pb-2">
                Limited-Time Deals
              </h3>
              <p class="text-lg text-accent dark:text-base-200 mb-6">Looking for the best time to book? It’s right now.</p>

              <div class="space-y-4">
                <div class="p-4 bg-muted-50 rounded-lg border border-secondary hover:bg-muted transition duration-300">
                  <p class="text-xl font-semibold text-muted">Flash Sale</p>
                  <p class="text-accent dark:text-base-200">Save up to <strong class="text-accent dark:text-secondary">40%</strong> on select international routes this week.</p>
                </div>
                <div class="p-4 bg-muted-50 rounded-lg border border-secondary hover:bg-muted transition duration-300">
                  <p class="text-xl font-semibold text-muted">Last-Minute Deals</p>
                  <p class="text-accent dark:text-base-200">Perfect for spontaneous travelers on a budget.</p>
                </div>
                <div class="p-4 bg-muted-50 rounded-lg border border-secondary hover:bg-muted transition duration-300">
                  <p class="text-xl font-semibold text-muted">Seasonal Offers</p>
                  <p class="text-accent dark:text-base-200">Summer, winter, and festival-season discounts updated daily.</p>
                </div>
              </div>
            </div>
          </div>

          <div class="text-center mt-16 pt-8 border-t border-gray-200">
            <h3 class="text-3xl font-bold text-accent dark:text-secondary mb-4">
              Your Next Adventure Is Just a Click Away
            </h3>
            <p class="text-xl text-accent dark:text-base-200 max-w-4xl mx-auto mb-8">
              With powerful search tools, transparent pricing, and real-time access to 600+ airlines and travel providers, <span class="badge text-accent">FlightFareMart</span> makes discovering your next destination easier than ever.
            </p>
            <p class="text-2xl font-bold text-accent dark:text-base-300 mb-6">
              Where will you go next?
            </p>
            <a href="#" class="inline-block px-12 py-4 text-xl font-bold text-white bg-accent rounded-lg shadow-xl secondary transition duration-300 transform hover:scale-105">
              Start exploring today.
            </a>
          </div>
        </div>
      </div>
    </section>
    <section class="min-h-80 dark:bg-black py-24">
      <div class="max-w-7xl mx-auto">
        <h2 class="text-4xl md:text-6xl mx-auto max-w-6xl dark:text-secondary text-accent px-5 md:px-3">The FlightFareMart Difference</h2>
        <p class="mt-4 mx-auto px-5 md:px-4 max-w-6xl text-lg dark:text-secondary/50 text-accent/80 my-2 pb-3">This section engages users who are browsing rather than searching for a specific flight, helping convert passive interest into active search.</p>
        <div class="lg:flex  mx-auto gap-6 max-w-6xl p-4">
          <!-- Left side with image and overlay text -->
          <div class="basis-3/2 relative h-[500px] overflow-hidden shadow-md shadow-accent/50 rounded-xl">
            <img
              class="w-full h-full object-cover"
              src="https://images.unsplash.com/photo-1521737852567-6949f3f9f2b5?q=80&w=847&auto=format&fit=crop"
              alt="Sample Image">
            <!-- Overlay text -->
            <div class="absolute inset-0 flex items-center justify-center bg-black/20 ">
              <div class="text-white absolute w-96 grid grid-row text-start md:-right-16 sm:-right-20 -right-40 bg-secondary/20 px-6 p-5 backdrop-blur-md rounded-xl text-md font-semibold text-center px-4">
                <p class="text-sm flex flex-col"> <strong class="text-2xl">$150</strong> <span class="uppercase font-normal">Unbeatable Deals, Always</span></p>
              </div>
              <div class="text-secondary  grid grid-row absolute  w-125 md:-right-4 sm:-right-10 -right-40 top-85 bg-accent  text-start backdrop-blur-sm rounded-xl text-lg font-semibold text-center p-7">
                <p class="col-span-1 text-xl md:text-2xl">Smarter Search, Better Results</p>
                <p class="text-sm">1,200+ airlines and travel providers</p>
              </div>
            </div>
          </div>
          <!-- Right side content -->
          <div class="basis-1/2  w-full lg:mt-0 mt-8 h-full flex flex-col items-center  pb-4 justify-center">
            <div class="lg:h-[200px] sm:h-[300px] relative rounded-lg w-full overflow-hidden bg-accent text-secondary hover:-translate-y-0.5 transition duration-300 rounded-xl">
              <div class="absolute p-2 text-accent -right-1 sm:right -bottom-12 sm:-bottom-16 rounded-xl lg:h-[200px] sm:h-[300px] overflow-hidden w-120 sm:w-140 lg:w-60 md:w-160 bg-base-300 ">
                <p class="text-2xl">Monthly 150 trips</p>
                <p><small>While other sites rely on cached data that might be hours old, FlightFareMart pulls live data directly from over 700+ airlines and global booking systems.</small></p>
              </div>
            </div>
            <h3 class="text-[24px]/7.5  text-accent dark:text-base-300 font-medium mt-6">The "Smart-Route" Algorithm</h3>
            <p class="text-accent/70 dark:text-base-200  mt-2">Our proprietary search engine doesn't just look for direct routes. It analyzes "virtual interlining"—combining flights from different carriers that don't usually partner—to find unique connection paths that can save you up to 40% compared to standard bookings.</p>
            <a href="/" class="group  flex items-center gap-2 mt-4 text-accent hover:text-accent/80 transition">
              Real-Time Price Aggregation
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-up-right size-5  group-hover:translate-x-0.5 transition duration-300" aria-hidden="true">
                <path d="M7 7h10v10"></path>
                <path d="M7 17 17 7"></path>
              </svg>
            </a>
          </div>
        </div>
      </div>
    </section>
    <section class="max-w-7xl mx-auto">
      <x-latest-blog-posts />
    </section>

    <section class="py-16 min-h-screen flex flex-col justify-center items-center dark:bg-black bg-base-300 text-accent w-full text-center px-2">
      <div class="max-w-7xl mx-auto">
        <p class="text-xl font-medium text- dark:text-base-200 ">Let’s start your trip!</p>
        <h2 class="font-medium  md:text-7xl dark:text-base-300/80 text-4xl max-w-5xl mx-auto my-4">For work inquires feel free to get in touch with team.</h2>
        <a href="#" class="text-lg dark:text-secondary">contact@flightfaremart.com</a>
      </div>
    </section>

  </main>
  @include('layouts.footer')
</body>

</html>