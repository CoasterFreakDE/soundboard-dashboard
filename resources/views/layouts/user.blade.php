<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ThatSoundboard ~ @yield('title')</title>
        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
        <link rel="manifest" href="/site.webmanifest">
        <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#288ee5">
        <meta name="apple-mobile-web-app-title" content="ThatSoundboard">
        <meta name="application-name" content="ThatSoundboard">
        <meta name="msapplication-TileColor" content="#d5d5d5">
        <meta name="theme-color" content="#d5d5d5">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <script src="https://icons.flawcra.cc/get.js" lang="text/javascript"></script>

        <!-- Resources -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    </head>

    <body class="antialiased dark">
    <nav class="bg-gradient-to-br from-[#017de8] to-[#4e9ee2]">
        <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
            <div class="relative flex items-center justify-between h-16">
                <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                    <!-- Mobile menu button-->
                    <button type="button" onclick="toggleMenu()" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg id="menu-icon-closed" class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <svg id="menu-icon-open" class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                    <div class="flex-shrink-0 flex items-center">
                    <img class="block lg:hidden h-8 w-auto" src="/favicon-32x32.png" alt="Soundboard">
                    <img class="hidden lg:block h-8 w-auto" src="/default-monochrome-white.svg" alt="Soundboard">
                    </div>
                    <div class="hidden sm:block sm:ml-6">
                    <div class="flex space-x-4">
                        <a href="{{ route('index') }}" class="{{ Route::currentRouteName() !== 'index' ? 'text-gray-300 hover:bg-gray-700 hover:text-white' : 'bg-blue-600 bg-opacity-70 text-white' }} px-3 py-2 rounded-md text-sm font-medium" aria-current="page">Soundboard</a>

                        <a href="{{ route('users') }}" class="{{ Route::currentRouteName() !== 'users' ? 'text-gray-300 hover:bg-gray-700 hover:text-white' : 'bg-blue-600 bg-opacity-70 text-white' }} px-3 py-2 rounded-md text-sm font-medium">Users</a>

                        <a href="{{ route('projects') }}" class="{{ Route::currentRouteName() !== 'projects' ? 'text-gray-300 hover:bg-gray-700 hover:text-white' : 'bg-blue-600 bg-opacity-70 text-white' }} px-3 py-2 rounded-md text-sm font-medium">Projects</a>

                        <a href="{{ route('about') }}" class="{{ Route::currentRouteName() !== 'about' ? 'text-gray-300 hover:bg-gray-700 hover:text-white' : 'bg-blue-600 bg-opacity-70 text-white' }} px-3 py-2 rounded-md text-sm font-medium">About</a>
                    </div>
                    </div>
                </div>
                <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                    <button type="button" class="p-1 rounded-full text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">
                    <span class="sr-only">View notifications</span>
                    <!-- Heroicon name: outline/bell -->
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                    </svg>
                    </button>

                    <!-- Profile dropdown -->
                    <div class="ml-3 relative">
                        <div>
                            <button type="button" class="bg-gray-800 flex text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                            <span class="sr-only">Open user menu</span>
                            <img class="h-8 w-8 rounded-full" src="https://cdn.devsky.one/images/discord-avatar-512-RXNUT.png" alt="">
                            </button>
                        </div>

                        <!--
                            Dropdown menu, show/hide based on menu state.

                            Entering: "transition ease-out duration-100"
                            From: "transform opacity-0 scale-95"
                            To: "transform opacity-100 scale-100"
                            Leaving: "transition ease-in duration-75"
                            From: "transform opacity-100 scale-100"
                            To: "transform opacity-0 scale-95"
                        -->
                        <!-- <div class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1"> -->
                            <!-- Active: "bg-gray-100", Not Active: "" -->
                            <!-- <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Your Profile</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-1">Settings</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2">Sign out</a>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile menu, show/hide based on menu state. -->
        <div class="sm:hidden hidden" id="mobile-menu">
            <div class="px-2 pt-2 pb-3 space-y-1">
            <a href="{{ route('index') }}" class="{{ Route::currentRouteName() !== 'index' ? 'text-gray-300 hover:bg-gray-700 hover:text-white' : 'bg-blue-600 bg-opacity-70 text-white' }} block px-3 py-2 rounded-md text-base font-medium" aria-current="page">Soundboard</a>

            <a href="{{ route('users') }}" class="{{ Route::currentRouteName() !== 'users' ? 'text-gray-300 hover:bg-gray-700 hover:text-white' : 'bg-blue-600 bg-opacity-70 text-white' }} block px-3 py-2 rounded-md text-base font-medium">Users</a>

            <a href="{{ route('projects') }}" class="{{ Route::currentRouteName() !== 'projects' ? 'text-gray-300 hover:bg-gray-700 hover:text-white' : 'bg-blue-600 bg-opacity-70 text-white' }} block px-3 py-2 rounded-md text-base font-medium">Projects</a>

            <a href="{{ route('about') }}" class="{{ Route::currentRouteName() !== 'about' ? 'text-gray-300 hover:bg-gray-700 hover:text-white' : 'bg-blue-600 bg-opacity-70 text-white' }} block px-3 py-2 rounded-md text-base font-medium">About</a>
            </div>
        </div>
        </nav>
        <div id="app">
            @yield('content')
        </div>


        <!-- Global notification live region, render this permanently at the end of the document -->
        <div aria-live="assertive" class="fixed inset-0 flex items-end px-4 py-6 pointer-events-none sm:p-6 sm:items-start">
        <div class="w-full flex flex-col items-center space-y-4 sm:items-end">
            <!--
            Notification panel, dynamically insert this into the live region when it needs to be displayed

            Entering: "transform ease-out duration-300 transition"
                From: "translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
                To: "translate-y-0 opacity-100 sm:translate-x-0"
            Leaving: "transition ease-in duration-100"
                From: "opacity-100"
                To: "opacity-0"
            -->
            <div id="notification" class="max-w-sm w-full bg-white shadow-lg rounded-lg pointer-events-auto ring-1 ring-black ring-opacity-5 overflow-hidden translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2">
            <div class="p-4">
                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <!-- Heroicon name: outline/check-circle -->
                        <svg class="h-6 w-6 text-green-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="ml-3 w-0 flex-1 pt-0.5">
                        <p id="notification-title" class="text-sm font-medium text-gray-900">Successfully saved!</p>
                        <p id="notification-message" class="mt-1 text-sm text-gray-500">Anyone with a link can now view this file.</p>
                    </div>
                </div>
            </div>
            </div>
        </div>
        </div>


        <script>
            function showNotification(title, message) {
                document.getElementById('notification-title').innerText = title;
                document.getElementById('notification-message').innerText = message;

                var notification = document.getElementById('notification');
                notification.classList.remove('transition', 'ease-in', 'duration-100');
                notification.classList.add('transition', 'ease-out', 'duration-300');
                notification.classList.remove('translate-y-2', 'opacity-0', 'sm:translate-y-0', 'sm:translate-x-2');
                notification.classList.add('translate-y-0', 'opacity-100', 'sm:translate-x-0');
                setTimeout(function() {
                    notification.classList.remove('transition', 'ease-out', 'duration-300');
                    notification.classList.add('transition', 'ease-in', 'duration-100');
                    notification.classList.remove('translate-y-0', 'opacity-100', 'sm:translate-x-0');
                    notification.classList.add('translate-y-2', 'opacity-0', 'sm:translate-y-0', 'sm:translate-x-2');
                }, 1500);
            }

            function toggleMenu() {
                // Toggle the menu icon closed
                document.getElementById("menu-icon-closed").classList.toggle("hidden");
                document.getElementById("menu-icon-closed").classList.toggle("block");

                // Toggle the menu icon open
                document.getElementById("menu-icon-open").classList.toggle("hidden");
                document.getElementById("menu-icon-open").classList.toggle("block");

                // Toggle the mobile menu
                document.getElementById("mobile-menu").classList.toggle("hidden");
            }
            document.addEventListener('contextmenu', event => event.preventDefault());



            
        </script>
    </body>
</html>
