<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('layouts.head')
    <title>@yield('title', 'Blog - FlightFareMart Expert Travel Tips & Flight Booking Hacks')</title>
    <meta name="description" content="">
    <meta name="description" content="Master the art of budget travel with the FlightFareMart blog. Discover expert flight booking hacks, destination guides, and insider tips to save on every trip.">
    <meta name="keywords" content="FlightFareMart blog, travel tips, flight booking hacks, budget travel guides, cheap flight secrets, travel industry news, how to save on flights">

    <meta property="og:title" content="FlightFareMart Blog: Your Guide to Smarter Travel">
    <meta property="og:description" content="Expert advice, destination inspiration, and the latest secrets on how to find the cheapest flights worldwide.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://fightfaremart.com/blog">
    <meta property="og:image" content="/img/about-3.png">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="FlightFareMart Blog | Travel Tips & Hacks">
    <meta name="twitter:description" content="Learn how to travel the world for less with FlightFareMart's latest blog posts and expert guides.">
    <meta name="twitter:image" content="/img/about-3.png">
    @yield('head')
</head>

<body class="antialiased bg-primary overflow-x-hidden font-display dark:bg-black dark:text-secondary  px-2  min-h-screen">
    <x-preloading />

    @include('layouts.navmanu')

    <div class="container mx-auto py-8">
        <div class="flex flex-col lg:flex-row ">

            <main class="w-full lg:w-3/4  px-4">
                @yield('main-content')
            </main>

            <aside class="w-full lg:w-1/4 px-4 mt-8 lg:mt-0">
                @yield('sidebar')
            </aside>

        </div>
    </div>

    @include('layouts.footer')
</body>

</html>