<!DOCTYPE html>
@include('layouts.htmlcore')
<head>
    <meta charset="UTF-8">
    <title>User Register - FlightFlareMart</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen flex flex-col items-center justify-center">
    @include('layouts.header')
    <div class="w-full max-w-sm bg-white p-6 shadow rounded-lg">
        <h2 class="text-xl font-semibold text-center mb-4">Register</h2>

        @if(session('error'))
            <div class="bg-red-100 text-red-700 p-2 rounded mb-3">{{ session('error') }}</div>
        @endif
        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-2 rounded mb-3">
                <ul class="text-sm pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register.post') }}">
            @csrf
            <div class="mb-3">
                <label class="block mb-1">Name</label>
                <input type="text" name="name" class="w-full border px-3 py-2 rounded" required>
            </div>
            <div class="mb-3">
                <label class="block mb-1">Email</label>
                <input type="email" name="email" class="w-full border px-3 py-2 rounded" required>
            </div>
            <div class="mb-3">
                <label class="block mb-1">Password</label>
                <input type="password" name="password" class="w-full border px-3 py-2 rounded" required>
            </div>
            <div class="mb-3">
                <label class="block mb-1">Confirm Password</label>
                <input type="password" name="password_confirmation" class="w-full border px-3 py-2 rounded" required>
            </div>
            <button class="bg-green-600 hover:bg-green-700 text-white w-full py-2 rounded">Register</button>
        </form>
    </div>
</body>
</html>
