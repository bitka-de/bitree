@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50 p-8">
    <div class="max-w-4xl mx-auto bg-white rounded-2xl shadow p-8">
        <h1 class="text-2xl font-bold text-blue-700 mb-6">Alle User</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @foreach ($users as $user)
                <div class="bg-blue-50 rounded-xl shadow-lg p-6 flex flex-col items-center text-center border border-blue-100">
                    @if($user->user_image)
                        <img src="{{ asset('storage/' . $user->user_image) }}" alt="Profilbild" class="w-20 h-20 rounded-full object-cover border-2 border-blue-300 shadow mb-4">
                    @else
                        <img src="https://ui-avatars.com/api/?name={{ $user->first_name }}" alt="Profilbild" class="w-20 h-20 rounded-full object-cover border-2 border-blue-100 mb-4">
                    @endif
                    <div class="font-bold text-lg text-blue-700 mb-1">{{ $user->username }}</div>
                    <div class="text-sm text-gray-500 mb-2">{{ $user->email }}</div>
                    <div class="text-sm text-gray-700 mb-1">{{ $user->first_name }} {{ $user->last_name }}</div>
                    <span class="inline-block px-3 py-1 rounded-full bg-blue-200 text-blue-800 text-xs font-semibold mb-2">{{ $user->role }}</span>
                    <div class="text-xs text-gray-400">ID: {{ $user->id }}</div>
                    <div class="text-xs text-gray-500 mt-1">Dabei seit: {{ $user->registered_at ? \Carbon\Carbon::parse($user->registered_at)->format('d.m.Y') : '-' }}</div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
