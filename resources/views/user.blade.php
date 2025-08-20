@extends('layouts.app')

@section('content')
    @if ($user->livestatus)
        <header class="header-wrapper">
            <!-- Avatar + Name -->
            <div class="header-avatar-wrapper">
                @if ($user->user_image)
                    <img src="{{ $user->user_image }}" alt="Profilbild" class="header-avatar-img" />
                @else
                    <img src="https://ui-avatars.com/api/?name={{ $user->first_name ?? $user->username }}" alt="Profilbild"
                        class="header-avatar-img" />
                @endif
                <div class="header-name-block">
                    <span class="header-name">{{ $user->first_name }} {{ $user->last_name }}</span>
                    <span class="header-title">{{ '@' . $user->username }}</span>
                </div>
            </div>

            <!-- Toggle Button -->
            <button class="header-toggle-btn">
                <svg viewBox="0 0 256 256" class="header-toggle-icon">
                    <path
                        d="M216 112v96a16 16 0 0 1-16 16H56a16 16 0 0 1-16-16v-96a16 16 0 0 1 16-16h24a8 8 0 0 1 0 16H56v96h144v-96h-24a8 8 0 0 1 0-16h24a16 16 0 0 1 16 16ZM93.66 69.66 120 43.31V136a8 8 0 0 0 16 0V43.31l26.34 26.35a8 8 0 0 0 11.32-11.32l-40-40a8 8 0 0 0-11.32 0l-40 40a8 8 0 0 0 11.32 11.32Z" />
                </svg>
            </button>
        </header>

        <div class="flex items-center my-6">
            <div class="flex-1 h-px bg-gradient-to-l from-brand-200 to-transparent"></div>
            <h2 class="mx-4 text-sm text-brand-500/60 text-center">Über mich</h2>
            <div class="flex-1 h-px bg-gradient-to-r from-brand-200 to-transparent"></div>
        </div>

        <div class="header-about-me mt-4 mx-auto text-gray-700 text-sm max-w-md">
            <p class="bg-white/30 shadow mx-4 p-4 rounded-2xl">
                Hallo! Ich bin {{ $user->first_name }} und liebe es, neue Ideen umzusetzen und spannende Projekte zu
                entwickeln. Hier findest du meine wichtigsten Links und Social-Media-Profile. Viel Spaß beim Stöbern!
            </p>
        </div>

        <div class="flex items-center my-6">
            <div class="flex-1 h-px bg-gradient-to-l from-brand-200 to-transparent"></div>
            <h2 class="mx-4 text-sm text-brand-500/60 text-center">Meine Links</h2>
            <div class="flex-1 h-px bg-gradient-to-r from-brand-200 to-transparent"></div>
        </div>
        <section class="w-full max-w-5xl mx-auto px-4 flex flex-col gap-2">
            @forelse($links as $link)
                <a href="{{ $link->url }}" target="_blank" rel="noopener"
                    class="block w-full bg-white/30 border border-brand-100 shadow-sm rounded-full px-6 py-3 text-center font-semibold text-lg hover:bg-brand-50 transition-all duration-150
                        {{ $loop->first ? 'text-brand-700 bg-white/50 mb-2 border-brand-300 ' : 'text-brand-900' }}">
                    {{ $link->title }}
                </a>
            @empty
                <div class="text-center text-brand-300">Keine Links vorhanden.</div>
            @endforelse
        </section>
    @else
        <div class="p-4 text-brand-700">


            <div
                class="max-w-lg mx-auto mt-20 p-10  text-center">
                <div class="flex justify-center mb-6">
            <svg viewBox="0 0 105 105" class="size-12" xmlns="http://www.w3.org/2000/svg" fill="currentColor" ><circle cx="12.5" cy="12.5" r="12.5"><animate attributeName="fill-opacity" begin="0s" dur="1s" values="1;.2;1" calcMode="linear" repeatCount="indefinite"/></circle><circle cx="12.5" cy="52.5" r="12.5" fill-opacity=".5"><animate attributeName="fill-opacity" begin="100ms" dur="1s" values="1;.2;1" calcMode="linear" repeatCount="indefinite"/></circle><circle cx="52.5" cy="12.5" r="12.5"><animate attributeName="fill-opacity" begin="300ms" dur="1s" values="1;.2;1" calcMode="linear" repeatCount="indefinite"/></circle><circle cx="52.5" cy="52.5" r="12.5"><animate attributeName="fill-opacity" begin="600ms" dur="1s" values="1;.2;1" calcMode="linear" repeatCount="indefinite"/></circle><circle cx="92.5" cy="12.5" r="12.5"><animate attributeName="fill-opacity" begin="800ms" dur="1s" values="1;.2;1" calcMode="linear" repeatCount="indefinite"/></circle><circle cx="92.5" cy="52.5" r="12.5"><animate attributeName="fill-opacity" begin="400ms" dur="1s" values="1;.2;1" calcMode="linear" repeatCount="indefinite"/></circle><circle cx="12.5" cy="92.5" r="12.5"><animate attributeName="fill-opacity" begin="700ms" dur="1s" values="1;.2;1" calcMode="linear" repeatCount="indefinite"/></circle><circle cx="52.5" cy="92.5" r="12.5"><animate attributeName="fill-opacity" begin="500ms" dur="1s" values="1;.2;1" calcMode="linear" repeatCount="indefinite"/></circle><circle cx="92.5" cy="92.5" r="12.5"><animate attributeName="fill-opacity" begin="200ms" dur="1s" values="1;.2;1" calcMode="linear" repeatCount="indefinite"/></circle></svg>

                </div>
                <h2 class="text-3xl font-extrabold text-brand-700 mb-3">Profil im Aufbau</h2>
                <p class="text-brand-500 text-lg mb-2">{{ '@' . $user->username }} arbeitet gerade fleißig an seinem Profil.
                    Bald kannst du hier alle Infos und Links entdecken!</p>
                <span class="inline-block mt-4 px-4 py-2 bg-brand-100 text-brand-600 rounded-full font-medium shadow-sm">Schau
                    demnächst nochmal vorbei – es lohnt sich!</span>
            </div>
        </div>
    @endif
@endsection
