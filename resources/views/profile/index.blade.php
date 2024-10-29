@extends('layouts/layout')

@section('content')
<div class="container mx-auto px-6 mt-10">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white p-6 rounded-lg shadow-md">
            <div class="text-center">
                <img class="w-24 h-24 mx-auto rounded-full object-cover" src="{{ $user->fotoprofile }}" alt="Profile Picture">
                <h2 class="text-xl font-semibold mt-4">{{ $user->name }}</h2>
                <h4 class="font-semibold">{{ $user->alamat }}</h4>
            </div>
            <div class="mt-6">
                <h3 class="text-lg font-semibold">Contact Information</h3>
                <ul class="mt-2 text-gray-700">
                    <li>{{ $user->email }}</li>
                    <li>{{ $user->telp }}</li>
                </ul>
            </div>
        </div>
        <div class="md:col-span-2 bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-xl font-semibold mb-4">General Information</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <h4 class="font-semibold">About Me</h4>
                    <p class="text-gray-600 text-sm mt-2">{{ $user->about }}</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-6">
                @if ($user->education_level_id === null)
                    <div>
                        <h4 class="font-semibold">Education</h4>
                        <p class="text-gray-600 text-sm mt-2">No Data</p>
                    </div>
                @else
                    <div>
                        <h4 class="font-semibold">Education</h4>
                        <p class="text-gray-600 text-sm mt-2">{{ $educations->education_level }}, {{ $educations->education_year }} Year</p>
                    </div>
                @endif
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-6">
                <div>
                    <h4 class="font-semibold">Birthday</h4>
                    <p class="text-gray-600 text-sm mt-2">{{ $user->tanggal_lahir }}</p>
                </div>
            </div>
            <div class="font-semibold pt-5 text-sky-500">
                @if($user->pdf)
                    <a href="{{ asset('storage/' . $user->pdf) }}" download class="hover:underline">Download CV</a>
                @endif
            </div>
        </div>
    </div>

    <div class="p-6 rounded-lg shadow-md mt-4 bg-black">
        <p class="text-white">Social Media</p>
        <div class="flex space-x-4 mt-2">
            <img class="w-6 h-6" src="/assets/icon/instagram.png" alt="Instagram">
            <img class="w-6 h-6" src="/assets/icon/facebook.png" alt="Facebook">
            <img class="w-6 h-6" src="/assets/icon/telegram.png" alt="Telegram">
            <img class="w-6 h-6" src="/assets/icon/twitter.png" alt="Twitter">
            <img class="w-6 h-6" src="/assets/icon/youtube.png" alt="Youtube">
        </div>
    </div>
    <div class="flex justify-end pt-2">
        <a href="edit_profile" class="w-1/5 text-white p-4 rounded text-2xl bg-gray-400 text-center">Edit</a>
    </div>
</div>
@endsection
