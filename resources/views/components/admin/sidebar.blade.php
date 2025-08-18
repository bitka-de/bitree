@props(['active' => 'dashboard'])
<!-- Sidebar -->
<div>
    <!-- Blur Mask -->
    <div id="navMask"
        class="fixed inset-0 bg-black/30 backdrop-blur-md z-10 transition-opacity duration-300 opacity-0 pointer-events-none md:hidden">
    </div>
    <!-- Burger Button -->
    <button id="burgerBtn"
        class="md:hidden fixed top-6 right-6 z-40 bg-gradient-to-r from-brand-600 to-brand-400 text-white p-3 rounded-full shadow-2xl flex items-center justify-center transition-all duration-300 hover:scale-110"
        onclick="toggleSidebar()">
        <span id="burgerIcon">
            <svg class="size-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </span>
        <span id="closeIcon" style="display:none;">
            <svg class="size-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </span>
    </button>

    <aside id="sidebarNav"
        class="max-w-[90vw] min-h-screen w-full md:w-72 bg-white/90 backdrop-blur-lg shadow-2xl border-b md:border-b-0 md:border-r border-gray-200 flex flex-col pt-8 pb-2 px-6 items-start justify-start fixed md:static top-0 left-0 h-[100vh] md:h-auto z-30 transition-transform duration-300 ease-in-out md:translate-x-0 -translate-x-full md:translate-x-0 rounded-r-3xl">
        <div class="flex items-center gap-3 mb-8">
            <x-ui.logo />
        </div>
        {{-- Navigation  --}}
        <nav class="flex-1 w-full">
            <ul class="flex flex-col gap-4 w-full">

                {{-- Beispiel für die Verwendung der Komponente mit einem Icon --}}
                <x-admin.sidebar.link route="dashboard" :active="true" icon='phosphor-tree' label="Dashboard" />


                <x-admin.sidebar.link route="profile.edit" :active="true" icon='phosphor-user'
                    label="Mein Account" />
                @if (Auth::check() && Auth::user() && Auth::user()->role === 'master')
                    <x-admin.sidebar.link route="users.index" :active="true" icon='phosphor-users'
                        label="Benutzer" />
                @endif

                <x-admin.sidebar.link route="mylinks" :active="true" icon='phosphor-link'
                    label="Links" />
                <x-admin.sidebar.link route="preview" :active="true" icon='phosphor-device-mobile-camera'
                    label="Vorschau" />


            </ul>
        </nav>
        <div class="md:mt-auto md:pt-10 pb-2 w-full">
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
        <span class="text-xs block text-gray-500 mx-2">Version: {{ config('app.version') }}</span>
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
</div>
