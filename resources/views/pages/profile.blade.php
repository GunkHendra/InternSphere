@extends('layouts/layout')

@section('content')
<body class="bg-gray-100 p-10">
    <div class="container mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <div class="text-center">
                    <img class="w-24 h-24 mx-auto rounded-full" src="assets/logo.png" alt="Profile Picture">
                    <h2 class="text-xl font-semibold mt-4">Dektu</h2>
                    <p class="text-gray-500">Denpasar Bali</p>
                </div>
                <div class="mt-6">
                    <h3 class="text-lg font-semibold">Contact Information</h3>
                    <ul class="mt-2 text-gray-700">
                        <li>Email: dektudektu19@gmail.com</li>
                        <li>Phone: +6281936397843</li>
                    </ul>
                    <div class="mt-4">
                        <h3 class="text-lg font-semibold">Software Skill</h3>
                        <div class="flex space-x-4 mt-2">
                            <img class="w-6 h-6" src="assets/logo.png" alt="Invision">
                            <img class="w-6 h-6" src="assets/logo.png" alt="Sketch">
                            <img class="w-6 h-6" src="assets/logo.png" alt="Figma">
                            <img class="w-6 h-6" src="assets/logo.png" alt="Adobe XD">
                        </div>
                    </div>
                </div>
                <div class="mt-6">
                    <h3 class="text-lg font-semibold">Skills</h3>
                    <div class="flex flex-wrap mt-2">
                        <span class="bg-gray-200 text-sm text-gray-800 px-2 py-1 rounded mr-2 mb-2">Brand Design</span>
                        <span class="bg-gray-200 text-sm text-gray-800 px-2 py-1 rounded mr-2 mb-2">Logo Design</span>
                        <span class="bg-gray-200 text-sm text-gray-800 px-2 py-1 rounded mr-2 mb-2">Mobile App Design</span>
                        <span class="bg-gray-200 text-sm text-gray-800 px-2 py-1 rounded mr-2 mb-2">UI Design</span>
                    </div>
                </div>
            </div>

            <div class="md:col-span-2 bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold mb-4">General Information</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <h4 class="font-semibold">About me</h4>
                        <p class="text-gray-600 text-sm mt-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla ut sit dolor consectetur urna, dui cras nec sed.</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-6">
                    <div>
                        <h4 class="font-semibold">Education</h4>
                        <p class="text-gray-600 text-sm mt-2">Udayana University</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-6">
                    <div>
                        <h4 class="font-semibold">Birthday</h4>
                        <p class="text-gray-600 text-sm mt-2">17-10-2004</p>
                    </div>
                </div>
                <div class="mt-6">
                    <h4 class="font-semibold">Work History</h4>
                    <ul class="text-gray-600 text-sm mt-2">
                        <li>Twitch</li>
                        <li>Google</li>
                        <li>Apple</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class=" p-6 rounded-lg shadow-md mt-4 bg-black">
            <p class="text-white">Social Media</p>
            <div class="flex space-x-2">
                <a href=""><img class="w-6 h-6" src="assets/social/facebook.png" alt="facebook">
                <a href=""><img class="w-6 h-6" src="assets/social/twitter.png" alt="twitter"></a>
                <a href=""><img class="w-6 h-6" src="assets/social/telegram.png" alt="telegram"></a>
                <a href=""><img class="w-6 h-6" src="assets/social/youtube.png" alt="youtube"></a>
                <a href=""><img class="w-6 h-6" src="assets/social/instagram.png" alt="instagram"></a></a>

            </div>
        </div>
    </div>
@endsection
