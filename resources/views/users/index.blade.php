@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50 p-8">
    <div class="max-w-4xl mx-auto bg-white rounded-2xl shadow p-8">
        <h1 class="text-2xl font-bold text-blue-700 mb-6">Alle User</h1>
        <table class="w-full table-auto border-collapse">
            <thead>
                <tr class="bg-blue-100 text-blue-700">
                    <th class="px-4 py-2 text-left">ID</th>
                    <th class="px-4 py-2 text-left">Benutzername</th>
                    <th class="px-4 py-2 text-left">E-Mail</th>
                    <th class="px-4 py-2 text-left">Vorname</th>
                    <th class="px-4 py-2 text-left">Nachname</th>
                    <th class="px-4 py-2 text-left">Rolle</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr class="border-b">
                        <td class="px-4 py-2">{{ $user->id }}</td>
                        <td class="px-4 py-2">{{ $user->username }}</td>
                        <td class="px-4 py-2">{{ $user->email }}</td>
                        <td class="px-4 py-2">{{ $user->first_name }}</td>
                        <td class="px-4 py-2">{{ $user->last_name }}</td>
                        <td class="px-4 py-2">{{ $user->role }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
