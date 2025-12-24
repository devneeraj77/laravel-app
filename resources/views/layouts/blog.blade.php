<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('layouts.head')
    
    <title>@yield('title', 'Blog')</title>
    <meta name="description" content="@yeild('title', 'Posts in ' . $category->name)">
    <meta name="description" content="@yield('meta_description', 'Default general description for the website.')">
    @yield('head')
</head>
<body class="antialiased bg-primary   overflow-x-hidden font-display dark:bg-black dark:text-secondary  px-2  min-h-screen">
  <x-preloading />
   
@include('layouts.navmanu')

    <div class="container mx-auto py-8">
        <div class="flex flex-col lg:flex-row ">

            <main class="w-full lg:w-3/4  px-4">
                @yield('main-content')
            </main>

            <aside class="w-full lg:w-1/4 px-4   mt-8 lg:mt-0">
                @yield('sidebar')
            </aside>

        </div>
    </div>

    @include('layouts.footer')
</body>
</html>
