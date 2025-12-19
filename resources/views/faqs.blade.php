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
        <div class="max-w-2xl mx-auto flex flex-col items-center justify-center px-4 md:px-0">
            <p class="dark:text-secondary  md:text-xl font-medium">FAQ's</p>
            <h1 class="text-3xl dark:text-base-300 font-semibold md:text-5xl text-accent px-5 md:px-3 py-1 mb-2">Looking for answer?</h1>
            <p class="text-sm text-accent/70 dark:text-secondary/80 mt-2 pb-4 md:pb-8 text-center ">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum dolorem quia optio molestias, eligendi quaerat?
            </p>

            <!-- FAQ Items -->
            <div itemscope itemtype="https://schema.org/FAQPage" class="w-full max-w-2xl mx-auto">

                <!-- Question 1 -->
                <div class="collapse collapse-arrow text-accent dark:text-secondary/80 bg-base-200 dark:bg-accent/50 rounded-box mb-2" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                    <input type="checkbox" />
                    <div class="collapse-title text-lg font-semibold" itemprop="name">
                        1. How does FlightFareMart ensure I'm getting the absolute cheapest fare?
                    </div>
                    <div class="collapse-content" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                        <p itemprop="text">
                            FlightFareMart uses proprietary, real-time technology to search and compare prices from hundreds of airlines, global distribution systems (GDS), and online travel agencies (OTAs) simultaneously. We don't just show one price; we aggregate all available options to guarantee you see the lowest current market price for your chosen route and dates, with no hidden fees added by us.
                        </p>
                    </div>
                </div>

                <!-- Question 2 -->
                <div class="collapse collapse-arrow text-accent dark:text-secondary/80 bg-base-200 dark:bg-accent/50 rounded-box mb-2" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                    <input type="checkbox" />
                    <div class="collapse-title text-lg font-semibold" itemprop="name">
                        2. What is your policy regarding flight changes or cancellations?
                    </div>
                    <div class="collapse-content" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                        <p itemprop="text">
                            Our flight change and cancellation policies are generally determined by the specific airline and the fare type you purchased (e.g., Basic Economy, Standard, Flexible). While FlightFareMart facilitates the booking, the contract is between you and the airline/OTA. You can find the specific rules clearly stated during the booking process. For changes, please refer to the booking confirmation email or contact the issuing airline/OTA directly.
                        </p>
                    </div>
                </div>

                <!-- Question 3 -->
                <div class="collapse collapse-arrow text-accent dark:text-secondary/80 bg-base-200 dark:bg-accent/50 rounded-box mb-2" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                    <input type="checkbox" />
                    <div class="collapse-title text-lg font-semibold" itemprop="name">
                        3. I found a cheaper price immediately after booking. Can I get a refund for the difference?
                    </div>
                    <div class="collapse-content" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                        <p itemprop="text">
                            Flight prices are highly dynamic and change constantly due to demand, inventory, and fuel costs. We guarantee the lowest price available at the moment of your booking. Unfortunately, because the price changes occur in real-time and are set by the airlines, we are unable to retroactively offer refunds or price adjustments after your purchase is complete. We encourage users to book quickly once they find a suitable low fare.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </main>
    @include('layouts.footer')
</body>

</html>