@extends('layouts.app')

@section('content')
    <div
        class="min-h-screen flex items-center py-12 justify-center bg-gradient-to-br from-blue-200 via-white to-blue-400 text-gray-900">
        <div
            class="max-w-lg w-full mx-4 sm:mx-auto bg-white/80 backdrop-blur-2xl rounded-3xl shadow-2xl p-10 sm:p-14 border border-blue-300 ring-2 ring-blue-100">
            <div class="flex flex-col items-center mb-8">
                <div class="relative group">
                    <img id="profileImagePreview"
                        src="{{ Auth::user()->user_image ? asset(Auth::user()->user_image) : 'https://ui-avatars.com/api/?name=' . Auth::user()->first_name }}"
                        class="w-32 h-32 rounded-full border-4 border-blue-400 shadow-xl object-cover cursor-pointer transition-transform duration-300 hover:ring-4 hover:ring-blue-300"
                        alt="Profilbild"
                        onclick="document.getElementById('userImageInput').click()">
                    <div class="absolute bottom-2 right-2 flex gap-2 opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                        <button type="button"
                            class="bg-blue-600 hover:bg-blue-700 text-white rounded-full p-2 shadow-lg flex items-center"
                            onclick="document.getElementById('userImageInput').click()"
                            title="Bild ändern">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15.232 5.232l3.536 3.536M9 13l6-6m2 2a2.828 2.828 0 11-4-4 2.828 2.828 0 014 4z" />
                            </svg>
                        </button>
                        <button type="button" id="removeImageBtn"
                            class="bg-red-600 hover:bg-red-700 text-white rounded-full p-2 shadow-lg flex items-center"
                            onclick="removeImage()" title="Bild entfernen">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
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
            <h2 class="text-3xl font-extrabold text-blue-700 mb-8 text-center tracking-tight drop-shadow">Profil bearbeiten
            </h2>
            <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="space-y-7">
                @csrf
                @method('PUT')
                <div class="flex sm:flex-row flex-col gap-4">
                    <div>
                        <label for="first_name" class="block text-sm font-semibold text-blue-700 mb-1">Vorname</label>
                        <input id="first_name" type="text" name="first_name"
                            value="{{ old('first_name', Auth::user()->first_name) }}" required
                            class="mt-1 block w-full rounded-xl border-blue-300 shadow focus:border-blue-500 focus:ring-blue-500 bg-blue-50/50 px-4 py-2 transition-all duration-150">
                    </div>
                    <div>
                        <label for="last_name" class="block text-sm font-semibold text-blue-700 mb-1">Nachname</label>
                        <input id="last_name" type="text" name="last_name"
                            value="{{ old('last_name', Auth::user()->last_name) }}" required
                            class="mt-1 block w-full rounded-xl border-blue-300 shadow focus:border-blue-500 focus:ring-blue-500 bg-blue-50/50 px-4 py-2 transition-all duration-150">
                    </div>
                </div>
                <div>
                    <label for="username" class="block text-sm font-semibold text-blue-700 mb-1">Benutzername</label>
                    <input id="username" type="text" name="username"
                        value="{{ old('username', Auth::user()->username) }}" required
                        class="mt-1 block w-full rounded-xl border-blue-300 shadow focus:border-blue-500 focus:ring-blue-500 bg-blue-50/50 px-4 py-2 transition-all duration-150">
                </div>
                <div>
                    <label for="email" class="block text-sm font-semibold text-blue-700 mb-1">E-Mail</label>
                    <input id="email" type="email" name="email"
                        value="{{ old('email', Auth::user()->email) }}" required
                        class="mt-1 block w-full rounded-xl border-blue-300 shadow focus:border-blue-500 focus:ring-blue-500 bg-blue-50/50 px-4 py-2 transition-all duration-150">
                </div>
                <div>
                    <label for="current_password" class="block text-sm font-semibold text-blue-700 mb-1">Aktuelles Passwort</label>
                    <input id="current_password" type="password" name="current_password"
                        class="mt-1 block w-full rounded-xl border-blue-300 shadow focus:border-blue-500 focus:ring-blue-500 bg-blue-50/50 px-4 py-2 transition-all duration-150" autocomplete="current-password" placeholder="Nur erforderlich, wenn du das Passwort änderst">
                </div>
                <div>
                    <label for="password" class="block text-sm font-semibold text-blue-700 mb-1">Neues Passwort</label>
                    <input id="password" type="password" name="password"
                        class="mt-1 block w-full rounded-xl border-blue-300 shadow focus:border-blue-500 focus:ring-blue-500 bg-blue-50/50 px-4 py-2 transition-all duration-150" autocomplete="new-password" placeholder="Nur ausfüllen, wenn du das Passwort ändern möchtest">
                </div>
                <button type="submit"
                    class="w-full bg-gradient-to-r from-blue-600 to-blue-400 hover:from-blue-700 hover:to-blue-500 text-white px-8 py-3 rounded-xl font-bold shadow-lg transition-all duration-200 tracking-wide">Profil
                    speichern</button>
            </form>
        </div>
    </div>
@endsection
