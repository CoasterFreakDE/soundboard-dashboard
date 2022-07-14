@extends('layouts.user')
@section('title')
    All the prankstars
@endsection

@section('content')

@foreach ($users as $user)
<section id="{{ $user->id }}">
<div class="col-md-4">
    <div class="card mb-4 box-shadow">
        <div class="card-body">
            <div>
                <button type="button" class="bg-gray-800 flex text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                    <span class="sr-only">Open user menu</span>
                    <img class="h-8 w-8 rounded-full" src="https://cdn.discordapp.com/avatars/{{ $user->id }}/{{ $user->avatarUrl }}" alt="{{ $user->id }}" draggable="false">
                </button>
            </div>
            <!-- <img class="card-img-top" src="https://cdn.discordapp.com/avatars/{{ $user->id }}/{{ $user->avatarUrl }}" alt="{{ $user->id }}" draggable="false"> -->
            <h5 class="card-title">{{ $user->id }} (<small>{{ $user->count }}</small>)</h5>
            <a href="#{{ $user->id }}" class="btn btn-primary">View Profile</a>
        </div>
    </div>
</div>
</section>
@endforeach

@endsection