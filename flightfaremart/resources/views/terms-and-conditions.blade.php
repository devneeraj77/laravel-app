<!DOCTYPE html>

@include('layouts.htmlcore')

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="//unpkg.com/alpinejs" defer></script>
    <title>FlightFareMart Terms and Conditions | Agreement for Service Use</title>
    <meta name="description" content="Review the official FlightFareMart Terms and Conditions (T&Cs). This document outlines the legal agreement for all users utilizing our flight booking and airfare comparison services.">
    <meta name="keywords" content="FlightFareMart terms, terms and conditions, terms of service, legal agreement, user policy, usage agreement, disclaimer, service agreement">
    @include('layouts.head')

    <!-- @vite(['resources/css/app.css', 'resources/js/app.js']) -->
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
</head>

<body class="dark:bg-black bg-primary">
    <x-preloading />
    @include('layouts.navmanu')
    <main class="min-h-screen py-6 max-w-4xl mx-auto px-4 dark:text-base-200">
        <h1 class="text-4xl font-bold mb-6 text-accent dark:text-secondary">Terms and Conditions</h1>
        <p class="text-sm text-gray-500 mb-8">Published: December 8, 2025</p>

        <h2 class="text-2xl font-bold mb-4 text-accent dark:text-secondary">1. Acceptance of Terms</h2>
        <p class="mb-4">By using our services, you agree to these Terms and Conditions. If you disagree, we kindly ask that you refrain from using our services.</p>

        <h2 class="text-2xl font-bold mb-4 text-accent dark:text-secondary">2. Content Accuracy Notice</h2>
        <p class="mb-4">Our website provides general information about flights and travel. While we have Professional duties to keep our content accurate and helpful, we cannot guarantee that all information is always complete or up to date.</p>
        <p class="font-bold mb-4 text-red-600">DISCLAIMER: We are not legally responsible for any issues, losses, or decisions that result from using the information on our site. We recommend verifying details with airlines or official sources before making any travel plans.</p>

        <h2 class="text-2xl font-bold mb-4 text-accent dark:text-secondary">3. Reviews & Opinions</h2>
        <p class="mb-4">All reviews, guides, and opinions come from our own experience and research. Your results or experiences may not be the same, and that’s okay.</p>

        <h2 class="text-2xl font-bold mb-4 text-accent dark:text-secondary">4. Limitation of Liability</h2>
        <p class="mb-4">We are No-blame (not responsible) for the following events:</p>
        <ul class="list-disc list-inside ml-4 mb-4">
            <li>Travel delays</li>
            <li>Flight cancellations</li>
            <li>Booking losses</li>
            <li>Incorrect use of information from our blog</li>
        </ul>

        <h2 class="text-2xl font-bold mb-4 text-accent dark:text-secondary">5. Change of Terms</h2>
        <p class="mb-4">We reserve the right to update these Terms and Conditions at any time. By continuing to use our services, you will accept the updated terms.</p>

        <h2 class="text-2xl font-bold mb-4 text-accent dark:text-secondary">6. Contact Information</h2>
        <p class="mb-4">If you have questions, contact us at:</p>
        <ul class="list-disc list-inside ml-4 mb-4">
            <li>Email: contact@flightfaremart.com</li>
            <li>Website: flightfaremart.com</li>
        </ul>
    </main>
    @include('layouts.footer')
</body>

</html>