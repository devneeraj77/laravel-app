<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Login - FlightFlareMart</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen flex flex-col items-center justify-center">
    <!-- @include('layouts.header') -->

    <div class="w-full max-w-sm bg-white p-6 shadow rounded-lg">
        <h2 class="text-xl font-semibold text-center mb-4">Login</h2>

        @if(session('error'))
            <div class="bg-red-100 text-red-700 p-2 rounded mb-3">{{ session('error') }}</div>
        @endif
        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-2 rounded mb-3">{{ session('success') }}</div>
        @endif

        <form method="POST" action="{{ route('login.post') }}">
            @csrf
            <div class="mb-3">
                <label class="block mb-1">Email</label>
                <input type="email" name="email" class="w-full border px-3 py-2 rounded" required>
            </div>
            <div class="mb-3">
                <label class="block mb-1">Password</label>
                <input type="password" name="password" class="w-full border px-3 py-2 rounded" required>
            </div>
            <button class="bg-blue-600 hover:bg-blue-700 text-white w-full py-2 rounded">Login</button>
        </form>
    </div>
</body>
</html>
