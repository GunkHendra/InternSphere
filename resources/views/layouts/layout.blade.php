<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'InternSphere') }} | {{ $title }}</title>
        <link rel="icon" type="image/x-icon" href="/assets/Logo.png">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
        @vite('resources/css/app.css')
    </head>
    <body class="bg-gray-100 font-poppins pt-20 w-full h-full flex flex-col min-h-screen">
        @include('partials/navbar')

        <div class="mb-6">
            @yield('content')
        </div>

        @if (!request()->is('login') && !request()->is('register') && !request()->is('profile') && !request()->is('edit_profile'))
        <div class="mt-auto">
            @include('partials/footer')
        </div>
        @endif
    </body>
</html>
