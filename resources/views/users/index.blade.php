@extends('layouts.user')

@section('content')
    <x-admin.header title="Alle User" />

    <div class="mb-8 flex flex-col sm:flex-row items-center gap-4 justify-between">
        <input type="text" id="userSearch" placeholder="Suche nach Username, Name oder E-Mail..."
            class="w-full sm:w-80 px-4 py-2 rounded-xl border border-blue-200 shadow focus:border-blue-400 focus:ring-2 focus:ring-blue-400 text-lg bg-white/80 placeholder-blue-300 transition-all duration-150" />
    </div>

    <div id="userGrid" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @foreach ($users as $user)
            <div class="user-card bg-white rounded-xl  p-6 flex flex-col items-center text-center shadow"
                data-search="{{ strtolower($user->username . ' ' . $user->first_name . ' ' . $user->last_name . ' ' . $user->email) }}">
                @if ($user->user_image)
                    <img src="{{ asset('storage/' . $user->user_image) }}" alt="Profilbild"
                        class="w-20 h-20 rounded-full object-cover border-2 border-blue-300 shadow mb-4">
                @else
                    <img src="https://ui-avatars.com/api/?name={{ $user->first_name }}" alt="Profilbild"
                        class="w-20 h-20 rounded-full object-cover border-2 border-blue-100 mb-4">
                @endif
                <div class="font-bold text-lg text-blue-700 mb-1">{{ $user->username }}</div>
                <div class="text-sm text-gray-500 mb-2">{{ $user->email }}</div>
                <div class="text-sm text-gray-700 mb-1">{{ $user->first_name }} {{ $user->last_name }}</div>
                <span class="inline-block px-3 py-1 rounded-full bg-blue-200 text-blue-800 text-xs font-semibold mb-2">{{ $user->role }}</span>
                <div class="text-xs text-gray-400">ID: {{ $user->id }}</div>
                <div class="text-xs text-gray-500 mt-1">Dabei seit:
                    @if ($user->registered_at)
                        {{ \Carbon\Carbon::parse($user->registered_at)->diffForHumans(null, true) }}
                    @else
                        -
                    @endif
                </div>
            </div>
        @endforeach
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const searchInput = document.getElementById('userSearch');
            const userCards = document.querySelectorAll('.user-card');
            searchInput.addEventListener('input', function () {
                const val = searchInput.value.trim().toLowerCase();
                userCards.forEach(card => {
                    const search = card.getAttribute('data-search');
                    card.style.display = search.includes(val) ? '' : 'none';
                });
            });
        });
    </script>
@endsection
