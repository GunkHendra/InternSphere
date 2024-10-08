@extends('layouts/layout')

@section('content')
    <div class="flex h-[86vh] justify-center items-center mb-6">
        <div class="flex flex-col md:flex-row justify-between items-center gap-10">
            <img class="max-w-56 max-h-56" src="/assets/logo.png" alt="Logo">
            <div class="space-y-5 text-center">
                <a href="/about" class="text-6xl md:text-8xl sm:text-center md:text-center font-bold">{{ config('app.name') }}</a>
                <p class="text-lg md:text-2xl">Where the internship waits for you.</p>
                <div class="block mb-3">
                    <form action="/internship" method="GET" class="flex items-center justify-center md:justify-between">
                        <input type="text" class="border border-gray-200 bg-white text-sm rounded-lg w-full ps-4 py-2.5" placeholder="Type &quot;internship&quot;" name="search" value="{{ request('search') }}"/>
                        <button type="submit" class="border border-gray-200 bg-white p-3 ml-2 text-sm rounded-lg">
                            <img class="w-4 h-4 " src="assets/search.png" alt="search-icon">
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="flex flex-col lg:flex-row h-auto lg:h-[100vh] justify-center items-center bg-black">
        <div class="flex justify-center lg:justify-start mb-6 lg:mb-0">
            <img class="w-[70%] lg:w-auto" src="assets/illustration/discus.png" alt="">
        </div>
        <div class="text-white p-6">
            <div class="space-y-10">
                <div class="flex flex-col md:flex-row items-center gap-4">
                    <img class="max-w-12 max-h-12" src="assets/icon/link.png" alt="">
                    <span class="text-lg md:text-4xl text-center md:text-left">Connects students with valuable internship opportunities.</span>
                </div>
                <div class="flex flex-col md:flex-row items-center gap-4">
                    <img class="max-w-16 max-h-16" src="assets/icon/thumb.png" alt="">
                    <span class="text-lg md:text-4xl text-center md:text-left">Find the perfect internship to match your skills and ambitions.</span>
                </div>
                <div class="flex flex-col md:flex-row items-center gap-4">
                    <img class="max-w-14 max-h-14" src="assets/icon/easy.png" alt="">
                    <span class="text-lg md:text-4xl text-center md:text-left">Easy access to internships.</span>
                </div>
            </div>
        </div>
    </div>

    <div class="h-auto lg:h-[100vh] pt-16 lg:pt-32 px-6">
        <div class="flex justify-start mb-6">
            <span class="text-2xl md:text-3xl font-bold">Check out some of our internships</span>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($internship as $intern)
                <div class="p-4 bg-white shadow-md rounded-lg">
                    <a href="/internship/{{ $intern->slug }}" class="font-medium text-xl md:text-2xl">{{ $intern->title }}</a> <br>
                    <a href="/company/{{ $intern->company->slug }}" class="text-slate-500">By {{ $intern->company->company_name }}</a>
                    <p class="text-sm md:text-base">{{ $intern->excerpt }}</p>
                </div>
            @endforeach
        </div>
    </div>
@endsection
