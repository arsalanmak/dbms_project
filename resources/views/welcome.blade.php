<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name') }}</title>
        
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;400;500;600;700;800&display=swap" rel="stylesheet">
        <script src="https://cdn.tailwindcss.com"></script>
        <style>
            * {
                font-family: 'Poppins', sans-serif;
            }
        </style>
    </head>

    <body class="antialiased">
        <div class="flex flex-col sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-yellow-500 selection:bg-red-500 selection:text-white">
            <div class="w-36">
                <img class="w-100" src="{{ asset('images/logoo.png') }}" alt="">
            </div>
            <div class="main-content text-center p-4">
                <h1 class="text-5xl font-semibold tracking-wide text-dark">Welcome to Car Rental</h1>
                <p class="max-w-6xl text-dark text-lg my-3">The system provides car rental services, where the admin will lend car and the customer will lease his car. This system will aid the person who wants to commute and is ready to make earning by lending his car; he can lend it to a person who wants to lease it. The system will work as a moderator between the customer and the car owner.</p>
            </div>

            @if (Route::has('login'))
                <div class="sm:right-0 p-6 text-right z-10">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="font-semibold text-dark hover:text-dark dark:text-dark dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="border-2 px-5 py-3 rounded font-semibold text-dark hover:text-gray-900 dark:text-dark dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-black">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="border-2 px-5 py-3 rounded ml-4 font-semibold text-dark hover:text-gray-900 dark:text-dark dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-black">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

        </div>
    </body>
</html>
