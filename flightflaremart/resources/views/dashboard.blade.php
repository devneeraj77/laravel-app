<!DOCTYPE html>
@include('layouts.htmlcore')
<head>
    <meta charset="UTF-8">
    <title>User Dashboard - FlightFlareMart</title>
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
      @include('layouts.head')
</head>
<body class="bg-gray-50 min-h-screen flex flex-col items-center justify-start py-10">
    @include('layouts.header')

    <div class="bg-white p-6 rounded shadow w-full max-w-3xl text-center">
        <h2 class="text-2xl font-bold mb-4">Welcome, {{ Auth::user()->name }}</h2>
        <p class="text-gray-600">This is your dashboard area.</p>
    </div>
</body>
</html>
