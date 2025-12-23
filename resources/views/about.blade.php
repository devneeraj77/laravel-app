<!DOCTYPE html>

@include('layouts.htmlcore')

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="//unpkg.com/alpinejs" defer></script>
    <title>About FlightFareMart: Your Trusted Partner for the Best Flight Fares</title>
    <meta name="description" content="Discover FlightFareMart's mission to make air travel affordable. Learn about our commitment to finding and sharing the cheapest flights and best travel deals worldwide.">
    <meta name="keywords" content="FlightFareMart, about us, cheapest flights, best airfare deals, company mission, flight deals, travel savings, affordable travel">
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

    <main class="dark:text-base-300 text-accent">
        <section class=" flex flex-col items-center py-10 sm:py-14 md:py-24 xlg:h-auto">
            <h1 class="text-4xl md:text-6xl text-center  text-accent dark:text-secondary px-5 md:px-3 py-2 mb-4 gap-4">About Us</h1>
            <div class=" m-auto max-w-7xl md:flex md:flex-row items-center justify-start h-fit px-4 md:p-8 gap-4">
                <div class="basis-1/2 flex  flex-col gap-3 p-4">
                    <p class="text-xl">
                        FlightFareMart is an online travel platform built to make flight booking simpler, smarter, and more affordable for every traveler. Whether you're planning a quick business trip, a family vacation, or a once-in-a-lifetime adventure, we help you find the best fares from hundreds of global airlines—all in one seamless experience.
                    </p>
                    <p>
                        Here you will find our most exceptional and premier offers for all individuals seeking to acquire flight equipment. With the help of all our blogs, you will gain enormous knowledge.
                    </p>

                </div>
                <div class="basis-1/2 relative h-[400px] overflow-hidden shadow-md shadow-accent/50 rounded-xl">
                    <img
                        class="w-full h-full object-cover"
                        src="https://images.unsplash.com/photo-1562805612-9c340007e0b9?q=80&w=870&auto=format&fit=crop"
                        alt="Sample Image">
                    <!-- Overlay text -->
                    <div class="absolute inset-0 flex items-center justify-center bg-black/20 ">
                        <div class="text-white absolute w-96 grid grid-row text-start top-8 md:-left-10 sm:-left-20 -left-10 bg-secondary/20 px-6 p-5 backdrop-blur rounded-xl text-md font-semibold text-center px-4">
                            <p class="text-sm text-right flex flex-col"> <strong class="text-2xl">Affordability</strong> <span class="uppercase font-normal text-xs">We don’t just help you book flights—we help you travel smarter.</span></p>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <section class="min-h-80 text-center py-14 mb-5">
            <h2 class="dark:text-secondary  md:text-xl">Intro</h2>
            <p class="text-3xl dark:text-base-300 font-semibold md:text-5xl text-accent px-5 md:px-3 py-1 mb-2">flightfaremart was created with one mission</p>
            <div class="md:flex flex-row-reverse m-auto max-w-7xl gap-4 py-6">
                <div class="basis-1/2 flex flex-col gap-2 min-h-[400px] text-left min-h-40  m-4 p-8  rounded-2xl">
                    <h3 class="text-2xl dark:text-secondary">FlightFareMart was created with one mission</h3>
                    <div class="px-2 py-2 flex flex-col gap-2 dark:text-base-200/50">
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
                <div class="basis-1/2  p-4 m-3 flex items-center justify-center  min-h-40">
                    <img class="aspact-square  rounded-2xl" src="/img/about-2.png" alt="about us">
                </div>
            </div>
        </section>
        <section class="min-h-80 flex flex-col items-center text-center py-14 mb-5">
            <h2 class="dark:text-secondary  md:text-xl">What We Do</h2>
            <p class="text-3xl dark:text-base-300 font-semibold md:text-5xl text-accent px-5 md:px-3 py-1 mb-2">At FlightFareMart</p>
            <div class="md:flex flex-col md:flex-row m-auto max-w-7xl gap-4 py-6">
                <div class="basis-1/2 flex-col   p-4 m-3 flex items-center justify-center  min-h-40">
                    <img class="aspact-square " src="/img/undraw_teamwork_zplp.svg" alt="">
                </div>
                <div class="basis-1/2 flex flex-col gap-2 min-h-[400px] text-left min-h-40 p-8 m-4 bg-base-300/20 rounded-2xl dark:text-s">
                    <h3 class="text-2xl">we combine advanced technology with real human insight to deliver a better way to book flights.</h3>
                    <p class="font-semibold text-md">Our platform:</p>
                    <ul class="px-8 list-disc text-accent dark:text-base-200/60">
                        <li>Lorem ipsum dolor sit, amet consectetur adipisicing.</li>
                        <li>Optio laudantium nesciunt, illum nemo dicta temporibus?</li>
                        <li>Quod dignissimos corrupti quia voluptas ducimus ipsum?</li>
                        <li>Asperiores, atque perspiciatis commodi tenetur quam optio!</li>
                        <li>Modi dolor et aliquam quibusdam dolorum ad?</li>
                    </ul>
                    <p class="text-sm italic">We believe travelers deserve simplicity, honesty, and choice—without hidden fees or complicated processes.</p>
                </div>
            </div>
        </section>
        <section class="min-h-80 dark:bg-black bg-base-200 py-10 px-1">
            <div class="flex flex-col items-center text-center">
                <h1 class="text-4xl px-4  dark:text-base-200/80 font-bold max-w-[740px] mb-[72px]">Trusted by <span class="dark:text-secondary text-accent/80">3k+</span> world class companies & design teams</h1>
                <div class="flex flex-wrap items-center justify-center gap-4 m-2">
                    <div class="flex flex-col items-center bg-white px-3 py-8 rounded-lg border border-gray-300/80 max-w-[272px] text-sm text-center text-gray-500">
                        <div class="relative mb-4">
                            <img class="h-16 w-16 rounded-full" src="https://raw.githubusercontent.com/prebuiltui/prebuiltui/main/assets/userImage/userImage1.png" alt="userImage1">
                            <svg class="absolute top-0 -right-2" width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="10.5" cy="10.5" r="8.5" class="fill-accent" />
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
                                <circle cx="10.5" cy="10.5" r="8.5" class="fill-accent" />
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
                                <circle cx="10.5" cy="10.5" r="8.5" class="fill-accent" />
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
                                <circle cx="10.5" cy="10.5" r="8.5" class="fill-accent" />
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