@extends('layouts.user')

@section('content')

            <div
                class="absolute top-2 right-2 flex gap-2  group-hover:opacity-100 transition-opacity duration-200
                        sm:flex-row flex-col sm:static sm:opacity-100 sm:group-hover:opacity-100 sm:bottom-auto sm:right-auto">
                <button type="button"
                    class="bg-brand-600 hover:bg-brand-700 text-white rounded-full p-2 shadow-lg flex items-center justify-center"
                    onclick="document.getElementById('userImageInput').click()" title="Bild ändern" aria-label="Bild ändern">
                    <svg viewBox="0 0 256 256" class="h-4 w-4 fill-white">
                        <path
                            d="M224 144v64a8 8 0 0 1-8 8H40a8 8 0 0 1-8-8v-64a8 8 0 0 1 16 0v56h160v-56a8 8 0 0 1 16 0ZM93.66 77.66 120 51.31V144a8 8 0 0 0 16 0V51.31l26.34 26.35a8 8 0 0 0 11.32-11.32l-40-40a8 8 0 0 0-11.32 0l-40 40a8 8 0 0 0 11.32 11.32Z" />
                    </svg>
                </button>
                <button type="button" id="removeImageBtn"
                    class="bg-red-600 hover:bg-red-700 text-white rounded-full p-2 shadow-lg flex items-center justify-center hidden"
                    onclick="removeImage()" title="Bild entfernen" aria-label="Bild entfernen">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="space-y-7">
                @csrf
                @method('PUT')
                <div class="flex flex-col items-center -mt-12 mb-6">
                    <div class="relative group">
                        <img id="profileImagePreview"
                            src="{{ Auth::user()->user_image ? asset(Auth::user()->user_image) : 'https://ui-avatars.com/api/?name=' . Auth::user()->first_name }}"
                            class="size-40 rounded-xl border-4 border-brand-400 shadow-xl object-cover cursor-pointer transition-transform duration-300 hover:ring-4 hover:ring-brand-300"
                            alt="Profilbild" onclick="document.getElementById('userImageInput').click()">
                    </div>

                    <input type="file" name="user_image" id="userImageInput" accept="image/*" class="hidden"
                        onchange="previewImage(event)">
                    <input type="hidden" name="remove_image" id="removeImageInput" value="0">
                    <script>
                        let originalImage = document.getElementById('profileImagePreview').src;

                        function previewImage(event) {
                            const input = event.target;
                            if (input.files && input.files[0]) {
                                const reader = new FileReader();
                                reader.onload = function(e) {
                                    document.getElementById('profileImagePreview').src = e.target.result;
                                    document.getElementById('removeImageBtn').classList.remove('hidden');
                                }
                                reader.readAsDataURL(input.files[0]);
                            }
                        }

                        function removeImage() {
                            document.getElementById('profileImagePreview').src = originalImage;
                            document.getElementById('userImageInput').value = '';
                            document.getElementById('removeImageBtn').classList.add('hidden');
                            document.getElementById('removeImageInput').value = '1';
                        }
                    </script>
                </div>
                <h2 class="text-3xl font-extrabold text-brand-700 mb-8 text-center tracking-tight drop-shadow">Profil
                    bearbeiten
                </h2>

                <div class="flex sm:flex-row flex-col gap-4">
                    <div>
                        <label for="first_name" class="block text-sm font-semibold text-brand-700 mb-1">Vorname</label>
                        <input id="first_name" type="text" name="first_name"
                            value="{{ old('first_name', Auth::user()->first_name) }}" required
                            class="mt-1 block w-full rounded-xl border-brand-300 shadow focus:border-brand-500 focus:ring-brand-500 bg-brand-50/50 px-4 py-2 transition-all duration-150">
                    </div>
                    <div>
                        <label for="last_name" class="block text-sm font-semibold text-brand-700 mb-1">Nachname</label>
                        <input id="last_name" type="text" name="last_name"
                            value="{{ old('last_name', Auth::user()->last_name) }}" required
                            class="mt-1 block w-full rounded-xl border-brand-300 shadow focus:border-brand-500 focus:ring-brand-500 bg-brand-50/50 px-4 py-2 transition-all duration-150">
                    </div>
                </div>
                <div>
                    <label for="username" class="block text-sm font-semibold text-brand-700 mb-1">Benutzername</label>
                    <div
                        class="flex items-center rounded-xl border border-brand-300 bg-brand-50/50 shadow focus-within:border-brand-500 focus-within:ring-2 focus-within:ring-brand-500 transition-all duration-150">
                        <span class="pl-4 py-2 text-gray-500 select-none rounded-l-xl border-r border-brand-200">
                            {{ preg_replace('/^https?:\/\//', '', config('app.url')) }}/@
                        </span>
                        <input id="username" type="text" name="username"
                            value="{{ old('username', Auth::user()->username) }}" required
                            class="block w-full rounded-r-xl bg-transparent border-none focus:ring-0 pl-2 pr-4 py-2 text-gray-900">
                    </div>
                </div>
                <div>
                    <label for="email" class="block text-sm font-semibold text-brand-700 mb-1">E-Mail</label>
                    <input id="email" type="email" name="email" value="{{ old('email', Auth::user()->email) }}"
                        required
                        class="mt-1 block w-full rounded-xl border-brand-300 shadow focus:border-brand-500 focus:ring-brand-500 bg-brand-50/50 px-4 py-2 transition-all duration-150">
                </div>
                <div>
                    <label for="current_password" class="block text-sm font-semibold text-brand-700 mb-1">Aktuelles
                        Passwort</label>
                    <input id="current_password" type="password" name="current_password"
                        class="mt-1 block w-full rounded-xl border-brand-300 shadow focus:border-brand-500 focus:ring-brand-500 bg-brand-50/50 px-4 py-2 transition-all duration-150"
                        autocomplete="current-password" placeholder="Nur erforderlich, wenn du das Passwort änderst">
                </div>
                <div>
                    <label for="password" class="block text-sm font-semibold text-brand-700 mb-1">Neues Passwort</label>
                    <input id="password" type="password" name="password"
                        class="mt-1 block w-full rounded-xl border-brand-300 shadow focus:border-brand-500 focus:ring-brand-500 bg-brand-50/50 px-4 py-2 transition-all duration-150"
                        autocomplete="new-password" placeholder="Nur ausfüllen, wenn du das Passwort ändern möchtest">
                </div>
                <button type="submit"
                    class="w-full bg-gradient-to-r from-brand-600 to-brand-400 hover:from-brand-700 hover:to-brand-500 text-white px-8 py-3 rounded-xl font-bold shadow-lg transition-all duration-200 tracking-wide">Profil
                    speichern</button>
            </form>

@endsection
