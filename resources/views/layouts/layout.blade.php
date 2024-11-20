<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'InternSphere') }} | {{ $title }}</title>
        <link rel="icon" type="image/x-icon" href="/assets/Logo.png">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        @vite('resources/css/app.css')
    </head>
    <body class="bg-gray-50 font-poppins pt-20 w-full h-full flex flex-col min-h-screen overflow-x-hidden">
        @include('partials/navbar')

        <div class="flex-grow mb-6">
            @yield('content')
        </div>

        @if (!request()->is('login') && !request()->is('register') && !request()->is('profile') && !request()->is('edit_profile'))
        <div class="mt-auto">
            @include('partials/footer')
        </div>
        @endif
    </body>
</html>
