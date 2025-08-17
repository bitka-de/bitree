@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-gray-50 flex flex-col md:flex-row overflow-x-hidden">
        <!-- Blur Mask -->
        <div id="navMask"
            class="fixed inset-0 bg-black/30 backdrop-blur-md z-10 transition-opacity duration-300 opacity-0 pointer-events-none md:hidden">
        </div>
        <!-- Burger Button -->
        <button id="burgerBtn"
            class="md:hidden fixed top-6 right-6 z-40 bg-gradient-to-r from-blue-600 to-blue-400 text-white p-3 rounded-full shadow-2xl flex items-center justify-center transition-all duration-300 hover:scale-110"
            onclick="toggleSidebar()">
            <span id="burgerIcon">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </span>
            <span id="closeIcon" style="display:none;">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </span>
        </button>



        <!-- Sidebar -->
        <aside id="sidebarNav"
            class="max-w-[90vw] w-full md:w-72 bg-white/90 backdrop-blur-lg shadow-2xl border-b md:border-b-0 md:border-r border-gray-200 flex flex-col py-8 px-6 items-start justify-start fixed md:static top-0 left-0 h-[100vh] md:h-auto z-30 transition-transform duration-300 ease-in-out md:translate-x-0 -translate-x-full md:translate-x-0 rounded-r-3xl">
            <div class="flex items-center gap-3 mb-8">
                <svg class="w-10 h-10 text-blue-500 drop-shadow-lg" fill="currentColor" stroke="none"
                    viewBox="0 0 256 256">
                    <path
                        d="M198.1 62.59a76 76 0 0 0-140.2 0A71.71 71.71 0 0 0 16 127.8C15.9 166 48 199 86.14 200a72.09 72.09 0 0 0 33.86-7.53V232a8 8 0 0 0 16 0v-39.53a72.17 72.17 0 0 0 32 7.53h1.82c38.18-1 70.29-34 70.18-72.2a71.71 71.71 0 0 0-41.9-65.21ZM169.45 184A56.08 56.08 0 0 1 136 174v-41l43.58-21.78a8 8 0 1 0-7.16-14.32L136 115.06V88a8 8 0 0 0-16 0v51.06l-36.42-18.22a8 8 0 1 0-7.16 14.32L120 156.94v17a56 56 0 0 1-33.45 10c-29.65-.71-54.63-26.42-54.55-56.1A55.77 55.77 0 0 1 67.11 76a8 8 0 0 0 4.53-4.67 60 60 0 0 1 112.72 0 8 8 0 0 0 4.53 4.67A55.79 55.79 0 0 1 224 127.84c.08 29.68-24.9 55.39-54.55 56.16Z" />
                </svg>
                <span class="text-2xl font-extrabold text-blue-700 tracking-wide drop-shadow">{{ config('app.name') }}<span
                        class="text-blue-400">Admin</span></span>
            </div>
            <nav class="flex-1 w-full">
                <ul class="flex flex-col gap-4 w-full">
                    <li><a href="#"
                            class="flex items-center gap-2 px-4 py-2 rounded-lg bg-blue-100 text-blue-700 font-semibold">
                            <svg :class="(selected === 'Dashboard') || (page === 'ecommerce' || page === 'analytics' ||
                                page === 'marketing' || page === 'crm' || page === 'stocks') ?
                            'menu-item-icon-active' : 'menu-item-icon-inactive'"
                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="menu-item-icon-inactive">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M5.5 3.25C4.25736 3.25 3.25 4.25736 3.25 5.5V8.99998C3.25 10.2426 4.25736 11.25 5.5 11.25H9C10.2426 11.25 11.25 10.2426 11.25 8.99998V5.5C11.25 4.25736 10.2426 3.25 9 3.25H5.5ZM4.75 5.5C4.75 5.08579 5.08579 4.75 5.5 4.75H9C9.41421 4.75 9.75 5.08579 9.75 5.5V8.99998C9.75 9.41419 9.41421 9.74998 9 9.74998H5.5C5.08579 9.74998 4.75 9.41419 4.75 8.99998V5.5ZM5.5 12.75C4.25736 12.75 3.25 13.7574 3.25 15V18.5C3.25 19.7426 4.25736 20.75 5.5 20.75H9C10.2426 20.75 11.25 19.7427 11.25 18.5V15C11.25 13.7574 10.2426 12.75 9 12.75H5.5ZM4.75 15C4.75 14.5858 5.08579 14.25 5.5 14.25H9C9.41421 14.25 9.75 14.5858 9.75 15V18.5C9.75 18.9142 9.41421 19.25 9 19.25H5.5C5.08579 19.25 4.75 18.9142 4.75 18.5V15ZM12.75 5.5C12.75 4.25736 13.7574 3.25 15 3.25H18.5C19.7426 3.25 20.75 4.25736 20.75 5.5V8.99998C20.75 10.2426 19.7426 11.25 18.5 11.25H15C13.7574 11.25 12.75 10.2426 12.75 8.99998V5.5ZM15 4.75C14.5858 4.75 14.25 5.08579 14.25 5.5V8.99998C14.25 9.41419 14.5858 9.74998 15 9.74998H18.5C18.9142 9.74998 19.25 9.41419 19.25 8.99998V5.5C19.25 5.08579 18.9142 4.75 18.5 4.75H15ZM15 12.75C13.7574 12.75 12.75 13.7574 12.75 15V18.5C12.75 19.7426 13.7574 20.75 15 20.75H18.5C19.7426 20.75 20.75 19.7427 20.75 18.5V15C20.75 13.7574 19.7426 12.75 18.5 12.75H15ZM14.25 15C14.25 14.5858 14.5858 14.25 15 14.25H18.5C18.9142 14.25 19.25 14.5858 19.25 15V18.5C19.25 18.9142 18.9142 19.25 18.5 19.25H15C14.5858 19.25 14.25 18.9142 14.25 18.5V15Z"
                                    fill="currentColor"></path>
                            </svg>
                            Dashboard</a></li>
                    <li><a href="#"
                            class="flex items-center gap-2 px-4 py-2 rounded-lg hover:bg-gray-100 text-gray-700">
                            <svg :class="(selected === 'UiElements') || (page === 'alerts' || page === 'avatars' ||
                                page === 'badge' || page === 'breadcrumb' || page === 'buttons' ||
                                page === 'buttonsGroup' || page === 'cards' || page === 'carousel' ||
                                page === 'dropdowns' || page === 'images' || page === 'list' ||
                                page === 'modals' || page === 'notifications' || page === 'pagination' ||
                                page === 'popovers' || page === 'progress' || page === 'spinners' ||
                                page === 'tooltips' || page === 'videos') ? 'menu-item-icon-active' :
                            'menu-item-icon-inactive'"
                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="menu-item-icon-inactive">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M11.665 3.75618C11.8762 3.65061 12.1247 3.65061 12.3358 3.75618L18.7807 6.97853L12.3358 10.2009C12.1247 10.3064 11.8762 10.3064 11.665 10.2009L5.22014 6.97853L11.665 3.75618ZM4.29297 8.19199V16.0946C4.29297 16.3787 4.45347 16.6384 4.70757 16.7654L11.25 20.0365V11.6512C11.1631 11.6205 11.0777 11.5843 10.9942 11.5425L4.29297 8.19199ZM12.75 20.037L19.2933 16.7654C19.5474 16.6384 19.7079 16.3787 19.7079 16.0946V8.19199L13.0066 11.5425C12.9229 11.5844 12.8372 11.6207 12.75 11.6515V20.037ZM13.0066 2.41453C12.3732 2.09783 11.6277 2.09783 10.9942 2.41453L4.03676 5.89316C3.27449 6.27429 2.79297 7.05339 2.79297 7.90563V16.0946C2.79297 16.9468 3.27448 17.7259 4.03676 18.1071L10.9942 21.5857L11.3296 20.9149L10.9942 21.5857C11.6277 21.9024 12.3732 21.9024 13.0066 21.5857L19.9641 18.1071C20.7264 17.7259 21.2079 16.9468 21.2079 16.0946V7.90563C21.2079 7.05339 20.7264 6.27429 19.9641 5.89316L13.0066 2.41453Z"
                                    fill="currentColor"></path>
                            </svg>
                            Elements</a></li>
                    <li><a href="{{ route('profile.edit') }}"
                            class="flex items-center gap-2 px-4 py-2 rounded-lg hover:bg-gray-100 text-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6" viewBox="0 0 256 256">
                                <path
                                    d="M230.92 212c-15.23-26.33-38.7-45.21-66.09-54.16a72 72 0 1 0-73.66 0c-27.39 8.94-50.86 27.82-66.09 54.16a8 8 0 1 0 13.85 8c18.84-32.56 52.14-52 89.07-52s70.23 19.44 89.07 52a8 8 0 1 0 13.85-8ZM72 96a56 56 0 1 1 56 56 56.06 56.06 0 0 1-56-56Z" />
                            </svg>
                            Profile</a></li>
                    <li><a href="{{ route('preview') }}"
                            class="flex items-center gap-2 px-4 py-2 rounded-lg hover:bg-gray-100 text-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6" viewBox="0 0 256 256">
                                <path
                                    d="M216 40h-80V24a8 8 0 0 0-16 0v16H40a16 16 0 0 0-16 16v120a16 16 0 0 0 16 16h39.36l-21.61 27a8 8 0 0 0 12.5 10l29.59-37h56.32l29.59 37a8 8 0 1 0 12.5-10l-21.61-27H216a16 16 0 0 0 16-16V56a16 16 0 0 0-16-16Zm0 136H40V56h176v120Z" />
                            </svg>
                            Vorschau</a></li>

                    @if (Auth::user()->role === 'master')
                        <li><a href="{{ route('users.index') }}"
                                class="flex items-center gap-2 px-4 py-2 rounded-lg hover:bg-gray-100 text-gray-700">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6" viewBox="0 0 256 256">
                                    <path
                                        d="M117.25 157.92a60 60 0 1 0-66.5 0 95.83 95.83 0 0 0-47.22 37.71 8 8 0 1 0 13.4 8.74 80 80 0 0 1 134.14 0 8 8 0 0 0 13.4-8.74 95.83 95.83 0 0 0-47.22-37.71ZM40 108a44 44 0 1 1 44 44 44.05 44.05 0 0 1-44-44Zm210.14 98.7a8 8 0 0 1-11.07-2.33A79.83 79.83 0 0 0 172 168a8 8 0 0 1 0-16 44 44 0 1 0-16.34-84.87 8 8 0 1 1-5.94-14.85 60 60 0 0 1 55.53 105.64 95.83 95.83 0 0 1 47.22 37.71 8 8 0 0 1-2.33 11.07Z" />
                                </svg>
                                Users</a></li>
                    @endcan

                    <li><a href="{{route('mylinks')}}"
                            class="flex items-center gap-2 px-4 py-2 rounded-lg bg-blue-100 text-blue-700 font-semibold">
                            <svg :class="(selected === 'Dashboard') || (page === 'ecommerce' || page === 'analytics' ||
                                page === 'marketing' || page === 'crm' || page === 'stocks') ?
                            'menu-item-icon-active' : 'menu-item-icon-inactive'"
                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="menu-item-icon-inactive">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M5.5 3.25C4.25736 3.25 3.25 4.25736 3.25 5.5V8.99998C3.25 10.2426 4.25736 11.25 5.5 11.25H9C10.2426 11.25 11.25 10.2426 11.25 8.99998V5.5C11.25 4.25736 10.2426 3.25 9 3.25H5.5ZM4.75 5.5C4.75 5.08579 5.08579 4.75 5.5 4.75H9C9.41421 4.75 9.75 5.08579 9.75 5.5V8.99998C9.75 9.41419 9.41421 9.74998 9 9.74998H5.5C5.08579 9.74998 4.75 9.41419 4.75 8.99998V5.5ZM5.5 12.75C4.25736 12.75 3.25 13.7574 3.25 15V18.5C3.25 19.7426 4.25736 20.75 5.5 20.75H9C10.2426 20.75 11.25 19.7427 11.25 18.5V15C11.25 13.7574 10.2426 12.75 9 12.75H5.5ZM4.75 15C4.75 14.5858 5.08579 14.25 5.5 14.25H9C9.41421 14.25 9.75 14.5858 9.75 15V18.5C9.75 18.9142 9.41421 19.25 9 19.25H5.5C5.08579 19.25 4.75 18.9142 4.75 18.5V15ZM12.75 5.5C12.75 4.25736 13.7574 3.25 15 3.25H18.5C19.7426 3.25 20.75 4.25736 20.75 5.5V8.99998C20.75 10.2426 19.7426 11.25 18.5 11.25H15C13.7574 11.25 12.75 10.2426 12.75 8.99998V5.5ZM15 4.75C14.5858 4.75 14.25 5.08579 14.25 5.5V8.99998C14.25 9.41419 14.5858 9.74998 15 9.74998H18.5C18.9142 9.74998 19.25 9.41419 19.25 8.99998V5.5C19.25 5.08579 18.9142 4.75 18.5 4.75H15ZM15 12.75C13.7574 12.75 12.75 13.7574 12.75 15V18.5C12.75 19.7426 13.7574 20.75 15 20.75H18.5C19.7426 20.75 20.75 19.7427 20.75 18.5V15C20.75 13.7574 19.7426 12.75 18.5 12.75H15ZM14.25 15C14.25 14.5858 14.5858 14.25 15 14.25H18.5C18.9142 14.25 19.25 14.5858 19.25 15V18.5C19.25 18.9142 18.9142 19.25 18.5 19.25H15C14.5858 19.25 14.25 18.9142 14.25 18.5V15Z"
                                    fill="currentColor"></path>
                            </svg>
                            Links</a></li>



            </ul>
        </nav>
        <div class="md:mt-auto md:pt-10 w-full">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="w-full flex items-center justify-center gap-2 px-4 py-2 rounded-lg border border-white hover:bg-red-50 text-red-500 shadow transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 text-red-400" fill="currentColor"
                        viewBox="0 0 256 256">
                        <path
                            d="M120 216a8 8 0 0 1-8 8H48a8 8 0 0 1-8-8V40a8 8 0 0 1 8-8h64a8 8 0 0 1 0 16H56v160h56a8 8 0 0 1 8 8Zm109.66-93.66-40-40a8 8 0 0 0-11.32 11.32L204.69 120H112a8 8 0 0 0 0 16h92.69l-26.35 26.34a8 8 0 0 0 11.32 11.32l40-40a8 8 0 0 0 0-11.32Z" />
                    </svg>
                    <span>Logout</span>
                </button>
            </form>
        </div>
    </aside>
    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebarNav');
            const burgerIcon = document.getElementById('burgerIcon');
            const closeIcon = document.getElementById('closeIcon');
            const navMask = document.getElementById('navMask');
            const isOpen = !sidebar.classList.contains('-translate-x-full');
            sidebar.classList.toggle('-translate-x-full');
            if (isOpen) {
                burgerIcon.style.display = '';
                closeIcon.style.display = 'none';
                navMask.style.opacity = '0';
                navMask.style.pointerEvents = 'none';
            } else {
                burgerIcon.style.display = 'none';
                closeIcon.style.display = '';
                navMask.style.opacity = '1';
                navMask.style.pointerEvents = 'auto';
            }
        }
        // Sidebar automatisch schließen bei Klick außerhalb auf Mobilgeräten
        document.addEventListener('click', function(e) {
            const sidebar = document.getElementById('sidebarNav');
            const burger = document.getElementById('burgerBtn');
            if (!sidebar.contains(e.target) && !burger.contains(e.target) && window.innerWidth < 768) {
                sidebar.classList.add('-translate-x-full');
            }
        });
    </script>

    <!-- Main Content -->
    <main class="flex-1 p-4 md:p-10">
        <div class="flex flex-col md:flex-row items-center justify-between mb-8 gap-4">
            <h1 class="text-3xl font-extrabold text-blue-700 hidden sm:flex">Dashboard</h1>


            <a href="{{ route('profile.edit') }}"
                class="flex sm:shadow sm:bg-white pl-4 flex-col-reverse sm:flex-row  items-center gap-4 hover:bg-gray-100 px-2 py-1 rounded transition">
                <span class="text-gray-600">{{ preg_replace('/^https?:\/\//', '', config('app.url')) }}/<span
                        class="font-semibold">{{ '@' . Auth::user()->username }}</span></span>
                @if (Auth::user()->user_image)
                    <img src="{{ Auth::user()->user_image }}"
                        class="size-36 sm:size-12 object-cover rounded-lg border border-gray-300" alt="Avatar">
                @else
                    <img src="https://ui-avatars.com/api/?name={{ Auth::user()->first_name ?? Auth::user()->username }}"
                        class="size-36 object-cover rounded-full border border-gray-300" alt="Avatar">
                @endif
            </a>
        </div>



        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-white rounded-2xl shadow p-6 flex flex-col gap-2">
                <span class="text-gray-500">Kunden</span>

                <span class="text-3xl font-bold text-blue-700">3.782</span>
                <span class="text-green-600 text-sm font-semibold">↑ 11,01%</span>
            </div>
            <div class="bg-white rounded-2xl shadow p-6 flex flex-col gap-2">
                <span class="text-gray-500">Bestellungen</span>
                <span class="text-3xl font-bold text-blue-700">5.359</span>
                <span class="text-red-600 text-sm font-semibold">↓ 9,05%</span>
            </div>
            <div class="bg-white rounded-2xl shadow p-6 flex flex-col gap-2">
                <span class="text-gray-500">Monatsziel</span>
                <div class="flex items-center gap-2">
                    <svg class="w-12 h-12 text-blue-400" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path d="M12 21c4.97 0 9-4.03 9-9s-4.03-9-9-9-9 4.03-9 9 4.03 9 9 9z" stroke="currentColor"
                            stroke-width="2" fill="none" />
                        <path d="M12 3v9l6 3" stroke="currentColor" stroke-width="2" fill="none" />
                    </svg>
                    <span class="text-2xl font-bold text-blue-700">75,55%</span>
                </div>
                <span class="text-green-600 text-sm font-semibold">+10%</span>
                <span class="text-gray-500 text-xs">Du verdienst heute 3.287€, das ist mehr als letzten Monat. Weiter
                    so!</span>
            </div>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-8">
            <div class="bg-white rounded-2xl shadow p-6">
                <h2 class="text-lg font-bold text-blue-700 mb-4">Monatliche Verkäufe</h2>
                <div class="h-40 flex items-end gap-2">
                    @foreach (['Jan' => 120, 'Feb' => 340, 'Mar' => 220, 'Apr' => 180, 'Mai' => 260, 'Jun' => 200, 'Jul' => 90, 'Aug' => 150, 'Sep' => 300, 'Okt' => 370, 'Nov' => 210, 'Dez' => 80] as $month => $value)
                        <div class="flex flex-col items-center justify-end h-full">
                            <div class="bg-blue-500 rounded w-6" style="height: {{ $value / 4 }}px"></div>
                            <span class="text-xs text-gray-500 mt-1">{{ $month }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="bg-white rounded-2xl shadow p-6">
                <h2 class="text-lg font-bold text-blue-700 mb-4">Statistiken</h2>
                <div
                    class="h-40 w-full bg-gradient-to-t from-blue-100 to-blue-300 rounded-xl relative overflow-hidden">
                    <svg viewBox="0 0 400 100" class="absolute left-0 top-0 w-full h-full">
                        <polyline fill="rgba(59,130,246,0.2)" stroke="#3b82f6" stroke-width="3"
                            points="0,80 40,60 80,70 120,50 160,60 200,40 240,60 280,30 320,60 360,20 400,80" />
                    </svg>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-2xl shadow p-6 overflow-x-auto">
            <h2 class="text-lg font-bold text-blue-700 mb-4">Letzte Aktivitäten</h2>
            <ul class="divide-y divide-gray-200">
                <li class="py-2 flex justify-between items-center"><span>Neuer Kunde: Max Mustermann</span><span
                        class="text-xs text-gray-400">vor 2h</span></li>
                <li class="py-2 flex justify-between items-center"><span>Bestellung #1234 abgeschlossen</span><span
                        class="text-xs text-gray-400">vor 3h</span></li>
                <li class="py-2 flex justify-between items-center"><span>Monatsziel erreicht</span><span
                        class="text-xs text-gray-400">vor 1d</span></li>
            </ul>
        </div>
    </main>
</div>
@endsection
