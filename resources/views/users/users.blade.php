@extends('layouts.user')
@section('title')
    All the prankstars
@endsection

@section('content')

<div class="p-20">
    <ul role="list" class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
        @foreach ($users as $user)
        <section id="{{ $user->id }}">
            <li class="col-span-1 bg-white dark:bg-slate-700 hover:bg-slate-300 dark:hover:bg-slate-800 rounded-lg shadow divide-y divide-gray-200 dark:divide-gray-900 cursor-pointer" onclick="window.location='users/{{ $user->id }}'">
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
            </li>
        </section>
        @endforeach
    </ul>
</div>

@endsection