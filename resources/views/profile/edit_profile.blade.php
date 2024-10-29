@extends('layouts/layout')

@section('content')
<div class="container mx-auto px-6 mt-10">
    <form action="/edit_profile" method="POST" enctype="multipart/form-data"">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <div class="text-center">
                    <div class="relative w-24 h-24 mx-auto mb-2">
                        <label for="fotoprofile" class="block w-full h-full border-2 border-dashed rounded-full cursor-pointer overflow-hidden">
                            <img id="previewImage" src="{{ $user->fotoprofile }}" alt="Profile Picture" class="w-full h-full object-cover rounded-full">
                        </label>
                        <input type="file" id="fotoprofile" name="fotoprofile" accept="image/*" class="hidden" onchange="previewImage(event)">
                    </div>
                    <input class="w-full border bg-gray-200 rounded mb-2 text-center p-2" type="text" name="name" placeholder="Nama Lengkap" value="{{ $user->name }}" required>
                    <input type="text" name="alamat" placeholder="Alamat" class="border w-full bg-gray-200 rounded text-center p-2" value="{{ $user->alamat }}" required>
                </div>
                <div class="mt-6">
                    <h3 class="text-lg font-semibold">Contact Information</h3>
                    <input type="text" name="telp" placeholder="Nomor Telepon" class="w-full border bg-gray-200 rounded text-center p-2" value="{{ $user->telp }}" required>
                </div>
            </div>

            <div class="md:col-span-2 bg-white p-6 rounded-lg shadow-md grid">
                <h3 class="text-xl font-semibold mb-4">General Information</h3>
                <textarea name="about" placeholder="About Me" class="w-full border bg-gray-200 rounded p-5 resize-none">{{ $user->about }}</textarea>

                <select name="education_level_id" class="bg-gray-200 w-1/3 rounded mt-4 p-2" required>
                    <option value="">Select Education Level</option>
                    @foreach ($educations as $education)
                        <option value="{{ $education->id }}" {{ $user->education_level_id == $education->id ? 'selected' : '' }}>
                            {{ $education->education_level }}, {{ $education->education_year }} Year
                        </option>
                    @endforeach
                </select>

                <input type="date" name="tanggal_lahir" class="bg-gray-200 w-1/3 rounded mt-4 p-2" value="{{ $user->tanggal_lahir }}" required>

                <div class="mt-4">
                    <h4 class="font-semibold pb-2">CV (Curriculum Vitae)</h4>
                    <input type="file" name="cv" accept=".pdf">
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
        <div class="flex flex-row mt-4 justify-between">
            <button type="submit" class="bg-blue-500 text-white p-4 rounded text-2xl text-center">Save Changes</button>
            <a href="{{ route('profile') }}" class="bg-red-500 text-white p-4 rounded text-2xl text-center">Cancel</a>
        </div>
    </form>
</div>
@endsection
