@php
    $addon = ['st', 'nd', 'rd', 'th'];
@endphp

@extends('layouts/layout')

@section('content')
<div class="min-h-[80vh] flex items-center justify-center">
  <div class="bg-white w-full max-w-sm rounded-lg shadow-lg p-6">
    <h2 class="text-2xl font-bold text-center text-gray-700 mb-6">Register</h2>
    <form action="/register" method="POST">
      @csrf
      <div class="mb-6">
        <label for="name" class="text-sm font-medium text-gray-700">Name</label>
        <input name="name" type="text" id="name" class="w-full px-4 py-2 border border-gray-300 rounded-lg" placeholder="Enter your name" value="{{ old('name') }}" required>
        @error('name')
            <small class="text-red-400">{{ $message }}</small>
        @enderror
			</div>
      <div class="mb-6">
        <label for="email" class="text-sm font-medium text-gray-700">Email</label>
        <input name="email" type="email" id="email" class="w-full px-4 py-2 border border-gray-300 rounded-lg" placeholder="Enter your email" value="{{ old('email') }}" required>
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
      <div class="mb-6">
        <label for="education" class="text-sm font-medium text-gray-700">Education</label>
        <select name="education" id="education" class="w-full px-4 py-2 border border-gray-300 rounded-lg" placeholder="Enter your education" required>
          @foreach ($education as $edu)
            <option value="{{ $edu->id }}">{{ $edu->education_level }}, {{ $edu->education_year }}{{ $addon[$edu->education_year-1] }} Year</option>
          @endforeach
        </select>
        @error('education')
            <small class="text-red-400">{{ $message }}</small>
        @enderror
      </div>
      <input type="submit" class="w-full bg-slate-500 hover:bg-slate-600 text-white font-semibold py-2 px-4 rounded-lg" value="Register"></input>
    </form>
    <small>Already registered? <a href="/login" class="text-blue-500">Login now!</a></small>
  </div>
</div>
@endsection