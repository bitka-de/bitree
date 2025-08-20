@extends('layouts.user')

@section('content')
    <!-- Main Content -->
    <x-admin.header title="Dashboard" />


    <div class="grid col-span-2 md:grid-cols-4 gap-6 mb-8">


        <div class=" col-span-2 md:col-span-4 bg-brand-900 text-white shadow-lg rounded-2xl p-6 space-y-4">
            <div class="space-y-2">
                @php
                    $hour = now()->hour;
                    if ($hour < 12) {
                        $greeting = 'Moin Moin';
                    } elseif ($hour < 18) {
                        $greeting = 'Hallo';
                    } else {
                        $greeting = 'Guten Abend';
                    }
                @endphp
                <h2 class="text-2xl font-bold">
                    {{ $greeting }}, {{ Auth::user()->username }} 👋
                </h2>
                <p class="text-gray-300 text-sm">
                    Schön, dich wiederzusehen!<br>Hier findest du deine aktuellen Zahlen und Insights auf einen Blick.
                </p>
            </div>
            <div class="flex items-center gap-4">
                <button class="bg-brand-600 hover:bg-brand-500 text-white px-4 py-2 rounded-xl font-medium shadow">
                    Dashboard öffnen
                </button>
                <button
                    class="bg-gray-800 hover:bg-brand-700 text-gray-200 px-4 py-2 rounded-xl font-medium border border-brand-700">
                    Profil bearbeiten
                </button>
            </div>
        </div>



        <div class="bg-white shadow rounded-2xl p-6 space-y-4 col-span-2">
            <!-- Stats -->
            <div class="grid grid-cols-2 gap-4 text-center">
                <div class="p-4 rounded-xl bg-gray-50">
                    <p class="text-sm text-gray-500">Profilaufrufe</p>
                    <p class="text-2xl font-bold text-gray-900">1.245</p>
                </div>
                <div class="p-4 rounded-xl bg-gray-50">
                    <p class="text-sm text-gray-500">Link-Klicks</p>
                    <p class="text-2xl font-bold text-gray-900">367</p>
                </div>
            </div>

            <!-- Hinweis -->
            <div class="p-4 rounded-xl bg-yellow-50 border border-yellow-200">
                <p class="text-sm text-gray-700">
                    Am häufigsten geklickt:
                    <a href="#" class="font-medium text-yellow-700 hover:underline">
                        www.deinlink.de
                    </a>
                </p>
            </div>
        </div>


        <div class="bg-white shadow rounded-2xl p-6 space-y-4 col-span-2">
            <!-- Stats -->
            <div class="grid grid-cols-2 gap-4 text-center">
                <div class="p-4 rounded-xl bg-gray-50">
                    <p class="text-sm text-gray-500">Umsatz gesamt</p>
                    <p class="text-2xl font-bold text-gray-900">12.450 €</p>
                </div>
                <div class="p-4 rounded-xl bg-gray-50">
                    <p class="text-sm text-gray-500">Bestellungen</p>
                    <p class="text-2xl font-bold text-gray-900">329</p>
                </div>
            </div>

            <!-- Hinweis -->
            <div class="p-4 rounded-xl bg-green-50 border border-green-200">
                <p class="text-sm text-gray-700">
                    Bestseller:
                    <span class="font-medium text-green-700">Premium Hundefutter 10kg</span>
                </p>
            </div>
        </div>


        <div class="bg-white shadow rounded-2xl p-6 space-y-4 col-span-2">
            <!-- Stats -->
            <div class="grid grid-cols-2 gap-4 text-center">
                <div class="p-4 rounded-xl bg-gray-50">
                    <p class="text-sm text-gray-500">Einladungen gesendet</p>
                    <p class="text-2xl font-bold text-gray-900">48</p>
                </div>
                <div class="p-4 rounded-xl bg-gray-50">
                    <p class="text-sm text-gray-500">Gefolgt</p>
                    <p class="text-2xl font-bold text-gray-900">17</p>
                </div>
            </div>

            <!-- Hinweis -->
            <div class="p-4 rounded-xl bg-blue-50 border border-blue-200">
                <p class="text-sm text-gray-700">
                    Erfolgsquote: <span class="font-medium text-blue-700">35%</span>
                </p>
            </div>
        </div>


        <div class="bg-white shadow rounded-2xl p-6 space-y-4 col-span-2">
            <!-- Stats -->
            <div class="grid grid-cols-2 gap-4 text-center">
                <!-- Partner -->
                <div class="p-4 rounded-xl bg-gray-50">
                    <p class="text-sm text-gray-500">Partner verlinkt</p>
                    <p class="text-2xl font-bold text-gray-900 flex items-center justify-center gap-2">
                        12
                        <span
                            class="text-green-600 bg-green-100 p-0.5 px-2 rounded-full text-xs font-medium flex items-center"
                            style="font-size: 0.75rem;">
                            ↑ 11,01%
                        </span>
                    </p>
                </div>
                <!-- Produkte -->
                <div class="p-4 rounded-xl bg-gray-50">
                    <p class="text-sm text-gray-500">Produkte im Angebot</p>
                    <p class="text-2xl font-bold text-gray-900 flex items-center justify-center gap-2">
                        85
                        <span class="text-red-600 bg-red-100 p-0.5 px-2 rounded-full text-xs font-medium flex items-center"
                            style="font-size: 0.75rem;">
                            ↓ 9,05%
                        </span>

                        <span
                            class="text-gray-600 bg-gray-100 p-0.5 px-2 rounded-full text-xs font-medium flex items-center"
                            style="font-size: 0.75rem;">
                            → 0,00%
                        </span>
                    </p>
                </div>
            </div>

            <!-- Hinweis -->
            <div class="p-4 rounded-xl bg-purple-50 border border-purple-200">
                <p class="text-sm text-gray-700">
                    Aktivste Partnerschaft:
                    <span class="font-medium text-purple-700">ShopXYZ</span>
                </p>
            </div>
        </div>




        <div class="bg-white shadow rounded-2xl p-6 space-y-4 col-span-2">
            <h3 class="text-lg font-semibold text-gray-900">Letzte Ereignisse</h3>

            <ul class="space-y-3">
                <li class="flex items-start gap-3">
                    <span class="w-2 h-2 mt-2 bg-green-500 rounded-full"></span>
                    <div>
                        <p class="text-sm font-medium text-gray-800">Neue Bestellung</p>
                        <p class="text-xs text-gray-500">vor 2 Stunden</p>
                    </div>
                </li>
                <li class="flex items-start gap-3">
                    <span class="w-2 h-2 mt-2 bg-blue-500 rounded-full"></span>
                    <div>
                        <p class="text-sm font-medium text-gray-800">3 neue Profilaufrufe</p>
                        <p class="text-xs text-gray-500">gestern</p>
                    </div>
                </li>
                <li class="flex items-start gap-3">
                    <span class="w-2 h-2 mt-2 bg-yellow-500 rounded-full"></span>
                    <div>
                        <p class="text-sm font-medium text-gray-800">Bestseller geändert</p>
                        <p class="text-xs text-gray-500">vor 3 Tagen</p>
                    </div>
                </li>
            </ul>
        </div>



        <div class="bg-white shadow rounded-2xl p-6 space-y-4 col-span-2">
            <!-- Header -->
            <h3 class="text-lg font-semibold text-gray-900">Newsletter Abonnenten</h3>

            <!-- KPI -->
            <div class="p-4 rounded-xl bg-gray-50 text-center">
                <p class="text-sm text-gray-500">Gesamt</p>
                <p class="text-2xl font-bold text-gray-900 flex items-center justify-center gap-2">
                    1.248
                    <span class="text-green-600 bg-green-100 px-2 py-0.5 rounded-full text-xs font-medium">
                        ↑ 3,2%
                    </span>
                </p>
            </div>

            <!-- Liste letzter Abonnenten -->
            <ul class="space-y-3">
                <li class="flex items-start gap-3">
                    <span class="w-2 h-2 mt-2 bg-green-500 rounded-full"></span>
                    <div>
                        <p class="text-sm font-medium text-gray-800">anna.muster@example.com</p>
                        <p class="text-xs text-gray-500">vor 1 Stunde</p>
                    </div>
                </li>
                <li class="flex items-start gap-3">
                    <span class="w-2 h-2 mt-2 bg-green-500 rounded-full"></span>
                    <div>
                        <p class="text-sm font-medium text-gray-800">peter.beispiel@example.com</p>
                        <p class="text-xs text-gray-500">gestern</p>
                    </div>
                </li>
                <li class="flex items-start gap-3">
                    <span class="w-2 h-2 mt-2 bg-green-500 rounded-full"></span>
                    <div>
                        <p class="text-sm font-medium text-gray-800">lisa@testmail.de</p>
                        <p class="text-xs text-gray-500">vor 3 Tagen</p>
                    </div>
                </li>
            </ul>
        </div>
    @endsection
