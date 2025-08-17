@extends('layouts.app')

@section('content')
    <!-- DESIGN -->

    <x-ui.headbar title="Vorschau" />



    <header class="header-wrapper">
        <!-- Avatar + Name -->
        <div class="header-avatar-wrapper">
            @if (Auth::user()->user_image)
                <img src="{{ Auth::user()->user_image }}" alt="Profilbild" class="header-avatar-img" />
            @else
                <img src="https://ui-avatars.com/api/?name={{ Auth::user()->first_name ?? Auth::user()->username }}"
                    alt="Profilbild" class="header-avatar-img" />
            @endif
            <div class="header-name-block">
                <span class="header-name">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</span>
                <span class="header-title">{{ '@' . Auth::user()->username }}</span>
            </div>
        </div>

        <!-- Navigation -->
        {{-- <nav class="header-nav">
            <ul class="header-nav-list">
                <li><a href="#" class="nav-link nav-link-active">Home</a></li>
                <li><a href="#" class="nav-link">About</a></li>
                <li><a href="#" class="nav-link">Thinks</a></li>
                <li><a href="#" class="nav-link">Work</a></li>
                <li><a href="#" class="nav-link">Speaking</a></li>
                <li><a href="#" class="nav-link">Contact</a></li>
            </ul>
        </nav> --}}



        <!-- Toggle Button -->
        <button class="header-toggle-btn">
            <svg viewBox="0 0 256 256" class="header-toggle-icon">
                <path
                    d="M216 112v96a16 16 0 0 1-16 16H56a16 16 0 0 1-16-16v-96a16 16 0 0 1 16-16h24a8 8 0 0 1 0 16H56v96h144v-96h-24a8 8 0 0 1 0-16h24a16 16 0 0 1 16 16ZM93.66 69.66 120 43.31V136a8 8 0 0 0 16 0V43.31l26.34 26.35a8 8 0 0 0 11.32-11.32l-40-40a8 8 0 0 0-11.32 0l-40 40a8 8 0 0 0 11.32 11.32Z" />
            </svg>
        </button>
    </header>


    <main>

        <div class="flex items-center my-6">
            <div class="flex-1 h-px bg-gradient-to-l from-blue-200 to-transparent"></div>
            <h2 class="mx-4 text-sm text-blue-500/60 text-center">Über mich</h2>
            <div class="flex-1 h-px bg-gradient-to-r from-blue-200 to-transparent"></div>
        </div>

        <div class="header-about-me mt-4 mx-auto text-gray-700 text-sm max-w-md">
            <p class="bg-white/30 shadow mx-4 p-4 rounded-2xl">
                Hallo! Ich bin {{ Auth::user()->first_name }} und liebe es, neue Ideen umzusetzen und spannende Projekte zu
                entwickeln. Hier findest du meine wichtigsten Links und Social-Media-Profile. Viel Spaß beim Stöbern!
            </p>
        </div>

        <div class="flex items-center my-6">
            <div class="flex-1 h-px bg-gradient-to-l from-blue-200 to-transparent"></div>
            <h2 class="mx-4 text-sm text-blue-500/60 text-center">Meine Links</h2>
            <div class="flex-1 h-px bg-gradient-to-r from-blue-200 to-transparent"></div>
        </div>
        <section class="w-full max-w-5xl mx-auto px-4 flex flex-col gap-2">
            @forelse($links as $link)
                <a href="{{ $link->url }}" target="_blank" rel="noopener"
                    class="block w-full bg-white/30 border border-blue-100 shadow-sm rounded-full px-6 py-3 text-center font-semibold text-lg hover:bg-blue-50 transition-all duration-150
                    {{ $loop->first ? 'text-blue-700 bg-white/50 mb-2 border-blue-300 ' : 'text-blue-900' }}">
                    {{ $link->title }}
                </a>
            @empty
                <div class="text-center text-blue-300">Keine Links vorhanden.</div>
            @endforelse
        </section>


        <div class="flex items-center my-6">
            <div class="flex-1 h-px bg-gradient-to-l from-blue-200 to-transparent"></div>
            <h2 class="mx-4 text-sm text-blue-500/60 text-center">Meine Socials</h2>
            <div class="flex-1 h-px bg-gradient-to-r from-blue-200 to-transparent"></div>
        </div>

        <div class="flex gap-2 justify-center items-center">
            @php
                $socials = [
                    ['icon' => 'bxl-tiktok', 'url' => $user->tiktok ?? null],
                    ['icon' => 'bxl-facebook', 'url' => $user->facebook ?? null],
                    ['icon' => 'bxl-instagram', 'url' => $user->instagram ?? null],
                    ['icon' => 'bxl-youtube', 'url' => $user->youtube ?? null],
                    ['icon' => 'bxl-discord', 'url' => $user->discord ?? null],
                ];
            @endphp
            @foreach ($socials as $social)
                @if ($social['url'])
                    <a href="{{ $social['url'] }}" target="_blank" rel="noopener"
                        class="bg-white/30 border border-blue-400  rounded-full p-3 flex items-center shadow-sm hover:bg-blue-50 transition-all duration-150">
                        <x-dynamic-component :component="$social['icon']" class="w-6 h-6 text-blue-800" />
                    </a>
                @else
                    <div class="bg-white/30 border border-white shadow-lg rounded-full p-2 flex items-center">
                        <x-dynamic-component :component="$social['icon']" class="w-6 h-6 fill-gray-400" />
                    </div>
                @endif
            @endforeach
        </div>



    </main>
@endsection
