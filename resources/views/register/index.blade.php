@extends('layouts/layout')

@section('content')
<div class="min-h-[80vh] flex items-center justify-center">
  <div class="bg-white w-full max-w-sm rounded-lg shadow-lg p-6">
    <h2 class="text-2xl font-bold text-center text-gray-700 mb-6">Register</h2>
    <form action="/register" method="POST">
      @csrf
      <div class="mb-4">
        <label for="email" class="text-sm font-medium text-gray-700">Email</label>
        <input name="email" type="email" id="email" class="w-full px-4 py-2 border border-gray-300 rounded-lg @error('email') text-red @enderror" placeholder="Enter your email">
			</div>
      <div class="mb-6">
        <label for="password" class="text-sm font-medium text-gray-700">Password</label>
        <input name="password" type="password" id="password" class="w-full px-4 py-2 border border-gray-300 rounded-lg @error('email') text-red @enderror" placeholder="Enter your password">
      </div>
      <button type="submit" class="w-full bg-slate-500 hover:bg-slate-600 text-white font-semibold py-2 px-4 rounded-lg">Register</button>
    </form>
    <small>Already registered? <a href="/register" class="text-blue-500">Login now!</a></small>
  </div>
</div>
@endsection