@extends('layouts.app')

@section('content')
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-100/40 via-white/80 to-blue-300/30 text-blue-900">
        <div class="max-w-md w-full mx-4 sm:mx-auto bg-white/70 backdrop-blur-xl rounded-3xl shadow-2xl p-8 sm:p-12 border border-blue-100/30">
            <div class="flex flex-col items-center mb-8">
                <svg viewBox="0 0 102.05 102.05" class="size-14 fill-blue-600">
                    <path 
                        d="M51.02 0C22.85 0 0 22.88 0 51.11s20.6 48.78 46.8 50.94V82.53c0-.45-.18-.88-.5-1.19L28.01 63.01c-.32-.32-.49-.74-.49-1.19V48.29c-1.42-.7-2.39-2.16-2.39-3.85 0-2.37 1.92-4.3 4.29-4.3s4.28 1.93 4.28 4.3c0 1.47-.74 2.78-1.88 3.55v12.04c0 .45.17.88.49 1.19l11.61 11.63c1.06 1.07 2.88.31 2.88-1.19v-5.23c0-.29-.08-.59-.23-.85L39 52.44l-.29-.51c-.14-.26-.23-.55-.23-.85V31.14c-1.38-.71-2.31-2.15-2.31-3.81 0-2.37 1.92-4.29 4.28-4.29s4.29 1.92 4.29 4.29c0 1.51-.78 2.84-1.95 3.6v19.01c0 .29.08.58.23.84l6.57 11.41c.65 1.13 2.27 1.13 2.91 0l3.73-6.47c.14-.26.23-.55.23-.85V36.73c-1.27-.74-2.12-2.12-2.12-3.7 0-2.37 1.92-4.3 4.28-4.3s4.29 1.93 4.29 4.3c0 1.59-.87 2.98-2.15 3.72v19.28c0 .29-.08.59-.23.85l-.49.84-4.41 7.67c-.15.26-.23.54-.23.84v9.87c0 1.5 1.81 2.26 2.87 1.19l8.11-8.12c.32-.32.49-.75.49-1.19v-8.77c-1.27-.74-2.12-2.12-2.12-3.7 0-2.37 1.92-4.3 4.29-4.3s4.28 1.93 4.28 4.3c0 1.59-.87 2.98-2.15 3.72v10.54c0 .45-.17.87-.49 1.19l-14.8 14.83c-.32.32-.49.74-.49 1.19v15.06c26.13-2.23 46.64-24.17 46.64-50.92C102.05 22.88 79.2 0 51.02 0Zm-30.1 35.44c1.54 0 2.78 1.25 2.78 2.79s-1.24 2.79-2.78 2.79-2.77-1.25-2.77-2.79 1.24-2.79 2.77-2.79Zm-8.19 19.55c0-2.37 1.92-4.29 4.28-4.29s4.29 1.92 4.29 4.29-1.92 4.3-4.29 4.3-4.28-1.93-4.28-4.3Zm9.38 19.79c-1.54 0-2.78-1.25-2.78-2.79s1.24-2.78 2.78-2.78 2.78 1.25 2.78 2.78-1.24 2.79-2.78 2.79Zm5.35-43.4c-2.38 0-4.29-1.92-4.29-4.29s1.92-4.3 4.29-4.3 4.28 1.92 4.28 4.3-1.92 4.29-4.28 4.29Zm25.05-9.61c-2.38 0-4.29-1.93-4.29-4.3s1.92-4.3 4.29-4.3 4.28 1.93 4.28 4.3-1.92 4.3-4.28 4.3Zm9.28 2.09c0-1.54 1.24-2.79 2.78-2.79s2.77 1.25 2.77 2.79-1.24 2.78-2.77 2.78-2.78-1.25-2.78-2.78Zm15.81 1.86c2.37 0 4.29 1.93 4.29 4.3s-1.92 4.3-4.29 4.3-4.28-1.93-4.28-4.3 1.92-4.3 4.28-4.3Zm-5.19 17.36c0-1.54 1.24-2.79 2.77-2.79s2.78 1.25 2.78 2.79-1.24 2.78-2.78 2.78-2.77-1.25-2.77-2.78Zm10.16 25.73c-2.37 0-4.29-1.92-4.29-4.3s1.92-4.29 4.29-4.29 4.29 1.92 4.29 4.29-1.92 4.3-4.29 4.3Zm2.47-13.44c-2.37 0-4.29-1.93-4.29-4.3s1.92-4.29 4.29-4.29 4.28 1.92 4.28 4.29-1.92 4.3-4.28 4.3Z" />
                </svg>

                <svg viewBox="0 0 153.07 48.15" class="w-20 mt-2 fill-blue-500">
                    <path
                        d="M4.84 42.67v2.27c0 1.34-1.08 2.42-2.42 2.42-1.34 0-2.42-1.08-2.42-2.42V2.42C0 1.08 1.08 0 2.42 0c1.34 0 2.42 1.08 2.42 2.42v18.59h.12c2.54-4.26 6.23-6.4 11.09-6.4 4.08 0 7.29 1.44 9.64 4.31 2.35 2.87 3.52 6.71 3.52 11.5 0 5.4-1.33 9.7-3.97 12.9-2.65 3.2-6.2 4.8-10.64 4.8s-7.43-1.82-9.62-5.45h-.12Zm0-8.32c0 2.68.89 4.96 2.67 6.84 1.78 1.88 3.99 2.82 6.65 2.82 3.15 0 5.62-1.21 7.42-3.62 1.8-2.42 2.7-5.79 2.7-10.11 0-3.57-.85-6.4-2.54-8.47-1.7-2.07-3.95-3.11-6.78-3.11-2.96 0-5.39 1.06-7.28 3.17-1.89 2.11-2.83 4.75-2.83 7.92v4.57Zm29.36 10.6v-27.2c0-1.33 1.08-2.41 2.41-2.41s2.41 1.08 2.41 2.41v27.2c0 1.33-1.08 2.41-2.41 2.41s-2.41-1.08-2.41-2.41Zm30.8.2c0 1.23-.84 2.31-2.03 2.58-1.13.26-2.46.39-4 .39-6.56 0-9.84-3.47-9.84-10.42V24.45c0-1.46-1.19-2.65-2.65-2.65s-2.65-1.19-2.65-2.65v-1.16c0-1.46 1.19-2.65 2.65-2.65s2.65-1.19 2.65-2.65v-2.52c0-1.18.78-2.21 1.91-2.54l3.17-.92c1.7-.49 3.39.78 3.39 2.54v3.44c0 1.46 1.19 2.65 2.65 2.65h2.1c1.46 0 2.65 1.19 2.65 2.65v1.16c0 1.46-1.19 2.65-2.65 2.65h-2.1c-1.46 0-2.65 1.19-2.65 2.65v11.76c0 3.53 1.39 5.3 4.17 5.3.15 0 .3 0 .46-.02 1.51-.11 2.77 1.13 2.77 2.64v1.02Zm24.18-25.54c0 1.56-1.34 2.81-2.89 2.63-.39-.05-.8-.07-1.22-.07-2.13 0-3.84.87-5.12 2.6-1.28 1.74-1.92 4.07-1.92 6.99v12.95c0 1.46-1.18 2.64-2.64 2.64h-3.21c-1.46 0-2.64-1.18-2.64-2.64V17.99c0-1.46 1.18-2.64 2.64-2.64h3.21c1.46 0 2.64 1.18 2.64 2.64v3.51h.09c1.56-4.47 4.37-6.7 8.44-6.7h.03c1.44 0 2.58 1.2 2.58 2.64v2.17Zm28.12 14.14h-14.78c-2.21 0-3.62 2.38-2.55 4.32 1.42 2.56 4.13 3.84 8.12 3.84 2.02 0 3.92-.3 5.7-.91 1.87-.64 3.8.79 3.8 2.77 0 1.18-.71 2.23-1.8 2.69-2.66 1.13-5.86 1.69-9.62 1.69-4.97 0-8.85-1.44-11.62-4.32-2.77-2.88-4.16-6.91-4.16-12.09s1.49-9.2 4.46-12.38c2.97-3.18 6.69-4.77 11.16-4.77s7.95 1.37 10.45 4.11c2.5 2.74 3.75 6.51 3.75 11.3v.84c0 1.61-1.3 2.91-2.91 2.91Zm-8.41-5.58c1.96 0 3.41-1.92 2.78-3.78-.86-2.55-2.78-3.83-5.74-3.83-1.75 0-3.28.69-4.61 2.07-.32.33-.6.68-.86 1.06-1.3 1.9.15 4.48 2.45 4.48h5.99Zm41.27 5.58h-14.78c-2.21 0-3.62 2.38-2.55 4.32 1.42 2.56 4.13 3.84 8.12 3.84 2.02 0 3.92-.3 5.7-.91 1.87-.64 3.8.79 3.8 2.77 0 1.18-.71 2.23-1.8 2.69-2.66 1.13-5.86 1.69-9.62 1.69-4.97 0-8.85-1.44-11.62-4.32-2.77-2.88-4.16-6.91-4.16-12.09s1.49-9.2 4.46-12.38c2.97-3.18 6.69-4.77 11.16-4.77s7.95 1.37 10.45 4.11c2.5 2.74 3.75 6.51 3.75 11.3v.84c0 1.61-1.3 2.91-2.91 2.91Zm-8.41-5.58c1.96 0 3.41-1.92 2.78-3.78-.86-2.55-2.78-3.83-5.74-3.83-1.75 0-3.28.69-4.61 2.07-.32.33-.6.68-.86 1.06-1.3 1.9.15 4.48 2.45 4.48h5.99Z"
                         />
                </svg>
                <div class="flex items-center my-6 w-full">
                  <div class="flex-1 h-px bg-gradient-to-l from-blue-200 to-transparent"></div>
                  <h2 class="mx-4 text-lg text-blue-700/80 text-center font-bold">Registrieren bei {{ config('app.name') }}</h2>
                  <div class="flex-1 h-px bg-gradient-to-r from-blue-200 to-transparent"></div>
                </div>
            </div>
            <form method="POST" action="{{ route('register') }}" class="space-y-6">
                @csrf
                <div id="register-steps" class="space-y-6">
                    <!-- Step 1 -->
                    <div id="step-1">
                        <div class="mb-6">
                            <label for="username" class="block text-base font-semibold text-blue-700 mb-2">Benutzername</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-blue-400">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path d="M16 12a4 4 0 1 1-8 0 4 4 0 0 1 8 0Z" />
                                        <path d="M12 16v2m0 0h-4a4 4 0 0 1-4-4v-1a4 4 0 0 1 4-4h8a4 4 0 0 1 4 4v1a4 4 0 0 1-4 4h-4Z" />
                                    </svg>
                                </span>
                                <input id="username" type="text" name="username" required autofocus
                                    class="block w-full rounded-2xl border border-blue-100/30 shadow focus:border-blue-400 focus:ring-2 focus:ring-blue-400 pl-10 h-14 text-lg bg-white/80 placeholder-blue-300 transition-all duration-150"
                                    placeholder="deinname" value="{{ old('username') }}">
                            </div>
                            <div id="username-status" class="text-sm mt-2 min-h-[1.5em] transition-colors"></div>
                        </div>
                        <div class="mb-6">
                            <label for="email" class="block text-base font-semibold text-blue-700 mb-2">E-Mail</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-blue-400">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path d="M4 4h16v16H4V4Zm2 4h12v2H6V8Zm0 4h12v2H6v-2Zm0 4h12v2H6v-2Z" />
                                    </svg>
                                </span>
                                <input id="email" type="email" name="email" required
                                    class="block w-full rounded-2xl border border-blue-100/30 shadow focus:border-blue-400 focus:ring-2 focus:ring-blue-400 pl-10 h-14 text-lg bg-white/80 placeholder-blue-300 transition-all duration-150"
                                    placeholder="name@domain.de" value="{{ old('email') }}">
                            </div>
                            <div id="email-status" class="text-sm mt-2 min-h-[1.5em] transition-colors"></div>
                        </div>
                        <button type="button" id="next-1" class="mt-8 w-full bg-blue-400 text-white px-6 py-3 rounded-full font-semibold shadow-lg transition-all disabled:opacity-50" disabled>Weiter</button>
                    </div>
                    <!-- Step 2 -->
                    <div id="step-2" class="hidden">
                        <div class="mb-6">
                            <label for="password" class="block text-base font-semibold text-blue-700 mb-2">Passwort</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-blue-400">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path d="M12 17a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm6-7V7a6 6 0 0 0-12 0v3a2 2 0 0 0-2 2v7a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-7a2 2 0 0 0-2-2Zm-8-3a4 4 0 0 1 8 0v3H6V7Z" />
                                </span>
                                <input id="password" type="password" name="password" required
                                    class="block w-full rounded-2xl border border-blue-100/30 shadow focus:border-blue-400 focus:ring-2 focus:ring-blue-400 pl-10 h-14 text-lg bg-white/80 placeholder-blue-300 transition-all duration-150"
                                    placeholder="••••••••">
                            </div>
                        </div>
                        <div class="mb-6">
                            <label for="password_confirmation" class="block text-base font-semibold text-blue-700 mb-2">Passwort bestätigen</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-blue-400">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path d="M12 17a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm6-7V7a6 6 0 0 0-12 0v3a2 2 0 0 0-2 2v7a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-7a2 2 0 0 0-2-2Zm-8-3a4 4 0 0 1 8 0v3H6V7Z" />
                                    </svg>
                                </span>
                                <input id="password_confirmation" type="password" name="password_confirmation" required
                                    class="block w-full rounded-2xl border border-blue-100/30 shadow focus:border-blue-400 focus:ring-2 focus:ring-blue-400 pl-10 h-14 text-lg bg-white/80 placeholder-blue-300 transition-all duration-150"
                                    placeholder="••••••••">
                            </div>
                        </div>
                        <div class="flex gap-4 mt-8">
                            <button type="button" id="back-2" class="w-1/2 bg-blue-100 text-blue-700 px-6 py-3 rounded-full font-semibold shadow transition-all">Zurück</button>
                            <button type="button" id="next-2" class="w-1/2 bg-blue-400 text-white px-6 py-3 rounded-full font-semibold shadow-lg transition-all">Weiter</button>
                        </div>
                    </div>
                    <!-- Step 3 -->
                    <div id="step-3" class="hidden">
                        <div>
                            <label class="block text-sm font-semibold text-blue-700 mb-1">Zahlungsintervall</label>
                            <div class="flex gap-4 mt-2">
                                <label class="flex items-center gap-2 cursor-pointer">
                                    <input type="radio" name="plan" value="monthly" checked class="accent-blue-500" id="plan-monthly">
                                    <span class="text-blue-700">Monatlich</span>
                                </label>
                                <label class="flex items-center gap-2 cursor-pointer">
                                    <input type="radio" name="plan" value="yearly" class="accent-blue-500" id="plan-yearly">
                                    <span class="text-blue-700">Jährlich</span>
                                </label>
                            </div>
                            <div id="plan-price" class="mt-3 text-blue-700 font-bold text-lg text-center bg-blue-50 rounded-xl py-2 shadow">5,90€ / Monat</div>
                        </div>
                        <div class="flex gap-4 mt-8">
                            <button type="button" id="back-3" class="w-1/2 bg-blue-100 text-blue-700 px-6 py-3 rounded-full font-semibold shadow transition-all">Zurück</button>
                            <button type="submit" class="w-1/2 bg-gradient-to-r from-blue-400 to-blue-500 hover:from-blue-500 hover:to-blue-600 text-white px-6 py-3 rounded-full font-semibold shadow-lg transition-all duration-200 flex items-center justify-center gap-2 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-2 disabled:opacity-60" aria-label="Registrieren">
                                <span>Registrieren</span>
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true">
                                    <path d="M5 12h14M12 5l7 7-7 7" stroke="currentColor" stroke-width="2" fill="none" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Step navigation
            const step1 = document.getElementById('step-1');
            const step2 = document.getElementById('step-2');
            const step3 = document.getElementById('step-3');
            const next1 = document.getElementById('next-1');
            const next2 = document.getElementById('next-2');
            // Username live validation
            const usernameInput = document.getElementById('username');
            const usernameStatus = document.getElementById('username-status');
            let usernameValid = false;
            let usernameAvailable = false;
            if (usernameInput) {
                usernameInput.addEventListener('input', function() {
                    const val = usernameInput.value.trim();
                    if (!val) {
                        usernameStatus.textContent = '';
                        usernameStatus.className = 'text-sm mt-2 min-h-[1.5em]';
                        usernameValid = false;
                        usernameAvailable = false;
                        updateNext1();
                        return;
                    }
                    fetch('/validate-username', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-Requested-With': 'XMLHttpRequest',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || ''
                        },
                        body: JSON.stringify({ username: val })
                    })
                    .then(r => r.json())
                    .then(data => {
                        usernameStatus.textContent = data.message;
                        if (data.valid) {
                            usernameStatus.className = 'text-sm mt-2 text-emerald-400';
                            usernameValid = true;
                            usernameAvailable = true;
                        } else {
                            usernameStatus.className = 'text-sm mt-2 text-rose-400';
                            usernameValid = false;
                            usernameAvailable = false;
                        }
                        updateNext1();
                    })
                    .catch(() => {
                        usernameStatus.textContent = 'Fehler bei der Prüfung.';
                        usernameStatus.className = 'text-sm mt-2 text-rose-400';
                        usernameValid = false;
                        usernameAvailable = false;
                        updateNext1();
                    });
                });
            }
            // Email live validation
            const emailInput = document.getElementById('email');
            let emailValid = false;
            let emailAvailable = false;
            if (emailInput) {
                emailInput.addEventListener('input', function() {
                    const email = emailInput.value.trim();
                    emailValid = /^[^@\s]+@[^@\s]+\.[^@\s]+$/.test(email);
                    if (!emailValid) {
                        setEmailStatus('Bitte gültige E-Mail eingeben.', 'text-rose-400');
                        emailAvailable = false;
                        updateNext1();
                        return;
                    }
                    const formData = new URLSearchParams();
                    formData.append('email', email);
                    fetch('/validate-email', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded',
                            'X-Requested-With': 'XMLHttpRequest',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || ''
                        },
                        body: formData.toString()
                    })
                    .then(r => r.json())
                    .then(data => {
                        setEmailStatus(data.message, data.valid ? 'text-emerald-400' : 'text-rose-400');
                        emailAvailable = data.valid;
                        updateNext1();
                    })
                    .catch(() => {
                        setEmailStatus('Fehler bei der Prüfung.', 'text-rose-400');
                        emailAvailable = false;
                        updateNext1();
                    });
                });
            }
            function setEmailStatus(msg, color) {
                let status = document.getElementById('email-status');
                if (!status && emailInput) {
                    status = document.createElement('div');
                    status.id = 'email-status';
                    status.className = 'text-sm mt-2 min-h-[1.5em] transition-colors';
                    emailInput.parentNode.parentNode.appendChild(status);
                }
                if (status) {
                    status.textContent = msg;
                    status.className = 'text-sm mt-2 min-h-[1.5em] transition-colors ' + color;
                }
            }
            function updateNext1() {
                if (next1) {
                    next1.disabled = !(emailValid && emailAvailable && usernameValid && usernameAvailable);
                }
            }
            // Password validation
            const passwordInput = document.getElementById('password');
            const passwordConfirmInput = document.getElementById('password_confirmation');
            let passwordValid = false;
            let passwordMatch = false;
            function validatePassword() {
                const pw = passwordInput ? passwordInput.value : '';
                const pwc = passwordConfirmInput ? passwordConfirmInput.value : '';
                passwordValid = pw.length >= 8;
                passwordMatch = pw && pwc && pw === pwc;
                let msg = '';
                let color = '';
                if (!passwordValid && pw) {
                    msg = 'Mindestens 8 Zeichen.';
                    color = 'text-rose-400';
                } else if (pw && pwc && !passwordMatch) {
                    msg = 'Passwörter stimmen nicht überein.';
                    color = 'text-rose-400';
                } else if (passwordValid && passwordMatch) {
                    msg = 'Passwort ist gültig.';
                    color = 'text-emerald-400';
                }
                let status = document.getElementById('password-status');
                if (!status && passwordInput) {
                    status = document.createElement('div');
                    status.id = 'password-status';
                    status.className = 'text-sm mt-2 min-h-[1.5em] transition-colors';
                    passwordInput.parentNode.parentNode.appendChild(status);
                }
                if (status) {
                    status.textContent = msg;
                    status.className = 'text-sm mt-2 min-h-[1.5em] transition-colors ' + color;
                }
                if (next2) {
                    next2.disabled = !(passwordValid && passwordMatch);
                }
            }
            if (passwordInput) passwordInput.addEventListener('input', validatePassword);
            if (passwordConfirmInput) passwordConfirmInput.addEventListener('input', validatePassword);
            if (next2) next2.disabled = true;
            // Step navigation
            if (next1) next1.onclick = function() {
                if (step1 && step2) {
                    step1.classList.add('hidden');
                    step2.classList.remove('hidden');
                }
            };
            const back2 = document.getElementById('back-2');
            if (back2 && step1 && step2) back2.onclick = function() {
                step2.classList.add('hidden');
                step1.classList.remove('hidden');
            };
            if (next2) next2.onclick = function() {
                if (step2 && step3) {
                    step2.classList.add('hidden');
                    step3.classList.remove('hidden');
                }
            };
            const back3 = document.getElementById('back-3');
            if (back3 && step2 && step3) back3.onclick = function() {
                step3.classList.add('hidden');
                step2.classList.remove('hidden');
            };
            // Preis dynamisch
            const monthly = document.getElementById('plan-monthly');
            const yearly = document.getElementById('plan-yearly');
            const price = document.getElementById('plan-price');
            function updatePrice() {
                if (yearly && yearly.checked) {
                    price.textContent = '59€ / Jahr';
                } else if (monthly) {
                    price.textContent = '5,90€ / Monat';
                }
            }
            if (monthly) monthly.addEventListener('change', updatePrice);
            if (yearly) yearly.addEventListener('change', updatePrice);
        });
    </script>
@endsection
