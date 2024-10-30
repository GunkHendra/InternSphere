@php
    $addon = ['st', 'nd', 'rd', 'th'];
@endphp

@extends('layouts/layout')

@section('content')
<div class="flex justify-center mt-10 px-6">
    <!-- General Information Card -->
    <div class="w-1/2 bg-white shadow-md rounded-lg p-6 mr-4">
        <div class="mb-4 pb-2 w-full flex justify-center">
            <img class="w-32 h-32 rounded-full mt-2" src="{{ $user->fotoprofile ?? '/assets/illustration/profil.jpg' }}" alt="Profile Picture">
        </div>
        <h2 class="text-2xl font-semibold mb-4">General Information</h2>
        <div class="mb-4 border-b pb-2">
            <h3 class="text-gray-700">Full Name</h3>
            <p>{{ $user->name ?? 'No name available' }}</p>
        </div>
        <div class="mb-4 border-b pb-2">
            <h3 class="text-gray-700">About Me</h3>
            <p>{{ $user->about ?? 'No description available' }}</p>
        </div>
        <div class="mb-4 border-b pb-2">
            <h3 class="text-gray-700">CV</h3>
            @if($user->pdf)
                <a href="{{ asset('storage/cv/'.$user->pdf) }}" class="text-blue-600 hover:underline" target="_blank">{{ $user->pdf }}</a>
            @else
                <p>No CV available</p>
            @endif
        </div>
    </div>

    <!-- Personal Information Card -->
    <div class="w-1/2 bg-white shadow-md rounded-lg p-6">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-semibold">Personal Information</h2>
            <a href="/edit_profile" class="bg-blue-600 text-white px-4 py-2 rounded-lg">Edit</a>
        </div>
        <div class="mb-4 border-b pb-2">
            <h3 class="text-gray-700">Date of Birth</h3>
            <p>{{ $user->tanggal_lahir ? \Carbon\Carbon::parse($user->tanggal_lahir)->format('d-m-Y') : 'No date of birth available' }}</p>
        </div>
        <div class="mb-4 border-b pb-2">
            <h3 class="text-gray-700">Age</h3>
            <p>{{ $user->age ?? 'No age available' }}</p>
        </div>
        <div class="mb-4 border-b pb-2">
            <h3 class="text-gray-700">Education</h3>
            <p>
                {{ $educations->education_level ?? 'No education level available' }}
                ({{ $educations->education_year . ' ' .'Year' ?? 'No year available' }})
            </p>
        </div>
        <div class="mb-4 border-b pb-2">
            <h3 class="text-gray-700">Phone Number</h3>
            <p>{{ $user->telp ?? 'No phone number available' }}</p>
        </div>
        <div class="mb-4 border-b pb-2">
            <h3 class="text-gray-700">Email</h3>
            <p>{{ $user->email ?? 'No email available' }}</p>
        </div>
        <div class="mb-4 border-b pb-2">
            <h3 class="text-gray-700">Address</h3>
            <p>{{ $user->alamat ?? 'No address available' }}</p>
        </div>
    </div>
</div>
@endsection
