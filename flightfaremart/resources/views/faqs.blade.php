<!DOCTYPE html>

@include('layouts.htmlcore')

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="//unpkg.com/alpinejs" defer></script>
    <title>FAQ's - flightfaremart</title>
    @include('layouts.head')

    <!-- @vite(['resources/css/app.css', 'resources/js/app.js']) -->
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
</head>

<body class="dark:bg-black bg-primary">
    <x-preloading />
    @include('layouts.navmanu')
    <main class="min-h-screen py-6">
        <div class="max-w-xl mx-auto flex flex-col items-center justify-center px-4 md:px-0">
            <p class="dark:text-secondary  md:text-xl font-medium">FAQ's</p>
            <h1 class="text-3xl dark:text-base-300 font-semibold md:text-5xl text-accent px-5 md:px-3 py-1 mb-2">Looking for answer?</h1>
            <p class="text-sm text-accent/70 mt-2 pb-4 md:pb-8 text-center ">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum dolorem quia optio molestias, eligendi quaerat?
            </p>

            <!-- FAQ Items -->
            <div class="join join-vertical bg-base-100 sm:min-w-125 md:w-[600px] lg:w-[800px]">
                <div class="collapse collapse-arrow join-item border-base-300 border">
                    <input type="radio" name="my-accordion-4" checked="checked" />
                    <div class="collapse-title font-semibold">How do I create an account?</div>
                    <div class="collapse-content text-sm">Click the "Sign Up" button in the top right corner and follow the registration process.</div>
                </div>
                <div class="collapse collapse-arrow join-item border-base-300 border">
                    <input type="radio" name="my-accordion-4" />
                    <div class="collapse-title font-semibold">I forgot my password. What should I do?</div>
                    <div class="collapse-content text-sm">Click on "Forgot Password" on the login page and follow the instructions sent to your email.</div>
                </div>
                <div class="collapse collapse-arrow join-item border-base-300 border">
                    <input type="radio" name="my-accordion-4" />
                    <div class="collapse-title font-semibold">How do I update my profile information?</div>
                    <div class="collapse-content text-sm">Go to "My Account" settings and select "Edit Profile" to make changes.</div>
                </div>
            </div>
        </div>
    </main>
    @include('layouts.footer')
</body>

</html>