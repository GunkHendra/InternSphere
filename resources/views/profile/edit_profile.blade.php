@php
    $addon = ['st', 'nd', 'rd', 'th'];
@endphp

@extends('layouts/layout')

@section('content')
<div class="container mx-auto mt-10">
    <h1 class="text-3xl font-bold mb-6">Edit Profile</h1>

    <form action="/edit_profile" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="w-full h-24 mb-2 flex gap-4 items-start justify-center">
            <img id="previewImage" src="{{ $user->fotoprofile ?? '/assets/illustration/profil.jpg' }}" alt="Profile Picture" class="w-24 h-full object-cover rounded-full">
            <label for="fotoprofile" class="p-2 rounded-lg w-10 h-10"><img src="/assets/icon/edit.png" alt="Edit Profile"></label>
            <input type="file" id="fotoprofile" name="fotoprofile" accept="image/*" class="hidden" onchange="previewImage(event)">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700" for="name">Full Name</label>
            <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" class="mt-1 block w-full border border-gray-300 rounded-lg p-2">
        </div>

        <div class="flex gap-4 w-full">
            <div class="mb-4 w-full">
                <label class="block text-gray-700" for="telp">Phone Number</label>
                <input type="text" id="telp" name="telp" value="{{ old('telp', $user->telp) }}" class="mt-1 block w-full border border-gray-300 rounded-lg p-2">
            </div>

            <div class="mb-4 w-full">
                <label class="block text-gray-700" for="alamat">Address</label>
                <input type="text" id="alamat" name="alamat" value="{{ old('alamat', $user->alamat) }}" class="mt-1 block w-full border border-gray-300 rounded-lg p-2">
            </div>
        </div>

        <div class="w-full h-24 mb-2 flex gap-4 items-center">
            <div class="mb-4 w-full">
                <label class="block text-gray-700" for="tanggal_lahir">Date of Birth</label>
                <input type="date" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir', $user->tanggal_lahir) }}" class="mt-1 block w-full border border-gray-300 rounded-lg p-2">
            </div>

            <div class="mb-4 w-full">
                <label class="block text-gray-700" for="education_level_id">Education Level</label>
                <select id="education_level_id" name="education_level_id" class="mt-1 block w-full border border-gray-300 rounded-lg p-2">
                    @foreach($educationLevels as $educationLevel)
                        <option value="{{ $educationLevel->id }}" {{ (old('education_level_id', $user->education_level_id) == $educationLevel->id) ? 'selected' : '' }}>
                            {{ $educationLevel->education_level }}, {{ $educationLevel->education_year }}{{ $addon[$educationLevel->education_year - 1] }} Year
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700" for="about">About Me</label>
            <textarea id="about" name="about" class="mt-1 block w-full border border-gray-300 rounded-lg p-2">{{ old('about', $user->about) }}</textarea>
        </div>
{{--
        <div class="mb-4">
            <label class="block text-gray-700" for="cv">Upload CV (PDF)</label>
            <input type="file" id="cv" name="cv" class="mt-1 block w-full border border-gray-300 rounded-lg p-2">
        </div> --}}

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg">Update Profile</button>
        <a href="/profile" class="bg-red-600 text-white px-4 py-2 rounded-lg">Cancel</a>
    </form>
</div>
@endsection
