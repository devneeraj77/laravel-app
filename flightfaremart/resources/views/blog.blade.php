<!DOCTYPE html>

@include('layouts.htmlcore')

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="//unpkg.com/alpinejs" defer></script>
    <title>FlightFareMart FAQs: Answers to Your Cheapest Flight Booking Questions</title>
    <meta name="description" content="Find quick answers to common questions about booking, payments, cancellations, and finding the cheapest airfare deals with FlightFareMart.">
    <meta name="keywords" content="FlightFareMart FAQs, flight booking questions, cheapest flight answers, travel policies, payment methods, cancellation policy, customer support, airfare questions">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    @include('layouts.head')

    <!-- @vite(['resources/css/app.css', 'resources/js/app.js']) -->
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
</head>

<body class="dark:bg-black bg-primary">
    <x-preloading />

    @include('layouts.navmanu')
    <main class="min-h-screen flex text-accent dark:text-secondary">
        <aside class=" rounded-t-2xl p-10  w-60">
            <h1 class="text-lg">Categories</h1>
            <ul class="px-2 dark:text-base-200/40 text-accent/70">
                <li>Lorem.</li>
                <li>Quae?</li>
                <li>Rem.</li>
                <li>Voluptatibus.</li>
                <li>Earum.</li>
            </ul>
        </aside>

        <section class="py-4 ">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex items-center gap-3 max-w-md w-full py-14">
                    <div class="flex items-center w-full border pl-3 gap-2 bg-white border-gray-500/30 h-[46px] rounded-md overflow-hidden">
                        <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 30 30" fill="#6B7280">
                            <path d="M13 3C7.489 3 3 7.489 3 13s4.489 10 10 10a9.95 9.95 0 0 0 6.322-2.264l5.971 5.971a1 1 0 1 0 1.414-1.414l-5.97-5.97A9.95 9.95 0 0 0 23 13c0-5.511-4.489-10-10-10m0 2c4.43 0 8 3.57 8 8s-3.57 8-8 8-8-3.57-8-8 3.57-8 8-8" />
                        </svg>
                        <input type="text" placeholder="Search for products" class="w-full h-full outline-none text-gray-500 placeholder-gray-500 text-sm">
                    </div>
                    <button type="submit" class="bg-indigo-500 w-32 h-[46px] rounded-md text-sm text-white">Search</button>
                </div>
                <div class="flex justify-center mb-14 gap-y-8 lg:gap-y-0 flex-wrap md:flex-wrap lg:flex-nowrap lg:flex-row lg:justify-between lg:gap-x-8">
                    <div class="group cursor-pointer w-full max-lg:max-w-xl lg:w-1/3 border border-gray-300 rounded-2xl p-5 transition-all duration-300 hover:border-indigo-600">
                        <div class="flex items-center mb-6">
                            <img src="https://pagedone.io/asset/uploads/1696244553.png" alt="Harsh image" class="rounded-lg w-full object-cover">
                        </div>
                        <div class="block">
                            <h4 class="text-gray-900 font-medium leading-8 mb-9">Fintech 101: Exploring the Basics of Electronic Payments</h4>
                            <div class="flex items-center justify-between  font-medium">
                                <h6 class="text-sm text-gray-500">By Harsh C.</h6>
                                <span class="text-sm text-indigo-600">2 year ago</span>
                            </div>
                        </div>
                    </div>
                    <div class="group cursor-pointer w-full max-lg:max-w-xl lg:w-1/3 border border-gray-300 rounded-2xl p-5 transition-all duration-300 hover:border-indigo-600">
                        <div class="flex items-center mb-6">
                            <img src="https://pagedone.io/asset/uploads/1696244579.png" alt="John image" class="rounded-lg w-full object-cover">
                        </div>
                        <div class="block">
                            <h4 class="text-gray-900 font-medium leading-8 mb-9">From Classroom to Cyberspace: The Growing Influence of EdTech in Fintech</h4>
                            <div class="flex items-center justify-between  font-medium">
                                <h6 class="text-sm text-gray-500">By John D.</h6>
                                <span class="text-sm text-indigo-600">2 year ago</span>
                            </div>
                        </div>
                    </div>
                    <div class="group cursor-pointer w-full max-lg:max-w-xl lg:w-1/3 border border-gray-300 rounded-2xl p-5 transition-all duration-300 hover:border-indigo-600">
                        <div class="flex items-center mb-6">
                            <img src="https://pagedone.io/asset/uploads/1696244619.png" alt="Alexa image" class="rounded-lg w-full object-cover">
                        </div>
                        <div class="block">
                            <h4 class="text-gray-900 font-medium leading-8 mb-9">Fintech Solutions for Student Loans: Easing the Burden of Education Debt</h4>
                            <div class="flex items-center justify-between  font-medium">
                                <h6 class="text-sm text-gray-500">By Alexa H.</h6>
                                <span class="text-sm text-indigo-600">2 year ago</span>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="javascript:;" class="cursor-pointer border border-gray-300 shadow-sm rounded-full py-3.5 px-7 w-52 flex justify-center items-center text-gray-900 font-semibold mx-auto transition-all duration-300 hover:bg-gray-100">View All</a>
            </div>
        </section>
    </main>
    @include('layouts.footer')
</body>

</html>