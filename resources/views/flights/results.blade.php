<!DOCTYPE html>
@include('layouts.htmlcore')

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Flight Search Results - {{ config('app.name', 'Laravel') }}</title>

    @include('layouts.head')
</head>

<body class="antialiased bg-primary dark:bg-black dark:text-secondary px-2">
    
    <div id="preloader" class="fixed inset-0 z-50 flex items-center justify-center bg-primary dark:bg-black">
        <div class="text-center">
            <div class="animate-spin rounded-full h-16 w-16 border-t-2 border-b-2 border-accent dark:border-secondary mx-auto"></div>
            <p class="mt-4 text-xl font-semibold text-accent dark:text-secondary">Getting your search...</p>
        </div>
    </div>
    @include('layouts.navmanu')

    <main id="main-content" class="max-w-7xl mx-auto py-8 p-2" style="visibility: hidden;">
        <h1 class="text-3xl font-bold text-accent  dark:text-secondary/70  px-2">Flight Search Results</h1>
        <p class="px-2 mb-6 dark:text-base-300/70 ">Lorem ipsum dolor sit amet consectetur adipisicing elit. Non, beatae.</p>
        
        @if (isset($error))
            @if (str_contains(strtolower($error), 'api') && str_contains(strtolower($error), 'limit'))
                {{-- API limit error is handled by the script below, which shows a retry message in the preloader. --}}
            @else
                <div class="bg-red-500 text-white p-4 rounded-lg">
                    <p>{{ $error }}</p>
                </div>
            @endif
        @elseif (isset($results) && (isset($results['best_flights']) || isset($results['other_flights'])))
        <div class="space-y-10">

            {{-- BEST FLIGHTS --}}
            @if (isset($results['best_flights']))
            <h2 class="text-2xl font-semibold text-accent dark:text-base-200 px-2">
                Best Flights
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($results['best_flights'] as $flight)

                @php
                $firstSegment = $flight['flights'][0];
                @endphp

                <div class="relative rounded-[28px] overflow-hidden
                            bg-white/90 dark:bg-black/60 backdrop-blur-xl
                            border border-white/40 dark:border-white/10
                            shadow-xl">

                    {{-- IMAGE HEADER --}}
                    <div class="relative h-44 m-3 rounded-[22px] overflow-hidden">
                        <img
                            src="https://plus.unsplash.com/premium_photo-1661963552124-2569fbf9359d?q=80&w=687&auto=format&fit=crop"
                            class="h-full w-full object-cover"
                            alt="Flight view">

                        {{-- PRICE --}}
                        <div class="absolute bottom-3 left-3 text-white text-2xl font-bold">
                            {{ $flight['price'] }}
                            {{ $results['search_parameters']['currency'] ?? '' }}
                        </div>

                        {{-- CTA --}}
                        <button
                            class="absolute bottom-3 right-3 px-4 py-1.5 rounded-full
                                   bg-white/90 text-sm font-medium text-accent
                                   hover:bg-white transition">
                            View deal
                        </button>
                    </div>

                    {{-- CONTENT --}}
                    <div class="px-6 pb-6 space-y-4">

                        {{-- ROUTE --}}
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-xs  dark:text-base-300/70">
                                    {{ $firstSegment['departure_time'] ?? '' }}
                                </p>
                                <p class="text-xl font-bold">
                                    {{ $firstSegment['departure_airport']['id'] }}
                                </p>
                                <p class="text-xs  dark:text-base-300/70">
                                    {{ $firstSegment['departure_airport']['name'] ?? '' }}
                                </p>
                            </div>

                            <div class="text-center">
                                <p class="text-xs  dark:text-base-300/70">
                                    @php
                                    $durationInMinutes = $firstSegment['duration'];
                                    $hours = floor($durationInMinutes / 60);
                                    $minutes = $durationInMinutes % 60;
                                    $durationString = '';
                                    if ($hours > 0) {
                                    $durationString .= $hours . ' hrs ';
                                    }
                                    if ($minutes > 0) {
                                    $durationString .= $minutes . ' mins';
                                    }
                                    if(empty(trim($durationString))) {
                                    $durationString = '0 mins';
                                    }
                                    @endphp
                                    {{ trim($durationString) }}
                                </p>
                                <div class="w-10 h-px bg-gray-300 my-1 mx-auto"></div>
                            </div>

                            <div class="text-right">
                                <p class="text-xs  dark:text-base-300/70">
                                    {{ $firstSegment['arrival_time'] ?? '' }}
                                </p>
                                <p class="text-xl font-bold">
                                    {{ $firstSegment['arrival_airport']['id'] }}
                                </p>
                                <p class="text-xs  dark:text-base-300/70">
                                    {{ $firstSegment['arrival_airport']['name'] ?? '' }}
                                </p>
                            </div>
                        </div>

                        {{-- DATE --}}
                        <div>
                            <p class="text-xs  dark:text-base-300/70">Date</p>
                            <p class="text-sm font-semibold">
                                {{ $results['search_parameters']['outbound_date'] ?? '' }}
                            </p>
                        </div>

                        {{-- META --}}
                        <div class="grid grid-cols-3 gap-3 rounded-2xl
                                    bg-base-300 dark:bg-white/10 p-4 text-sm">
                            <div>
                                <p class="text-xs  dark:text-base-300/70">Airline</p>
                                <p class="font-semibold">
                                    {{ $firstSegment['airline'] }}
                                </p>
                            </div>
                            <div>
                                <p class="text-xs  dark:text-base-300/70">Class</p>
                                <p class="font-semibold">
                                    {{ ucfirst($results['search_parameters']['travel_class'] ?? 'Economy') }}
                                </p>
                            </div>
                            <div>
                                <p class="text-xs  dark:text-base-300/70">Trip</p>
                                <p class="font-semibold">
                                    {{ ucfirst($results['search_parameters']['type'] ?? 'One-way') }}
                                </p>
                            </div>
                        </div>

                    </div>
                </div>

                @endforeach
            </div>
            @endif


            {{-- OTHER FLIGHTS --}}
            @if (isset($results['other_flights']))
            <h2 class="text-2xl font-semibold text-accent dark:text-base-200 px-2">
                Other Flights
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($results['other_flights'] as $flight)

                @php
                $firstSegment = $flight['flights'][0];
                @endphp

                {{-- SAME CARD STRUCTURE --}}
                <div class="relative rounded-[28px] overflow-hidden
                            bg-white/90 dark:bg-black/60 backdrop-blur-xl
                            border border-white/40 dark:border-white/10
                            shadow-xl">

                    <div class="relative h-44 m-3 rounded-[22px] overflow-hidden">
                        <img
                            src="https://plus.unsplash.com/premium_photo-1661963552124-2569fbf9359d?q=80&w=687&auto=format&fit=crop"
                            class="h-full w-full object-cover">

                        <div class="absolute bottom-3 left-3 text-white text-2xl font-bold">
                            {{ $flight['price'] }}
                            {{ $results['search_parameters']['currency'] ?? '' }}
                        </div>

                        <button
                            class="absolute bottom-3 right-3 px-4 py-1.5 rounded-full
                                   bg-white/90 text-sm font-medium text-accent">
                            View deal
                        </button>
                    </div>

                    <div class="px-6 pb-6 space-y-4">
                        <p class="text-sm font-semibold flex gap-3">
                            {{ $firstSegment['departure_airport']['id'] }}
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-accent/70 dark:text-secondary icon icon-tabler icons-tabler-outline icon-tabler-plane-inflight">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M15 11.085h5a2 2 0 1 1 0 4h-15l-3 -6h3l2 2h3l-2 -7h3l4 7z" />
                                <path d="M3 21h18" />
                            </svg>
                            {{ $firstSegment['arrival_airport']['id'] }}
                        </p>
                        <p class="text-xs  dark:text-base-300/70">
                            {{ $firstSegment['airline'] }} • Flight {{ $firstSegment['flight_number'] }}
                        </p>
                    </div>
                </div>

                @endforeach
            </div>
            @endif

        </div>

        @else
        <div class="border-l-4 border-accent-500 text-accent dark:text-secondary dark:border-secondary bg-base-300/20 p-4" role="alert">
            <p class="font-bold">No results</p>
            <p>No flights found for your search criteria. Please try again.</p>
        </div>
        @endif
    </main>

    @include('layouts.footer')

    <script>
        window.addEventListener('load', function() {
            const preloader = document.getElementById('preloader');
            const mainContent = document.getElementById('main-content');
            const isApiLimitError = `@json(isset($error) && str_contains(strtolower($error ?? ''), 'api') && str_contains(strtolower($error ?? ''), 'limit'))`;

            if (isApiLimitError) {
                const preloaderText = preloader.querySelector('p');
                if (preloaderText) {
                    preloaderText.textContent = 'Retrying in 10 seconds...';
                }
                
                // Ensure preloader is visible
                if (preloader) {
                    preloader.style.opacity = '1';
                    preloader.style.display = 'flex';
                }
                if (mainContent) {
                    mainContent.style.visibility = 'hidden';
                }

                setTimeout(() => {
                    window.location.reload();
                }, 10000); // 10 second delay
            } else {
                setTimeout(function() {
                    if (preloader) {
                        preloader.style.transition = 'opacity 0.5s ease-out';
                        preloader.style.opacity = '0';
                        setTimeout(() => {
                            preloader.style.display = 'none';
                        }, 500); // match transition duration
                    }
                    if (mainContent) {
                        mainContent.style.visibility = 'visible';
                    }
                }, 500); // Minimum time to show preloader
            }
        });
    </script>
</body>

</html>