<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Passwort Manager</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">


    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<style>
    @keyframes spin-slow {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    .animate-spin-slow {
        animation: spin-slow 10s linear infinite;
    }

    .animate-bounce {
        animation: bounce 1.5s infinite;
    }
</style>

<body
    class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col">
    <header class="w-full lg:max-w-4xl max-w-[335px] text-sm mb-6 not-has-[nav]:hidden">
        @if (Route::has('login'))
            <nav class="flex items-center justify-end gap-4">
                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">Dashboard</a>
                @else
                    <a href="{{ route('login') }}"
                        class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal">Log
                        in</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">Register</a>
                    @endif
                @endauth
            </nav>
        @endif
    </header>

    <div class="flex items-center justify-center w-full transition-opacity opacity-100 duration-750 lg:grow">
        <main
            class="flex max-w-[335px] w-full flex-col lg:max-w-4xl lg:flex-row lg:items-center lg:justify-between gap-10">
            <!-- Text-Block -->
            <div class="text-center lg:text-left">
                <h1 class="text-4xl font-semibold leading-tight dark:text-white">Secure. Simple. Your Password Manager.
                </h1>
                <p class="mt-4 text-[#706f6c] dark:text-[#A1A09A]">Manage your passwords safely and easily – whether on
                    desktop or via browser extension.</p>
                <div class="mt-6">
                    <a href="{{ route('register') }}"
                        class="bg-black text-white px-6 py-2 rounded-md text-sm hover:bg-opacity-90">Get started</a>
                </div>

            </div>

            <!-- FontAwesome Icons (Schweben) -->
            <div class="hidden lg:flex relative w-[300px] h-[300px] items-center justify-center">
                <i class="fas fa-lock text-4xl text-gray-700 dark:text-gray-300 absolute animate-bounce"
                    style="top:10%; left:20%; animation-delay: 0s;"></i>
                <i class="fas fa-key text-3xl text-gray-500 dark:text-gray-400 absolute animate-bounce"
                    style="top:30%; right:15%; animation-delay: 0.3s;"></i>
                <i class="fas fa-user-shield text-5xl text-gray-600 dark:text-gray-300 absolute animate-bounce"
                    style="bottom:10%; left:25%; animation-delay: 0.6s;"></i>
                <i class="fas fa-database text-4xl text-gray-500 dark:text-gray-400 absolute animate-bounce"
                    style="top:50%; left:50%; animation-delay: 0.9s;"></i>
                <i class="fas fa-eye-slash text-3xl text-gray-700 dark:text-gray-300 absolute animate-bounce"
                    style="bottom:20%; right:20%; animation-delay: 1.2s;"></i>
            </div>
        </main>

    </div>

    @if (Route::has('login'))
        <div class="h-14.5 hidden lg:block"></div>
    @endif
</body>

</html>