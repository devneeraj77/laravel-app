<!DOCTYPE html>

@include('layouts.htmlcore')

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="//unpkg.com/alpinejs" defer></script>
    <title>FlightFareMart Privacy Policy | Data Collection and Security</title>
    <meta name="description" content="Review the official FlightFareMart Privacy Policy to understand how we collect, use, and protect your personal data when you use our flight booking and airfare comparison services.">
    <meta name="keywords" content="FlightFareMart privacy policy, data security, personal data protection, information collection, user privacy, data usage, cookie policy, GDPR">
    @include('layouts.head')

    <!-- @vite(['resources/css/app.css', 'resources/js/app.js']) -->
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
</head>

<body class="dark:bg-black bg-primary">
    <x-preloading />
    @include('layouts.navmanu')
    <main class="min-h-screen py-6 max-w-4xl mx-auto px-4 dark:text-base-200">
        <h1 class="text-4xl font-bold mb-6 text-accent dark:text-secondary">Privacy Policy</h1>
        <p class="text-sm text-gray-500 mb-8">Published: December 8, 2025</p>

        <p class="mb-4">At flightfaremart, we are committed to protecting your privacy and ensuring you have a positive experience while using our services.</p>

        <h2 class="text-2xl font-bold mb-4 text-accent dark:text-secondary">1. Information We Collect</h2>
        <h3 class="text-xl font-semibold mb-2 text-accent dark:text-secondary">A. Information You Provide</h3>
        <p class="mb-4">We value your privacy and handle your personal data with the highest level of care. We only collect information that you voluntarily provide, such as your:</p>
        <ul class="list-disc list-inside ml-4 mb-4">
            <li>Name</li>
            <li>Email address</li>
            <li>Any details submitted through contact forms, comments, or inquiries.</li>
        </ul>

        <h2 class="text-2xl font-bold mb-4 text-accent dark:text-secondary">2. Third-Party Services</h2>
        <p class="mb-4">To enhance the quality and functionality of our website, we integrate select third-party tools.</p>
        <p class="mb-4">One such service is SerpAPI, which helps us gather search-related insights and improve the accuracy and relevance of the content we provide. These third-party providers may process certain information as part of their operations, and we ensure they adhere to appropriate privacy and security standards.</p>

        <h2 class="text-2xl font-bold mb-4 text-accent dark:text-secondary">3. Email & Newsletter</h2>
        <p class="mb-4">Stay connected with the latest updates from flightfaremart. By subscribing to our email list, you will receive:</p>
        <ul class="list-disc list-inside ml-4 mb-4">
            <li>Exclusive flight deals</li>
            <li>Travel tips</li>
            <li>Industry insights</li>
            <li>Special offers directly in your inbox</li>
        </ul>
        <p class="mb-4">Whether it’s last-minute discounts or expert travel guidance, our newsletter is designed to help you travel smarter and save more every time you fly.</p>

        <h2 class="text-2xl font-bold mb-4 text-accent dark:text-secondary">Commitment to Security</h2>
        <p class="mb-4">We employ reasonable and appropriate security measures to protect the personal information that we collect and process.</p>
    </main>
    @include('layouts.footer')
</body>

</html>