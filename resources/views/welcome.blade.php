<!doctype html>
<html lang="de">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>bitree – Alle Links. Ein Ort.</title>
    <meta name="description"
        content="bitree – Erstelle in Sekunden eine smarte Link-in-Bio-Seite mit Tracking, Themes und DSGVO-Fokus." />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Tailwind CDN for quick preview; swap to your build pipeline in production -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: {
                            50: '#ecfdf5',
                            100: '#d1fae5',
                            200: '#a7f3d0',
                            300: '#6ee7b7',
                            400: '#34d399',
                            500: '#10b981',
                            600: '#059669',
                            700: '#047857',
                            800: '#065f46',
                            900: '#064e3b'
                        }
                    }
                }
            }
        }
    </script>
    <style>
        html {
            scroll-behavior: smooth;
        }

        /* Nice grain for depth */
        .grain {
            position: relative;
        }

        .grain:after {
            content: "";
            position: absolute;
            inset: 0;
            background-image: url('data:image/svg+xml;utf8,<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"300\" height=\"300\"><filter id=\"n\"><feTurbulence type=\"fractalNoise\" baseFrequency=\"0.8\" numOctaves=\"2\" stitchTiles=\"stitch\"/></filter><rect width=\"100%\" height=\"100%\" filter=\"url(%23n)\" opacity=\"0.05\"/></svg>');
            pointer-events: none;
            mix-blend-mode: soft-light;
        }

        .animated-headline {
            animation: fadeInUp 1s cubic-bezier(.4, 0, .2, 1);
            text-shadow: 0 2px 8px rgba(59, 130, 246, 0.08);
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: none;
            }
        }
    </style>
</head>

<body class="min-h-screen bg-gradient-to-br from-blue-50 via-white to-blue-100 selection:bg-brand-400 selection:text-white">
    <!-- Header -->
    <header class="sticky top-0 z-40 backdrop-blur border-b border-white/10 bg-white/60">
        <div class="mx-auto max-w-7xl px-4 py-3 flex items-center justify-between">
            <a href="#home" class="flex items-center gap-2">
                <span
                    class="inline-grid h-8 w-8 place-items-center rounded-xl bg-gradient-to-br from-blue-400 to-cyan-400"></span>
                <span class="text-xl font-semibold tracking-tight">bitree</span>
            </a>
            <nav class="hidden md:flex items-center gap-8 text-sm">
                <a href="#features" class="hover:text-white">Funktionen</a>
                <a href="#themes" class="hover:text-white">Themes</a>
                <a href="#pricing" class="hover:text-white">Preise</a>
                <a href="#faq" class="hover:text-white">FAQ</a>
            </nav>
            <div class="flex items-center gap-2">
                <a href="{{route('login')}}" class="text-sm">Login</a>
            </div>
        </div>
    </header>

    <!-- Hero -->
    <section id="home" class="relative overflow-hidden bg-gradient-to-br from-blue-50 via-white to-blue-100">
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top,_rgba(16,185,129,0.12),transparent_70%)] pointer-events-none"></div>
        <div class="grain"></div>
        <div class="relative mx-auto max-w-7xl px-4 pt-20 pb-24 grid md:grid-cols-2 gap-16 items-center">
            <div>
                <h1 class="text-4xl md:text-6xl font-bold tracking-tight animated-headline leading-tight">
                    Alle Links. Ein Ort.
                    <span class="block text-transparent bg-clip-text bg-gradient-to-r from-brand-400 to-cyan-400">bitree</span>
                </h1>
                <p class="mt-6 text-lg leading-relaxed text-slate-600">
                    Erstelle in Sekunden eine smarte "Link in Bio"‑Seite, teile Inhalte, tracke Klicks und wachse mit
                    deinem Publikum – schnell, datensparsam und ohne Code.
                </p>
                <!-- Username Auswahl -->
                <form id="username-form" class="mt-8 flex flex-col gap-3 max-w-xs">
                    <div class="flex flex-col w-full">
                        <label for="username"
                            class="mb-2 ml-2 text-xs font-medium text-slate-400 bg-white/80 px-2 py-0.5 rounded shadow-sm w-fit">Wähle
                            deinen Usernamen</label>
                        <div class="flex w-full">
                            <span
                                class="flex items-center px-3 rounded-l-xl bg-white/80 text-slate-400 border border-slate-300 border-r-0 select-none text-sm font-mono tracking-wide">bitree.de/@</span>
                            <input type="text" id="username" name="username" autocomplete="off"
                                class="flex-1 pr-4 py-2 bg-white/80 text-slate-800 border border-slate-300 border-l-0 rounded-r-xl font-mono transition-all text-sm duration-150 placeholder:text-slate-500 focus:ring-2 focus:ring-brand-400"
                                placeholder="z.B. deinname" />
                        </div>
                    </div>
                    <div id="username-status" class="text-sm mt-2 min-h-[1.5em] transition-colors"></div>
                    <a id="register-link" href="#signup"
                        class="hidden mt-2 inline-block px-4 py-2 rounded-xl font-semibold bg-brand-500 text-white hover:bg-brand-400 shadow-md transition-all">
                        Diesen Username registrieren</a>
                </form>
                <div class="mt-6 flex flex-wrap items-center gap-6 text-sm text-slate-500">
                    <div class="flex items-center gap-2"><span class="i h-4 w-4">✅</span> DSGVO‑freundlich</div>
                    <div class="flex items-center gap-2"><span class="i h-4 w-4">⚡</span> Ohne Code</div>
                    <div class="flex items-center gap-2"><span class="i h-4 w-4">✨</span> Custom Domains</div>
                </div>
            </div>
            <div class="relative sm:max-w-96 w-full sm:ml-auto mx-auto max-w-80">
                <div class="absolute -inset-4 bg-gradient-to-r from-brand-400/20 to-cyan-400/20 blur-3xl rounded-[2rem]"></div>
                <div class="relative rounded-2xl ring-1 ring-white/10 bg-white p-4 shadow-xl">
                    <!-- Mocked preview of a bitree page -->
                    <div class="rounded-xl bg-slate-800/70 ring-1 ring-white/10 p-6">
                        <div class="mx-auto h-16 w-16 rounded-full bg-gradient-to-br from-brand-400 to-cyan-400"></div>
                        <h3 class="mt-4 text-center text-xl font-semibold text-white">@deinname</h3>
                        <p class="mt-1 text-center text-slate-400 text-sm">Creator · Musik · Podcasts</p>
                        <div class="mt-6 grid gap-3">
                            <a class="block rounded-xl bg-white text-slate-800 px-4 py-3 text-center font-medium hover:bg-slate-200 transition"
                                href="#">Neueste Single</a>
                            <a class="block rounded-xl bg-brand-500 text-white px-4 py-3 text-center font-medium hover:bg-brand-400 transition"
                                href="#">YouTube Kanal</a>
                            <a class="block rounded-xl bg-slate-700 text-white px-4 py-3 text-center font-medium hover:bg-slate-600 transition"
                                href="#">Newsletter</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features -->
    <section id="features" class="py-20 border-t border-white/10 bg-slate-950">
        <div class="mx-auto max-w-7xl px-4">
            <div class="max-w-2xl">
                <span
                    class="inline-flex items-center gap-2 rounded-full border border-white/10 bg-white/60 px-3 py-1 text-xs text-slate-300">Was
                    bitree kann</span>
                <h2 class="mt-4 text-3xl md:text-4xl font-bold">Schnell, flexibel, messbar.</h2>
                <p class="mt-3 text-slate-300">Alles, was du für deine Link‑Seite brauchst – ohne Ballast.</p>
            </div>
            <div class="mt-10 grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Feature Card -->
                <div class="rounded-2xl p-6 bg-white/60 ring-1 ring-white/10">
                    <div class="h-10 w-10 rounded-xl bg-gradient-to-br from-brand-400 to-cyan-400"></div>
                    <h3 class="mt-4 font-semibold text-lg">Drag‑and‑Drop Links</h3>
                    <p class="mt-2 text-slate-400 text-sm">Ordne deine Links, Buttons und Blöcke per Ziehen & Ablegen.
                    </p>
                </div>
                <div class="rounded-2xl p-6 bg-white/60 ring-1 ring-white/10">
                    <div class="h-10 w-10 rounded-xl bg-gradient-to-br from-brand-400 to-cyan-400"></div>
                    <h3 class="mt-4 font-semibold text-lg">Statistiken & Klick‑Tracking</h3>
                    <p class="mt-2 text-slate-400 text-sm">Sieh, was funktioniert – Echtzeit‑Klicks, Referrer,
                        Top‑Links.</p>
                </div>
                <div class="rounded-2xl p-6 bg-white/60 ring-1 ring-white/10">
                    <div class="h-10 w-10 rounded-xl bg-gradient-to-br from-brand-400 to-cyan-400"></div>
                    <h3 class="mt-4 font-semibold text-lg">QR‑Codes</h3>
                    <p class="mt-2 text-slate-400 text-sm">Generiere QR‑Codes für Kampagnen und Offlineschaltungen.</p>
                </div>
                <div class="rounded-2xl p-6 bg-white/60 ring-1 ring-white/10">
                    <div class="h-10 w-10 rounded-xl bg-gradient-to-br from-brand-400 to-cyan-400"></div>
                    <h3 class="mt-4 font-semibold text-lg">Theme‑Designer</h3>
                    <p class="mt-2 text-slate-400 text-sm">Passe Farben, Typo und Buttons in Minuten an deine Brand an.
                    </p>
                </div>
                <div class="rounded-2xl p-6 bg-white/60 ring-1 ring-white/10">
                    <div class="h-10 w-10 rounded-xl bg-gradient-to-br from-brand-400 to-cyan-400"></div>
                    <h3 class="mt-4 font-semibold text-lg">Custom Domains</h3>
                    <p class="mt-2 text-slate-400 text-sm">Nutze deine eigene Domain, SSL inklusive.</p>
                </div>
                <div class="rounded-2xl p-6 bg-white/60 ring-1 ring-white/10">
                    <div class="h-10 w-10 rounded-xl bg-gradient-to-br from-brand-400 to-cyan-400"></div>
                    <h3 class="mt-4 font-semibold text-lg">DSGVO‑freundlich</h3>
                    <p class="mt-2 text-slate-400 text-sm">Server in der EU, keine unnötigen Tracker, Cookie‑arm.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Themes/Gallery -->
    <section id="themes" class="py-20 bg-gradient-to-b from-slate-950 to-white">
        <div class="mx-auto max-w-7xl px-4">
            <div class="flex items-end justify-between gap-6 flex-wrap">
                <div>
                    <h2 class="text-3xl md:text-4xl font-bold">Wähle deinen Look</h2>
                    <p class="mt-2 text-slate-300">Moderne, schnelle Themes – anpassbar mit einem Klick.</p>
                </div>
                <a href="#demo" class="px-4 py-2 rounded-xl border border-white/10 hover:bg-white/5">Alle Themes
                    ansehen</a>
            </div>
            <div class="mt-10 grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Theme Card -->
                <div class="group rounded-2xl overflow-hidden ring-1 ring-white/10 bg-white">
                    <div
                        class="aspect-[4/3] bg-gradient-to-br from-slate-800 to-slate-700 grid place-items-center text-slate-300">
                        Theme "Mono"</div>
                    <div class="p-4 flex items-center justify-between">
                        <div>
                            <h3 class="font-medium">Mono</h3>
                            <p class="text-sm text-slate-400">Minimal & schnell</p>
                        </div>
                        <a href="#" class="text-sm font-medium text-brand-400 group-hover:underline">Preview</a>
                    </div>
                </div>
                <div class="group rounded-2xl overflow-hidden ring-1 ring-white/10 bg-white">
                    <div
                        class="aspect-[4/3] bg-gradient-to-br from-brand-400/20 to-cyan-400/20 grid place-items-center text-slate-300">
                        Theme "Glow"</div>
                    <div class="p-4 flex items-center justify-between">
                        <div>
                            <h3 class="font-medium">Glow</h3>
                            <p class="text-sm text-slate-400">Farbverlauf & Akzent</p>
                        </div>
                        <a href="#" class="text-sm font-medium text-brand-400 group-hover:underline">Preview</a>
                    </div>
                </div>
                <div class="group rounded-2xl overflow-hidden ring-1 ring-white/10 bg-white">
                    <div
                        class="aspect-[4/3] bg-gradient-to-br from-slate-700 to-slate-800 grid place-items-center text-slate-300">
                        Theme "Cards"</div>
                    <div class="p-4 flex items-center justify-between">
                        <div>
                            <h3 class="font-medium">Cards</h3>
                            <p class="text-sm text-slate-400">Karten & Tiefe</p>
                        </div>
                        <a href="#" class="text-sm font-medium text-brand-400 group-hover:underline">Preview</a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Pricing -->
    <section id="pricing" class="py-20 border-t border-white/10 bg-slate-950">
        <div class="mx-auto max-w-7xl px-4">
            <div class="max-w-2xl">
                <h2 class="text-3xl md:text-4xl font-bold">Einfaches, faires Pricing</h2>
                <p class="mt-2 text-slate-300">Wähle das Modell, das zu dir passt.</p>
            </div>

            <div class="mt-10 grid lg:grid-cols-2 gap-6">
                <!-- Monatlich -->
                <div class="rounded-2xl p-6 bg-white/60 ring-1 ring-white/10 flex flex-col">
                    <h3 class="text-xl font-semibold">Monatlich</h3>
                    <p class="mt-1 text-slate-400">Flexibel & jederzeit kündbar</p>
                    <div class="mt-6 text-3xl font-bold">5,90€
                        <span class="text-base font-normal text-slate-400">/ Monat</span>
                    </div>
                    <ul class="mt-6 space-y-2 text-sm text-slate-300">
                        <li>• Unbegrenzte Links</li>
                        <li>• Statistiken</li>
                        <li>• Alle Features inklusive</li>
                    </ul>
                    <a href="#signup"
                        class="mt-6 inline-flex items-center justify-center px-4 py-2 rounded-xl bg-white text-white font-medium hover:bg-slate-200">Jetzt
                        starten</a>
                </div>

                <!-- Jährlich -->
                <div
                    class="rounded-2xl p-6 bg-gradient-to-b from-brand-500/10 to-cyan-500/10 ring-2 ring-brand-400/50 flex flex-col relative">
                    <div
                        class="inline-flex items-center gap-2 text-xs text-brand-300 border border-brand-400/30 px-2 py-1 rounded-full w-fit">
                        Beliebt</div>
                    <h3 class="mt-3 text-xl font-semibold">Jährlich</h3>
                    <p class="mt-1 text-slate-300">Einmal zahlen & sparen</p>
                    <div class="mt-6 text-3xl font-bold">59€
                        <span class="text-base font-normal text-slate-400">/ Jahr</span>
                    </div>
                    <div class="mt-1 text-sm font-medium text-emerald-400">✨ Spare 17% gegenüber monatlich</div>
                    <ul class="mt-6 space-y-2 text-sm text-slate-200">
                        <li>• Unbegrenzte Links</li>
                        <li>• Statistiken</li>
                        <li>• Alle Features inklusive</li>
                    </ul>
                    <a href="#signup"
                        class="mt-6 inline-flex items-center justify-center px-4 py-2 rounded-xl bg-brand-500 text-white font-semibold hover:bg-brand-400">Jetzt
                        starten</a>
                </div>
            </div>
        </div>
    </section>


    <!-- FAQ -->
    <section id="faq" class="py-20 bg-gradient-to-b from-slate-950 to-white">
        <div class="mx-auto max-w-5xl px-4">
            <h2 class="text-3xl md:text-4xl font-bold text-center">Häufige Fragen</h2>
            <div class="mt-10 grid md:grid-cols-2 gap-6">
                <details class="group rounded-2xl bg-white/60 ring-1 ring-white/10 p-5 open:bg-white">
                    <summary class="cursor-pointer list-none flex items-center justify-between">
                        <span class="font-medium">Brauche ich Programmierkenntnisse?</span>
                        <span class="transition-transform group-open:rotate-45 text-slate-400">+</span>
                    </summary>
                    <p class="mt-3 text-slate-300 text-sm">Nein. bitree ist komplett ohne Code nutzbar – baue deine
                        Seite per Klick.</p>
                </details>
                <details class="group rounded-2xl bg-white/60 ring-1 ring-white/10 p-5 open:bg-white">
                    <summary class="cursor-pointer list-none flex items-center justify-between">
                        <span class="font-medium">Kann ich meine Domain verbinden?</span>
                        <span class="transition-transform group-open:rotate-45 text-slate-400">+</span>
                    </summary>
                    <p class="mt-3 text-slate-300 text-sm">Ja. Ab Pro kannst du deine eigene Domain inklusive SSL
                        nutzen.</p>
                </details>
                <details class="group rounded-2xl bg-white/60 ring-1 ring-white/10 p-5 open:bg-white">
                    <summary class="cursor-pointer list-none flex items-center justify-between">
                        <span class="font-medium">Wie steht es um Datenschutz?</span>
                        <span class="transition-transform group-open:rotate-45 text-slate-400">+</span>
                    </summary>
                    <p class="mt-3 text-slate-300 text-sm">Server in der EU, minimale Cookies, kein unnötiges Tracking
                        – entspannter Datenschutz.</p>
                </details>
                <details class="group rounded-2xl bg-white/60 ring-1 ring-white/10 p-5 open:bg-white">
                    <summary class="cursor-pointer list-none flex items-center justify-between">
                        <span class="font-medium">Gibt es eine API?</span>
                        <span class="transition-transform group-open:rotate-45 text-slate-400">+</span>
                    </summary>
                    <p class="mt-3 text-slate-300 text-sm">Ja, im Business‑Plan stehen API & Webhooks für Integrationen
                        bereit.</p>
                </details>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="border-t border-white/10 bg-slate-950">
        <div class="mx-auto max-w-7xl px-4 py-12 grid md:grid-cols-4 gap-8 text-sm text-slate-300">
            <div>
                <div class="flex items-center gap-2">
                    <span
                        class="inline-grid h-8 w-8 place-items-center rounded-xl bg-gradient-to-br from-brand-400 to-cyan-400"></span>
                    <span class="text-lg font-semibold">bitree</span>
                </div>
                <p class="mt-3 text-slate-400">Der smarte Ort für all deine Links.</p>
            </div>
            <div>
                <h4 class="font-semibold text-slate-200">Produkt</h4>
                <ul class="mt-3 space-y-2">
                    <li><a class="hover:text-white" href="#features">Funktionen</a></li>
                    <li><a class="hover:text-white" href="#themes">Themes</a></li>
                    <li><a class="hover:text-white" href="#pricing">Preise</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-semibold text-slate-2 00">Rechtliches</h4>
                <ul class="mt-3 space-y-2">
                    <li><a class="hover:text-white" href="#">Impressum</a></li>
                    <li><a class="hover:text-white" href="#">Datenschutz</a></li>
                    <li><a class="hover:text-white" href="#">AGB</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-semibold text-slate-200">Los geht's</h4>
                <p class="mt-3 text-slate-400">Starte kostenlos und upgrade, wenn du willst.</p>
                <a href="#signup"
                    class="mt-4 inline-flex items-center justify-center px-4 py-2 rounded-xl font-semibold bg-brand-500 text-white hover:bg-brand-400">Gratis
                    starten</a>
            </div>
        </div>
        <div class="px-4">
            <div
                class="mx-auto max-w-7xl border-t border-white/10 py-6 text-xs text-slate-500 flex flex-wrap items-center justify-between">
                <span>© <span id="y"></span> bitree. Alle Rechte vorbehalten.</span>
                <span>Made with &hearts; by Bitka Webagentur</span>
            </div>
        </div>
    </footer>

    <script>
        // set year
        document.getElementById('y').textContent = new Date().getFullYear();
        // mobile nav (simple example without external libs)
        const toggle = document.getElementById('mobile-toggle');
        if (toggle) {
            toggle.addEventListener('click', () => {
                document.getElementById('mobile-menu').classList.toggle('hidden');
            });
        }

        // Username live validation
        const usernameInput = document.getElementById('username');
        const usernameStatus = document.getElementById('username-status');
        const registerLink = document.getElementById('register-link');
        let lastValue = '';
        usernameInput && usernameInput.addEventListener('input', function() {
            const val = usernameInput.value.trim();
            if (val === lastValue) return;
            lastValue = val;
            if (!val) {
                usernameStatus.textContent = '';
                registerLink.classList.add('hidden');
                return;
            }
            fetch('/validate-username', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || ''
                    },
                    body: JSON.stringify({
                        username: val
                    })
                })
                .then(r => r.json())
                .then(data => {
                    usernameStatus.textContent = data.message;
                    if (data.valid) {
                        usernameStatus.className = 'text-sm mt-2 text-emerald-400';
                        registerLink.classList.remove('hidden');
                        registerLink.href = `/register?username=${encodeURIComponent(val)}`;
                    } else {
                        usernameStatus.className = 'text-sm mt-2 text-rose-400';
                        registerLink.classList.add('hidden');
                    }
                })
                .catch(() => {
                    usernameStatus.textContent = 'Fehler bei der Prüfung.';
                    usernameStatus.className = 'text-sm mt-2 text-rose-400';
                    registerLink.classList.add('hidden');
                });
        });
    </script>
</body>

</html>
