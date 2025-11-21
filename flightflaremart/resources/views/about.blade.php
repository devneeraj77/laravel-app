<!DOCTYPE html>

@include('layouts.htmlcore')

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="//unpkg.com/alpinejs" defer></script>
    <title>About - flightfaremart</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    @include('layouts.head')
    <!-- @vite(['resources/css/app.css', 'resources/js/app.js']) -->
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
</head>

<body class="dark:bg-black ">
    @include('layouts.navmanu')

    <main class=" py-4 dark:text-base-300 text-accent">
        <section class="min-h-screen m-auto max-w-7xl md:flex items-center h-fit p-8 gap-4">
            <div class="basis-1/2 flex flex-col gap-3 p-4">
                <h1 class="text-4xl md:text-6xl  text-accen px-5 md:px-3 py-2 mb-4 gap-4">About Us</h1>
                <p>
                    FlightFareMart is an online travel platform built to make flight booking simpler, smarter, and more affordable for every traveler. Whether you're planning a quick business trip, a family vacation, or a once-in-a-lifetime adventure, we help you find the best fares from hundreds of global airlines—all in one seamless experience.
                </p>
                <p>
                    Lorem, ipsum dolor sit amet consectetur adipisicing
                    elit. Officiis hic nobis inventore sequi nesciunt commodi tenetur ad
                    eum iure exercitationem, maiores qui,
                    repellendus repellat ab animi provident rerum, consequuntur culpa.
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur
                    adipisicing elit. Repudiandae quos numquam, odit magni veniam veritatis facere
                    labore voluptates neque ipsum esse soluta minus, omnis, sint atque ratione est! Ipsum, reprehenderit.
                </p>

            </div>
            <div class="basis-1/2 relative h-[400px] overflow-hidden shadow-md shadow-accent/50 rounded-xl">
                <img
                    class="w-full h-full object-cover"
                    src="https://images.unsplash.com/photo-1562805612-9c340007e0b9?q=80&w=870&auto=format&fit=crop"
                    alt="Sample Image">
                <!-- Overlay text -->
                <div class="absolute inset-0 flex items-center justify-center bg-black/20 ">
                    <div class="text-white absolute w-96 grid grid-row text-start top-8 md:-left-16 sm:-left-20 -left-40 bg-secondary/20 px-6 p-5 backdrop-blur rounded-xl text-md font-semibold text-center px-4">
                        <p class="text-sm text-right flex flex-col"> <strong class="text-2xl">$150</strong> <span class="uppercase font-normal">Unbeatable Deals, Always</span></p>
                    </div>

                </div>
            </div>
        </section>
        <section class="min-h-screen text-center py-14 mb-5">
            <h2 class="text-base md:text-xl">Our Story</h2>
            <p class="text-3xl font-semibold md:text-5xl  text-accent px-5 md:px-3 py-1 mb-2">flightfaremart was created with one mission</p>
            <div class="md:flex  m-auto max-w-7xl gap-4 py-6">
                <div class="basis-1/2 flex flex-col gap-2 min-h-[400px] text-left min-h-40  m-4 p-8 bg-base-200 rounded-2xl">
                    <h3 class="text-xl">FlightFareMart was created with one mission</h3>
                    <div class="px-4 py-2 flex flex-col gap-2">
                        <p>
                            to bring transparency, technology, and trust back into travel booking.
                        </p>
                        <p>
                            We noticed something missing in today’s travel landscape—clarity. With countless websites and fluctuating prices, travelers often spend hours searching only to end up confused or overpaying.
                        </p>
                        <p>
                            So we built a platform designed to eliminate the guesswork, save time, and deliver real value.
                        </p>
                        <p>
                            What started as a passion for simplifying travel has grown into a fast-growing flight comparison and booking service trusted by thousands of travelers worldwide.
                        </p>
                    </div>
                </div>
                <div class="basis-1/2 border  min-h-40"></div>
            </div>
        </section>
        <section class="min-h-screen text-center py-14 mb-5">
            <h2 class="text-base md:text-xl">What We Do</h2>
            <p class="text-3xl font-semibold md:text-5xl  text-accent px-5 md:px-3 py-1 mb-2">At FlightFareMart</p>
            <div class="md:flex md:flex-row-reverse m-auto max-w-7xl gap-4 py-6">
                <div class="basis-1/2 flex flex-col gap-2 min-h-[400px] text-left min-h-40 p-8 m-4 bg-base-200 rounded-2xl">
                    <h3 class="text-xl">we combine advanced technology with real human insight to deliver a better way to book flights.</h3>
                    <p>Our platform:</p>
                    <ul class="px-8 list-disc">
                        <li>Lorem ipsum dolor sit, amet consectetur adipisicing.</li>
                        <li>Optio laudantium nesciunt, illum nemo dicta temporibus?</li>
                        <li>Quod dignissimos corrupti quia voluptas ducimus ipsum?</li>
                        <li>Asperiores, atque perspiciatis commodi tenetur quam optio!</li>
                        <li>Modi dolor et aliquam quibusdam dolorum ad?</li>
                    </ul>
                    <p class="text-sm italic">We believe travelers deserve simplicity, honesty, and choice—without hidden fees or complicated processes.</p>
                </div>
                <div class="basis-1/2 border  min-h-40"></div>
            </div>
        </section>
        <section class="min-h-screen">
            <div class="flex flex-col items-center text-center">
                <h1 class="text-4xl font-bold max-w-[740px] mb-[72px]">Trusted by <span class="text-blue-600">30k+</span> world class companies & design teams</h1>
                <div class="flex flex-wrap items-center justify-center gap-4">
                    <div class="flex flex-col items-center bg-white px-3 py-8 rounded-lg border border-gray-300/80 max-w-[272px] text-sm text-center text-gray-500">
                        <div class="relative mb-4">
                            <img class="h-16 w-16 rounded-full" src="https://raw.githubusercontent.com/prebuiltui/prebuiltui/main/assets/userImage/userImage1.png" alt="userImage1">
                            <svg class="absolute top-0 -right-2" width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="10.5" cy="10.5" r="8.5" fill="#2563EB" />
                                <path d="m11.584 13.872 1.752-3.288 1.104-.288a2.7 2.7 0 0 1-.432.576.76.76 0 0 1-.552.24q-.672 0-1.248-.576t-.576-1.464q0-.936.624-1.584.648-.672 1.584-.672.888 0 1.536.672.672.648.672 1.584 0 .384-.168.912-.144.504-.576 1.296l-1.92 3.552zm-5.4 0 1.752-3.288 1.08-.288a2.2 2.2 0 0 1-.408.576.76.76 0 0 1-.552.24q-.696 0-1.272-.576t-.576-1.464q0-.936.624-1.584.648-.672 1.584-.672.888 0 1.536.672.672.648.672 1.584 0 .384-.144.912-.144.504-.576 1.296L7.96 14.832z" fill="#fff" />
                            </svg>
                        </div>
                        <p>“Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud aliquip”</p>
                        <p class="text-lg text-gray-800 font-medium mt-5">Donald Jackman</p>
                        <p class="text-xs">Customer service</p>
                    </div>
                    <div class="flex flex-col items-center bg-white px-3 py-8 rounded-lg border border-gray-300/80 max-w-[272px] text-sm text-center text-gray-500">
                        <div class="relative mb-4">
                            <img class="h-16 w-16 rounded-full" src="https://raw.githubusercontent.com/prebuiltui/prebuiltui/main/assets/userImage/userImage2.png" alt="userImage2">
                            <svg class="absolute top-0 -right-2" width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="10.5" cy="10.5" r="8.5" fill="#2563EB" />
                                <path d="m11.584 13.872 1.752-3.288 1.104-.288a2.7 2.7 0 0 1-.432.576.76.76 0 0 1-.552.24q-.672 0-1.248-.576t-.576-1.464q0-.936.624-1.584.648-.672 1.584-.672.888 0 1.536.672.672.648.672 1.584 0 .384-.168.912-.144.504-.576 1.296l-1.92 3.552zm-5.4 0 1.752-3.288 1.08-.288a2.2 2.2 0 0 1-.408.576.76.76 0 0 1-.552.24q-.696 0-1.272-.576t-.576-1.464q0-.936.624-1.584.648-.672 1.584-.672.888 0 1.536.672.672.648.672 1.584 0 .384-.144.912-.144.504-.576 1.296L7.96 14.832z" fill="#fff" />
                            </svg>
                        </div>
                        <p>“Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud aliquip”</p>
                        <p class="text-lg text-gray-800 font-medium mt-5">Richard Nelson</p>
                        <p class="text-xs">Facilities Management</p>
                    </div>
                    <div class="flex flex-col items-center bg-white px-3 py-8 rounded-lg border border-gray-300/80 max-w-[272px] text-sm text-center text-gray-500">
                        <div class="relative mb-4">
                            <img class="h-16 w-16 rounded-full" src="https://raw.githubusercontent.com/prebuiltui/prebuiltui/main/assets/userImage/userImage3.png" alt="userImage3">
                            <svg class="absolute top-0 -right-2" width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="10.5" cy="10.5" r="8.5" fill="#2563EB" />
                                <path d="m11.584 13.872 1.752-3.288 1.104-.288a2.7 2.7 0 0 1-.432.576.76.76 0 0 1-.552.24q-.672 0-1.248-.576t-.576-1.464q0-.936.624-1.584.648-.672 1.584-.672.888 0 1.536.672.672.648.672 1.584 0 .384-.168.912-.144.504-.576 1.296l-1.92 3.552zm-5.4 0 1.752-3.288 1.08-.288a2.2 2.2 0 0 1-.408.576.76.76 0 0 1-.552.24q-.696 0-1.272-.576t-.576-1.464q0-.936.624-1.584.648-.672 1.584-.672.888 0 1.536.672.672.648.672 1.584 0 .384-.144.912-.144.504-.576 1.296L7.96 14.832z" fill="#fff" />
                            </svg>
                        </div>
                        <p>“Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud aliquip”</p>
                        <p class="text-lg text-gray-800 font-medium mt-5">James Washington</p>
                        <p class="text-xs">Flight Specialist</p>
                    </div>
                    <div class="flex flex-col items-center bg-white px-3 py-8 rounded-lg border border-gray-300/80 max-w-[272px] text-sm text-center text-gray-500">
                        <div class="relative mb-4">
                            <img class="h-16 w-16 rounded-full" src="https://raw.githubusercontent.com/prebuiltui/prebuiltui/main/assets/userImage/userImage3.png" alt="userImage3">
                            <svg class="absolute top-0 -right-2" width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="10.5" cy="10.5" r="8.5" fill="#2563EB" />
                                <path d="m11.584 13.872 1.752-3.288 1.104-.288a2.7 2.7 0 0 1-.432.576.76.76 0 0 1-.552.24q-.672 0-1.248-.576t-.576-1.464q0-.936.624-1.584.648-.672 1.584-.672.888 0 1.536.672.672.648.672 1.584 0 .384-.168.912-.144.504-.576 1.296l-1.92 3.552zm-5.4 0 1.752-3.288 1.08-.288a2.2 2.2 0 0 1-.408.576.76.76 0 0 1-.552.24q-.696 0-1.272-.576t-.576-1.464q0-.936.624-1.584.648-.672 1.584-.672.888 0 1.536.672.672.648.672 1.584 0 .384-.144.912-.144.504-.576 1.296L7.96 14.832z" fill="#fff" />
                            </svg>
                        </div>
                        <p>“Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud aliquip”</p>
                        <p class="text-lg text-gray-800 font-medium mt-5">James Washington</p>
                        <p class="text-xs">flight operations manager</p>
                    </div>
                </div>
            </div>
        </section>
    </main>
    @include('layouts.footer')

</body>

</html>