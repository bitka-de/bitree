<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Bitree') }}</title>
    @vite('resources/css/app.css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body class="min-h-screen bg-gray-50 flex flex-col md:flex-row overflow-x-hidden">


    <x-admin.sidebar />

        <main class="flex-1 p-4 md:p-10 max-w-7xl mx-auto max-h-screen overflow-y-auto overflow-x-clip">

        @yield('content')
    </main>

</body>

</html>
