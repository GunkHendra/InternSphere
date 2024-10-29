<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'Pendataan Warga') }}</title>
        <link rel="icon" type="image/x-icon" href="/assets/Logo.png">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
        @vite('resources/css/app.css')
    </head>
    <body class="bg-white font-poppins w-full h-full flex min-h-screen">
      <div class="bg-gray-700 basis-1/2 flex justify-center items-center">
          <img src="/assets/illustration/Asset 1.png" alt="Illustrasi" class="w-1/2 h-1/2">
      </div>
      <div class="basis-1/2 min-h-[80vh] flex flex-col space-y-4 items-center justify-center">
          @if (session()->has('success'))
            <div class="bg-white w-full max-w-lg rounded-lg shadow-lg p-6">
              {{ session('success') }}
            </div>
          @endif
          <div class="bg-white w-full max-w-lg rounded-lg shadow-lg p-6">
            <div class="flex flex-col justify-center items-center space-y-3">
                <img class="h-32 w-32 border-4 border-gray-500 rounded-full" src="/assets/illustration/profil.jpg" alt="">
                <h2 class="text-4xl font-bold text-center text-gray-700 mb-6">WELCOME</h2>
            </div>
          {{-- <h2 class="text-2xl font-bold text-center text-gray-700 mb-6">Login</h2> --}}
          <form action="/login" method="POST">
            @csrf
            <div class="mb-6">
              <label for="email" class="text-sm font-medium text-gray-700">Email</label>
              <input name="email" type="email" id="email" class="w-full px-4 py-2 border border-gray-300 rounded-lg" placeholder="Enter your email" value="{{ old('email') }}" autofocus required>
              @error('email')
                  <small class="text-red-400">{{ $message }}</small>
              @enderror
            </div>
            <div class="mb-6">
              <label for="password" class="text-sm font-medium text-gray-700">Password</label>
              <input name="password" type="password" id="password" class="w-full px-4 py-2 border border-gray-300 rounded-lg" placeholder="Enter your password" required>
              @error('password')
                  <small class="text-red-400">{{ $message }}</small>
              @enderror
            </div>
            <input type="submit" class="w-full bg-slate-500 hover:bg-slate-600 text-white font-semibold py-2 px-4 rounded-lg" value="Login"></input>
          </form>
          <small>Not registered? <a href="/register" class="text-blue-500">Let's register!</a></small>
        </div>
      </div>
    </body>
</html>