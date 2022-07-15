@extends('layouts.user')
@section('title')
{{ $user->name }}
@endsection

@section('content')
<div class="p-20">
    <li class="col-span-1 bg-white dark:bg-slate-700 rounded-lg shadow divide-y divide-gray-200 dark:divide-gray-900">
        <div class="w-full flex items-center justify-between p-6 space-x-6">
            <div class="flex-1 truncate">
                <div class="flex items-center space-x-3">
                    <h3 class="text-gray-900 dark:text-white text-sm font-medium truncate">{{ $user->name }}</h3>
                    <span class="flex-shrink-0 inline-block px-2 py-0.5 text-green-800 dark:text-white text-xs font-medium bg-green-100 dark:bg-green-700 rounded-full">{{ $user->rank }}</span>
                </div>
                <p class="mt-1 text-gray-500 text-sm truncate">{{ $user->id }}</p>
            </div>
            <img class="w-10 h-10 bg-gray-300 rounded-full flex-shrink-0" src="https://cdn.discordapp.com/avatars/{{ $user->id }}/{{ $user->avatarUrl }}" alt="" draggable="false">
        </div>
        <div>
            <ul role="list" class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($user->sounds as $sound)
                <li id="sound-{{ $user->id }}-{{ $sound }}" class="col-span-1 bg-white dark:bg-slate-700 rounded-lg shadow cursor-pointer" onclick="new Audio('{{ $soundLink }}/{{ $user->id }}/{{ $sound }}').play()" contextmenu="soundmenu">
                    <div class="w-full flex items-center justify-between p-6 space-x-6">
                        <div class="flex-1 truncate">
                            <div class="justify-center text-center"><i class="fa-duotone fa-play"></i></div>
                            <p class="mt-1 text-gray-500 text-sm truncate text-center">{{ $sound }}</p>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </li>
</div>
@endsection

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

<script>
    const copyToClipboard = str => {
    if (navigator && navigator.clipboard && navigator.clipboard.writeText)
        return navigator.clipboard.writeText(str);
        return Promise.reject('The Clipboard API is not available.');
    };

    document.addEventListener('contextmenu', event => {
        // Test if event.path contains an li element with an id that starts with sound-
        if (event.path.some(element => element.id && element.id.startsWith('sound-'))) {
            event.preventDefault();
            // Get element of event.path that starts with sound-
            const element = event.path.find(element => element.id && element.id.startsWith('sound-'));
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
                copyToClipboard(soundUrl);
                showNotification('Copied to clipboard!', 'The share link has been copied to your clipboard.');	// Show notification
            };

            document.getElementById('soundmenu').style.top = (event.pageY - 40) + 'px';
            document.getElementById('soundmenu').style.left = event.pageX + 'px';
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
</script>