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
        <script src="https://cdn.jsdelivr.net/npm/flawcralib@1.0.8/dist/main.js"></script>
    </head>

    <body class="antialiased">
    <nav class="fixed w-full bg-gradient-to-br from-[#017de8] to-[#4e9ee2]">
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
                    <img class="block lg:hidden h-8 w-auto cursor-pointer" src="/favicon-32x32.png" alt="Soundboard" onclick="window.location='https://thatsoundboard.com'" draggable="false">
                    <img class="hidden lg:block h-8 w-auto cursor-pointer" src="/default-monochrome-white.svg" alt="Soundboard" onclick="window.location='https://thatsoundboard.com'" draggable="false">
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
                    <button type="button" onclick='toggleSoundList()' class="p-1 rounded-full text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">
                        <span class="sr-only">View sounds</span>
                        <i class="fa-solid fa-waveform-lines"></i>
                    </button>

                    <button type="button" class="p-1 rounded-full text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">
                        <span class="sr-only">View notifications</span>
                        <i class="fa-solid fa-bell"></i>
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
            <div id="notification" class="max-w-sm w-full bg-white shadow-lg rounded-lg pointer-events-auto ring-1 ring-black ring-opacity-5 overflow-hidden translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2 hidden">
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


        <!-- Tooltip / Interaction menu -->
        <menu type="context" id="soundmenu" class="hidden fixed top-[30px] left-[223px]">
            <div class="mx-auto container max-w-[228px] bg-white rounded">
                <nav class="space-y-1" aria-label="Actions">
                    <a href="#" id="shareButton" class="text-gray-600 hover:bg-gray-50 hover:text-gray-900 flex items-center px-3 py-2 text-sm font-medium rounded-md">
                    <span class="truncate"><i class="fa-solid fa-share"></i> Share </span>
                    </a>
                </nav>

                <svg class="absolute z-10  bottom-[-8px] " width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8 10L0 0L16 1.41326e-06L8 10Z" fill="white" />
                </svg>
            </div>
        </menu>

        <div id="playingsounds" class="hidden fixed bottom-0 left-0 w-full flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 dark:border-gray-900 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-900">
                            <thead class="bg-white dark:bg-slate-700">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-900 dark:text-white uppercase tracking-wider">Sound</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-900 dark:text-white uppercase tracking-wider">Progress</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-900 dark:text-white uppercase tracking-wider">Volume<input id="mastervolume" class="w-full bg-gray-200 rounded-lg h-2.5 dark:bg-gray-600" type="range" min="0" max="100" value="50"></th>
                                    <th scope="col" class="px-6 py-3 text-right">
                                        <a onclick="stopAllSounds()" class="cursor-pointer"><i class="fa-solid fa-stop"></i></a>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>



        <script>
            let playingSounds = [];

            if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
                changeTheme("dark");
            }
            window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', e => {
                const newColorScheme = e.matches ? "dark" : "light";
                changeTheme(newColorScheme);
            });

            function changeTheme(theme) {
                switch (theme)
                {
                    case "dark":
                        document.body.classList.add("dark")
                        break;
                    case "light":
                        document.body.classList.remove("dark")
                        break;
                }
            }

            if(localStorage.getItem("thatsoundboard:globalvolume")) {
                document.getElementById('mastervolume').value = localStorage.getItem("thatsoundboard:globalvolume");
            }

            if(localStorage.getItem("thatsoundboard:soundmenu") == "true") {
                document.getElementById("playingsounds").classList.remove("hidden");
            }

            document.addEventListener('scroll', event => {
                document.getElementById('soundmenu').classList.add('hidden');
            });

            window.addEventListener('resize', event => {
                document.getElementById('soundmenu').classList.add('hidden');
            });

            document.addEventListener('contextmenu', event => {
                const path = event.path || (event.composedPath && event.composedPath());
                // Test if event.path contains a li element with an id that starts with sound-
                if (path.some(element => element.id && element.id.startsWith('sound-'))) {
                    event.preventDefault();
                    // Get element of path that starts with sound-
                    const element = path.find(element => element.id && element.id.startsWith('sound-'));
                    // Split id of element into array
                    const id = element.id.split('-');
                    // Get userid from array
                    const userid = id[1];
                    // Get sound name from array
                    const sound = id[2];
                    // Build url for sound
                    const soundUrl = '{{ $soundLink }}/' + userid + '/' + sound;

                    // Add the share link to the menu
                    document.getElementById('shareButton').onclick = () => {
                        FlawCraLIB.copyTextToClipboard(soundUrl);
                        showNotification('Copied to clipboard!', 'The share link has been copied to your clipboard.');	// Show notification
                    };

                    document.getElementById('soundmenu').style.top = (event.clientY - 40) + 'px';
                    document.getElementById('soundmenu').style.left = event.clientX + 'px';
                    document.getElementById('soundmenu').classList.remove('hidden');
                } else {
                    document.getElementById('soundmenu').classList.add('hidden');
                }
            });

            document.addEventListener('click', event => {
                if (event.target.id !== 'soundmenu') {
                    document.getElementById('soundmenu').classList.add('hidden');
                }
            });

            function showNotification(title, message) {
                document.getElementById('notification-title').innerText = title;
                document.getElementById('notification-message').innerText = message;

                const notification = document.getElementById('notification');
                notification.classList.remove('hidden');
                setTimeout(function() {
                    notification.classList.remove('transition', 'ease-in', 'duration-100');
                    notification.classList.add('transition', 'ease-out', 'duration-300');
                    notification.classList.remove('translate-y-2', 'opacity-0', 'sm:translate-y-0', 'sm:translate-x-2');
                    notification.classList.add('translate-y-0', 'opacity-100', 'sm:translate-x-0');
                    setTimeout(function() {
                        notification.classList.remove('transition', 'ease-out', 'duration-300');
                        notification.classList.add('transition', 'ease-in', 'duration-100');
                        notification.classList.remove('translate-y-0', 'opacity-100', 'sm:translate-x-0');
                        notification.classList.add('translate-y-2', 'opacity-0', 'sm:translate-y-0', 'sm:translate-x-2');
                        setTimeout(function() {
                            notification.classList.add('hidden');
                        }, 100);
                    }, 1500);
                }, 100);
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

            function toggleSoundList() {
                const el = document.getElementById("playingsounds");
                el.classList.toggle("hidden");
                localStorage.setItem('thatsoundboard:soundmenu', !el.classList.contains("hidden"));
            }

            function playSound(soundLink, userId, soundName) {
                let audio = new Audio(`${soundLink}/${userId}/${soundName}`);
                const UUID = uuidv4();
                audio.addEventListener('ended', event => {
                    if(!audio.paused) audio.pause();
                    audio = null;
                    document.getElementById(UUID).remove();
                    playingSounds = playingSounds.filter(singleSound => singleSound.UUID !== UUID);
                });
                audio.addEventListener('loadedmetadata', event => {
                    const tr = document.createElement('tr');
                    tr.classList.add('bg-white', 'dark:bg-slate-700');
                    tr.setAttribute("id", UUID);

                    const sound = document.createElement('td');
                    sound.classList.add('px-6', 'py-4', 'text-sm', 'font-medium', 'text-gray-500');
                    if(soundName.length > 4) sound.innerText = soundName.substring(0,4)+"...";
                    else sound.innerText = soundName;

                    tr.appendChild(sound);

                    const progContainer = document.createElement('td');
                    progContainer.classList.add('px-6', 'py-4', 'whitespace-nowrap', 'text-sm', 'text-gray-500');
                    const progress = document.createElement('input');
                    progress.classList.add('w-full', 'bg-gray-200', 'rounded-lg', 'h-2.5', 'dark:bg-gray-600', 'prog-slider');
                    progress.setAttribute('type','range');
                    progress.setAttribute('min','0');
                    progress.setAttribute('max',''+audio.duration);
                    progress.setAttribute('value','0');
                    progress.addEventListener('input', event => {
                        if(audio) audio.currentTime = event.target.value;
                    });
                    progContainer.appendChild(progress);
                    tr.appendChild(progContainer);

                    const volContainer = document.createElement('td');
                    volContainer.classList.add('px-6', 'py-4', 'whitespace-nowrap', 'text-sm', 'text-gray-500');
                    const volume = document.createElement('input');
                    volume.classList.add('w-full', 'bg-gray-200', 'rounded-lg', 'h-2.5', 'dark:bg-gray-600', 'vol-slider');
                    volume.setAttribute('type','range');
                    volume.setAttribute('min','0');
                    volume.setAttribute('max','100');
                    volume.setAttribute('value',''+document.getElementById('mastervolume').value);
                    volume.addEventListener('input', event => {
                        if(audio) audio.volume = event.target.value/100;
                    });
                    volContainer.appendChild(volume);
                    tr.appendChild(volContainer);

                    const stop = document.createElement('td');
                    stop.classList.add('px-6', 'py-4', 'whitespace-nowrap', 'text-right', 'text-sm', 'font-medium');
                    const stopBtn = document.createElement('a');
                    stopBtn.classList.add('cursor-pointer');
                    stopBtn.addEventListener('click', event => {
                        audio.pause();
                        audio = null;
                        document.getElementById(UUID).remove();
                        playingSounds = playingSounds.filter(singleSound => singleSound.UUID !== UUID);
                    });
                    const stopIcon = document.createElement('i');
                    stopIcon.classList.add('fa-solid', 'fa-stop');
                    stopBtn.appendChild(stopIcon);
                    stop.appendChild(stopBtn);
                    tr.appendChild(stop);

                    audio.addEventListener('timeupdate', event => {
                        progress.value = event.target.currentTime
                    });

                    audio.volume = document.getElementById('mastervolume').value/100;

                    document.querySelector('#playingsounds tbody').appendChild(tr);
                    playingSounds.push({UUID: UUID, audioEl: audio});
                    audio.play();
                });
            }

            document.getElementById('mastervolume').addEventListener('input', event => {
                for(const sound of playingSounds) {
                    sound.audioEl.volume = event.target.value/100;
                    document.getElementById(sound.UUID).querySelector(".vol-slider").value = event.target.value;
                }
                localStorage.setItem("thatsoundboard:globalvolume",event.target.value);
            });

            function stopAllSounds() {
                for(const sound of playingSounds) {
                    sound.audioEl.dispatchEvent(new CustomEvent('ended', {}));
                }
            }

            function uuidv4() {
                return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
                    const r = Math.random() * 16 | 0, v = c == 'x' ? r : (r & 0x3 | 0x8);
                    return v.toString(16);
                });
            }
        </script>
    </body>
</html>
