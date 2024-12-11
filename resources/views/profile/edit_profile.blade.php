@php
    $addon = ['st', 'nd', 'rd', 'th'];
@endphp

@extends('layouts/layout')

@section('content')
<div class="container mx-auto mt-10">
    <h1 class="text-3xl font-bold mb-4">Edit Profile</h1>

    <form action="/edit_profile" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Bagian Edit Foto Profil -->
        <div class="w-full h-24 mb-7 flex gap-4 items-start justify-center">
             <img id="previewImage" src="{{ $user->fotoprofile ? asset('storage/' . $user->fotoprofile) : '/assets/illustration/profil.jpg' }}" alt="Profile Picture" class="w-32 h-32 object-cover rounded-full">
            <label for="fotoprofile" class="p-2 rounded-lg w-10 h-10 cursor-pointer">
                <img src="/assets/icon/edit.png" alt="Edit Profile">
            </label>
            <input type="file" id="fotoprofile" accept="image/*" class="hidden" onchange="openCropperModal(event)">
            <input type="hidden" name="fotoprofile" id="croppedImage">
        </div>

        <!-- Modal untuk Crop Gambar -->
        <div id="cropper-modal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 flex justify-center items-center">
            <div class="bg-white p-4 rounded-lg max-w-lg">
                <h2 class="text-lg font-semibold mb-4">Crop Foto Profil</h2>
                <div>
                    <img id="image-to-crop" src="" alt="Image to Crop" class="w-full max-h-96">
                </div>
                <div class="flex justify-between mt-4">
                    <button type="button" onclick="closeCropperModal()" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Cancel</button>
                    <button type="button" onclick="cropImage()" class="bg-blue-600 hover:bg-blue-800 text-white font-bold py-2 px-4 rounded">Crop & Save</button>
                </div>
            </div>
        </div>

        <!-- Informasi Profil Lainnya -->
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

        <div class="flex gap-4 w-full">
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
            <textarea id="about" name="about" class="mt-1 block w-full border border-gray-300 rounded-lg p-2 resize-none">{{ old('about', $user->about) }}</textarea>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700" for="cv">Upload CV (PDF)</label>
            <input type="file" id="cv" name="cv" accept=".pdf" class="mt-1 block w-full border border-gray-300 rounded-lg p-2">
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg">Update Profile</button>
        <a href="/profile" class="bg-red-600 text-white px-4 py-2 rounded-lg">Cancel</a>
    </form>
</div>

<!-- JavaScript untuk Crop Image -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>
<script>
    let cropper;

    function openCropperModal(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('image-to-crop').src = e.target.result;
                document.getElementById('cropper-modal').classList.remove('hidden');

                setTimeout(() => {
                    cropper = new Cropper(document.getElementById('image-to-crop'), {
                        aspectRatio: 1,
                        viewMode: 1,
                        preview: '.preview-container',
                    });
                }, 100);
            };
            reader.readAsDataURL(file);
        }
    }

    function closeCropperModal() {
        document.getElementById('cropper-modal').classList.add('hidden');
        if (cropper) {
            cropper.destroy();
            cropper = null;
        }
    }

    function cropImage() {
        const canvas = cropper.getCroppedCanvas({
            width: 256,
            height: 256,
        });
        canvas.toBlob(blob => {
            const url = URL.createObjectURL(blob);
            document.getElementById('previewImage').src = url;

            // Debugging
            console.log("Blob URL:", url);
            console.log("Cropped image set to preview image.");

            // Convert blob to base64 and store in hidden input
            const reader = new FileReader();
            reader.onloadend = function() {
                document.getElementById('croppedImage').value = reader.result;
                console.log("Base64 image data stored:", reader.result); // Debugging line
            };
            reader.readAsDataURL(blob);

            closeCropperModal();
        });
    }
</script>

<link href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css" rel="stylesheet" />
@endsection
