@extends('layouts.app')

@section('content')
	<div class="max-w-lg mx-auto mt-20 p-10 bg-white/40 backdrop-blur-lg rounded-3xl shadow-2xl text-center border border-blue-100 animate-fade-in">
		<div class="flex justify-center mb-6">
<img src="{{ asset('img/user-not-found.gif') }}" alt="">
		</div>
		<h2 class="text-3xl font-extrabold text-blue-700 mb-3 drop-shadow">User nicht gefunden</h2>
		<p class="text-blue-500 text-lg mb-8 leading-relaxed">Der aufgerufene Benutzer existiert nicht.<br>Vielleicht möchtest du einen eigenen Account anlegen?</p>
		<div class="flex flex-col gap-4 items-center">
			<a href="/" class="inline-block px-8 py-3 rounded-full bg-gradient-to-r from-blue-500 to-blue-400 text-white font-semibold shadow-lg hover:scale-105 hover:from-blue-600 hover:to-blue-500 transition-all duration-200">Zur Startseite</a>
			<a href="/register" class="inline-block px-8 py-3 rounded-full bg-gradient-to-r from-green-500 to-green-400 text-white font-semibold shadow-lg hover:scale-105 hover:from-green-600 hover:to-green-500 transition-all duration-200">Jetzt registrieren</a>
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
@endsection
