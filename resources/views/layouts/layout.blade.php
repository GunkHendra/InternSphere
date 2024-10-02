<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'InternSphere') }} | {{ $title }}</title>
        <link rel="icon" type="image/x-icon" href="assets/Logo.png">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
        @vite('resources/css/app.css')
    </head>
    <body class="bg-gray-100 font-poppins pt-20 w-full h-full">
        @include('layouts/navbar')
        <div class="px-6">
            @yield('content')
        </div>
        <div class="mt-2">
            @include('layouts/footer')
        </div>
    </body>
</html>
