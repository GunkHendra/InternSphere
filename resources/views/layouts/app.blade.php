<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{config('app.name', 'InternSphere')}}</title>
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        @vite('resources/css/app.css')
    </head>
    <body>
        @include('decor/navbar')
        <div class="container">
            @yield('content')
        </div>
    </body>
</html>
