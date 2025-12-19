<!DOCTYPE html>
@include('layouts.htmlcore')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @include('layouts.head')
</head>

<body class=" antialiased bg-primary overflow-x-hidden font-display dark:bg-black dark:text-secondary  px-2 ">
    <x-preloading />
    @include('layouts.navmanu')
    <main>
        <section class="py-16 bg-muted mx-auto max-w-6xl">
            <div class="container mx-auto px-4">
                <h1 class="text-5xl font-extrabold text-center text-accent dark:text-white mb-6">Our Services</h1>
                <p class="text-xl text-center text-gray-700 dark:text-gray-300 mb-12 max-w-2xl mx-auto">
                    Discover the comprehensive range of travel services FlightFareMart offers to make your journey seamless and unforgettable.
                </p>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-8">
                    <!-- Service Card 1: WorldWide Tours -->
                    <div class="bg-base-200 dark:bg-accent/80 rounded-lg shadow-lg p-8 transform hover:scale-105 transition duration-300 ease-in-out">
                        <div class="flex items-center justify-center mb-6">
                            <svg class="w-16 h-16 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1h2V7m2 4h4a2 2 0 002-2V9m2 2h2.945M9 3v2m1-4v2m.707 12.707A2 2 0 0117 18v2m-6-10V4m0 12v4m-6-10H5a2 2 0 00-2 2v10a2 2 0 002 2h14a2 2 0 002-2v-10a2 2 0 00-2-2h-2m-7-2h2m-4 2h4m-8 2h4"></path>
                            </svg>
                        </div>
                        <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-4 text-center">WorldWide Tours</h2>
                        <p class="text-gray-700 dark:text-gray-300 leading-relaxed text-center">
                            Experience the wonders of the world through our carefully crafted and unforgettable travel experiences.
                            From exotic landscapes to cultural immersions, we design tours that leave lasting memories.
                        </p>
                    </div>

                    <!-- Service Card 2: Flight Booking -->
                    <div class="bg-base-200 dark:bg-accent/80 rounded-lg shadow-lg p-8 transform hover:scale-105 transition duration-300 ease-in-out">
                        <div class="flex items-center justify-center mb-6">
                            <svg class="w-16 h-16 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                            </svg>
                        </div>
                        <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-4 text-center">Flight Booking</h2>
                        <p class="text-gray-700 dark:text-gray-300 leading-relaxed text-center">
                            Book your flights hassle-free with our user-friendly platform, offering a seamless and convenient booking experience
                            to destinations around the globe. Find the best deals and travel with confidence.
                        </p>
                    </div>

                    <!-- Service Card 3: Travel Guides -->
                    <div class="bg-base-200 dark:bg-accent/80 rounded-lg shadow-lg p-8 transform hover:scale-105 transition duration-300 ease-in-out">
                        <div class="flex items-center justify-center mb-6">
                            <svg class="w-16 h-16 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.206 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.794 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.794 5 16.5 5c1.706 0 3.332.477 4.5 1.253v13C19.832 18.477 18.206 18 16.5 18c-1.706 0-3.332.477-4.5 1.253"></path>
                            </svg>
                        </div>
                        <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-4 text-center">Travel Guides</h2>
                        <p class="text-gray-700 dark:text-gray-300 leading-relaxed text-center">
                            Discover the hidden gems and local insights with our expertly curated travel guides.
                            Get insider tips, must-see attractions, and local recommendations for an authentic experience.
                        </p>
                    </div>

                    <!-- Service Card 4: Event Management -->
                    <div class="bg-base-200 dark:bg-accent/80 rounded-lg shadow-lg p-8 transform hover:scale-105 transition duration-300 ease-in-out">
                        <div class="flex items-center justify-center mb-6">
                            <svg class="w-16 h-16 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2zm12-7h-4"></path>
                            </svg>
                        </div>
                        <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-4 text-center">Event Management</h2>
                        <p class="text-gray-700 dark:text-gray-300 leading-relaxed text-center">
                            From booking to staying, we handle every detail, so you can enjoy the trip to the fullest.
                            Let us manage your group travel, corporate events, or special occasions with precision and care.
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </main>
    @include('layouts.footer')
</body>

</html>