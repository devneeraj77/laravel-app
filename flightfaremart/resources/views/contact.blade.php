<!DOCTYPE html>
@include('layouts.htmlcore')

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://unpkg.com/alpinejs" defer></script>
    <title>Contact FlightFareMart: Get Support or Ask Questions</title>
    <meta name="description" content="Need help with a booking or have a question? Contact FlightFareMart's customer support team via phone, email, or live chat for assistance with your airfare needs.">
    <meta name="keywords" content="FlightFareMart contact, customer support, contact us, phone number, email support, live chat, airfare assistance, travel help">
    @include('layouts.head')

    <!-- @vite(['resources/css/app.css', 'resources/js/app.js']) -->
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
</head>

<body class="bg-base-300 dark:bg-black">
    <x-preloading />
    @include('layouts.navmanu')

    <div class="min-h-screen flex flex-col items-center justify-center p-4">
        <div class="w-full max-w-7xl mx-auto py-12">
            <h1 class="text-4xl  text-gray-900 text-center mb-10">Get in Touch</h1>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">

                {{-- 1. Contact Form --}}
                <div class="bg-white p-8 sm:p-10 rounded-xl shadow-lg border border-gray-100">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6">Send us a Message</h2>

                    {{-- Session Messages --}}
                    @if (session('contact_success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4" role="alert">
                        {{ session('contact_success') }}
                    </div>
                    @endif
                    @if (session('contact_error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4" role="alert">
                        {{ session('contact_error') }}
                    </div>
                    @endif

                    <form action="{{ route('contact.store') }}" method="POST" class="space-y-6">
                        @csrf

                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                            <input type="text" name="name" id="name" required
                                value="{{ old('name') }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-secondary focus:ring-secondary p-3 border @error('name', 'contact') border-red-500 @enderror"
                                placeholder="Type your name">
                            @error('name', 'contact')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                            <input type="email" name="email" id="email" required
                                value="{{ old('email') }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-secondary focus:ring-secondary p-3 border @error('email', 'contact') border-red-500 @enderror"
                                placeholder="you@example.com">
                            @error('email', 'contact')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="subject" class="block text-sm font-medium text-gray-700">Subject</label>
                            <input type="text" name="subject" id="subject" required
                                value="{{ old('subject') }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-secondary focus:ring-secondary p-3 border @error('subject', 'contact') border-red-500 @enderror"
                                placeholder="Inquiry about booking">
                            @error('subject', 'contact')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
                            <textarea name="message" maxlength="260" id="message" rows="4" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-secondary focus:ring-secondary p-3 border @error('message', 'contact') border-red-500 @enderror"
                                placeholder="How can we help you?">{{ old('message') }}</textarea>
                            @error('message', 'contact')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <button type="submit"
                            class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-accent hover:bg-accent/80 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-secondary transition ease-in-out duration-150">
                            Send Message
                        </button>
                    </form>
                </div>

                {{-- 2. Google Map and Company Info --}}
                <div class="space-y-8">

                    {{-- Map Embed --}}
                    <div class="map-container shadow-xl">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d10161.691931724787!2d-80.29736913427223!3d25.78044982077526!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1764139248440!5m2!1sen!2sin"
                            allowfullscreen=""
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"
                            width="100%"
                            height="500"
                            title="Company Location Map">
                        </iframe>
                    </div>

                    {{-- Company Details --}}
                    <div class="bg-white p-8 rounded-xl shadow-lg border border-gray-100 space-y-4">
                        <h3 class="text-xl font-bold text-gray-800">Our Office</h3>

                        <div class="flex items-start space-x-3">
                            <svg class="h-6 w-6 text-secondary flex-shrink-0 mt-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.828 0l-4.243-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <p class="text-gray-600">703 Waterford Way, Suite 600, Miami, FL 33126.</p>
                        </div>

                        <div class="flex items-start space-x-3">
                            <svg class="h-6 w-6 text-secondary flex-shrink-0 mt-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.842 5.234a4 4 0 004.316 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            <p class="text-gray-600">support@flightflaremart.com</p>
                        </div>

                        <div class="flex items-start space-x-3">
                            <svg class="h-6 w-6 text-secondary flex-shrink-0 mt-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                            <p class="text-gray-600">(555) 123-4567</p>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

    @include('layouts.footer')
</body>

</html>