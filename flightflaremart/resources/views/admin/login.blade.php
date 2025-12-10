<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - FlightFlareMart</title>
    @include('layouts.head')
</head>

<body class="bg-gray-100 dark:bg-gray-900">

    <div class="flex flex-col items-center justify-center min-h-screen px-4">
        <div class="w-full max-w-md p-6 sm:p-8 space-y-6 bg-white rounded-xl shadow-lg dark:bg-gray-800">

            <!-- Logo and-text -->
            <div class="flex flex-col items-center space-y-2">
                <a href="/" class="flex items-center text-2xl font-semibold text-gray-900 dark:text-white">
                    <img class="w-8 h-8 mr-2 rounded-full" src="https://placehold.co/50x50/cad593/cad593?text=admin" alt="logo">
                    FlightFlareMart
                </a>
                <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                    Admin Sign In
                </h1>
            </div>

            <!-- Session Messages -->
            @if(session('error'))
            <div class="p-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                <span class="font-medium">Error!</span> {{ session('error') }}
            </div>
            @endif
            @if(session('success'))
            <div class="p-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                <span class="font-medium">Success!</span> {{ session('success') }}
            </div>
            @endif

            <!-- Form -->
            <form method="POST" action="{{ route('admin.login.post') }}" class="space-y-4 md:space-y-6">
                @csrf
                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
                    <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@company.com" required="">
                </div>
                <div>
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                    <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                </div>
                <div class="flex items-center justify-between">
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input id="remember" aria-describedby="remember" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800">
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="remember" class="text-gray-500 dark:text-gray-300">Remember me</label>
                        </div>
                    </div>
                    <!-- <a href="#" class="text-sm font-medium text-primary-600 hover:underline dark:text-primary-500">Forgot password?</a> -->
                </div>
                <button type="submit" class=" text-white bg-accent hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Sign in</button>
            </form>
        </div>

        <footer class="mt-8 text-center">
            <small class="text-gray-500 dark:text-gray-400">&copy; {{ date('Y') }} FlightFlareMart. All Rights Reserved.</small>
        </footer>
    </div>

</body>

</html>