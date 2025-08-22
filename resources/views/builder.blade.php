@extends('layouts.app')

@section('content')
    <div class="max-w-3xl mx-auto mt-12 p-10 bg-white/40 backdrop-blur-lg rounded-3xl shadow-2xl border border-blue-100 animate-fade-in">
        <h1 class="text-4xl font-extrabold text-blue-700 mb-6 drop-shadow text-center">Builder</h1>
        <p class="text-blue-500 text-lg mb-8 leading-relaxed text-center">
            Willkommen im Builder! Hier kannst du dein Profil, deine Links und dein Design individuell gestalten.
        </p>

        <div class="mb-8 flex flex-col md:flex-row gap-4 items-center justify-center">
            <select id="add-field-type" class="px-4 py-2 rounded-xl border border-blue-200 bg-white/80 text-blue-700 font-semibold shadow focus:outline-none">
                <!-- Options via JS -->
            </select>
            <button id="add-field-btn" class="px-6 py-2 rounded-xl bg-blue-500 text-white font-semibold shadow hover:bg-blue-600 transition">Feld hinzufügen</button>
        </div>

        <div id="builder-fields" class="flex flex-col gap-2"></div>

        <div class="mt-10 text-center">
            <a href="/dashboard" class="inline-block px-8 py-3 rounded-full bg-gradient-to-r from-blue-500 to-blue-400 text-white font-semibold shadow-lg hover:scale-105 hover:from-blue-600 hover:to-blue-500 transition-all duration-200">Zurück zum Dashboard</a>
        </div>
    </div>
    <style>
        @keyframes fade-in {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in {
            animation: fade-in 0.7s cubic-bezier(.4,0,.2,1) both;
        }
    </style>
    <script src="/js/builder-fields.js"></script>
@endsection
