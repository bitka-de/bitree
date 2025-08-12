@extends('layouts.app')

@section('content')
    @if ($errors->any())
        <div id="toast-error"
            class="fixed top-6 right-6 z-50 bg-red-600 text-white px-6 py-4 rounded-xl shadow-lg flex items-center gap-3 animate-fade-in">
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2" fill="none" />
                <path d="M12 8v4m0 4h.01" stroke="currentColor" stroke-width="2" fill="none" />
            </svg>
            <ul class="list-disc pl-3">
                @foreach ($errors->all() as $error)
                    <li>{{ __($error) }}</li>
                @endforeach
            </ul>
            <button onclick="document.getElementById('toast-error').style.display='none'"
                class="ml-4 text-white hover:text-gray-200 text-xl font-bold">&times;</button>
        </div>
        <script>
            setTimeout(function() {
                const toast = document.getElementById('toast-error');
                if (toast) toast.style.display = 'none';
            }, 4000);
        </script>
        <style>
            @keyframes fade-in {
                from {
                    opacity: 0;
                    transform: translateY(-20px);
                }

                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            .animate-fade-in {
                animation: fade-in 0.5s ease;
            }
        </style>
    @endif
    <div
        class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-100 via-white to-blue-300 text-gray-900">
        <div
            class="max-w-md w-full mx-4 sm:mx-auto bg-white/90 backdrop-blur-xl rounded-3xl shadow-2xl p-8 sm:p-12 border border-blue-200">
            <div class="flex flex-col items-center mb-8">


                <svg class="size-20 fill-blue-900" viewBox="0 0 256 256">
                    <path
                        d="M198.1 62.59a76 76 0 0 0-140.2 0A71.71 71.71 0 0 0 16 127.8C15.9 166 48 199 86.14 200a72.09 72.09 0 0 0 33.86-7.53V232a8 8 0 0 0 16 0v-39.53a72.17 72.17 0 0 0 32 7.53h1.82c38.18-1 70.29-34 70.18-72.2a71.71 71.71 0 0 0-41.9-65.21ZM169.45 184A56.08 56.08 0 0 1 136 174v-41l43.58-21.78a8 8 0 1 0-7.16-14.32L136 115.06V88a8 8 0 0 0-16 0v51.06l-36.42-18.22a8 8 0 1 0-7.16 14.32L120 156.94v17a56 56 0 0 1-33.45 10c-29.65-.71-54.63-26.42-54.55-56.1A55.77 55.77 0 0 1 67.11 76a8 8 0 0 0 4.53-4.67 60 60 0 0 1 112.72 0 8 8 0 0 0 4.53 4.67A55.79 55.79 0 0 1 224 127.84c.08 29.68-24.9 55.39-54.55 56.16Z" />
                </svg>
                <h2 class="text-2xl font-bold text-blue-700 mb-1">{{ config('app.name') }} Login</h2>
            </div>
            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <div class="space-y-6">
                    <div>
                        <label for="email" class="block text-sm font-semibold text-blue-700 mb-1">E-Mail</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-blue-400">
                                <svg class="size-5 fill-blue-300" viewBox="0 0 256 256">
                                    <path
                                        d="M208 32H48a16 16 0 0 0-16 16v160a16 16 0 0 0 16 16h160a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16ZM96 120a32 32 0 1 1 32 32 32 32 0 0 1-32-32Zm-27.33 88a64.36 64.36 0 0 1 19.13-25.8 64 64 0 0 1 80.4 0 64.36 64.36 0 0 1 19.13 25.8ZM208 208h-3.67a79.9 79.9 0 0 0-46.68-50.29 48 48 0 1 0-59.3 0A79.9 79.9 0 0 0 51.67 208H48V48h160v160Z" />
                                </svg>
                            </span>
                            <input id="email" type="email" name="email" required autofocus
                                class="block w-full rounded-xl border border-blue-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 pl-10 h-14 text-lg bg-blue-50 placeholder-blue-300"
                                placeholder="name@domain.de" value="{{ old('email') }}">
                        </div>
                    </div>
                    <div>
                        <label for="password" class="block text-sm font-semibold text-blue-700 mb-1">Passwort</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-blue-400">
                                <svg class="size-5 fill-blue-300" viewBox="0 0 256 256">
                                    <path
                                        d="M128 112a28 28 0 0 0-8 54.83V184a8 8 0 0 0 16 0v-17.17a28 28 0 0 0-8-54.83Zm0 40a12 12 0 1 1 12-12 12 12 0 0 1-12 12Zm80-72h-32V56a48 48 0 0 0-96 0v24H48a16 16 0 0 0-16 16v112a16 16 0 0 0 16 16h160a16 16 0 0 0 16-16V96a16 16 0 0 0-16-16ZM96 56a32 32 0 0 1 64 0v24H96Zm112 152H48V96h160v112Z" />
                                </svg>
                            </span>
                            <input id="password" type="password" name="password" required
                                class="block w-full rounded-xl border border-blue-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 pl-10 h-14 text-lg bg-blue-50 placeholder-blue-300"
                                placeholder="••••••••" value="{{ old('password') }}">
                        </div>
                    </div>
                </div>
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input id="remember" name="remember" type="checkbox"
                            class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                        <label for="remember" class="ml-2 block text-sm text-gray-600">Angemeldet bleiben</label>
                    </div>
                    <a href="{{ route('password.request') }}" class="text-sm text-blue-600 hover:underline">Passwort
                        vergessen?</a>
                </div>
                <button type="submit"
                    class="w-full bg-gradient-to-r from-blue-600 to-blue-500 hover:from-blue-700 hover:to-blue-600 text-white px-6 py-3 rounded-xl font-semibold shadow-lg transition-all duration-200 flex items-center justify-center gap-2 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-2 disabled:opacity-60"
                    aria-label="Login">
                    <span>Login</span>
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                        aria-hidden="true">
                        <path d="M5 12h14M12 5l7 7-7 7" stroke="currentColor" stroke-width="2" fill="none" />
                    </svg>

                </button>
            </form>

        </div>
    </div>
@endsection
