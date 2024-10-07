@extends('layouts/layout')

@section('content')
    <div class="flex h-[86vh] justify-center items-center mb-6">
        <div class="flex justify-between items-center gap-10">
            <img class="max-w-56 max-h-56" src="assets/logo.png" alt="Logo">
            <div class="space-y-5">
                <a href="/about" class="text-8xl font-bold">{{ config('app.name') }}</a>
                <p class="text-2xl">Where the internship waits for you.</p>
                <div class="block mb-3">
                    <form action="/internship" method="GET" class="flex items-center justify-between">
                        <input type="text" class="border border-gray-200 bg-white text-sm rounded-lg w-full ps-4 py-2.5" placeholder="Type &quot;internship&quot;" name="search" value="{{ request('search') }}"/>
                        <button type="submit" class="border border-gray-200 bg-white p-3 ml-2 text-sm rounded-lg">
                            <img class="w-4 h-4 " src="assets/search.png" alt="search-icon">
                        </button>
                    </form>
                </div>
            </div>
            <div>
            </div>
        </div>
    </div>

    <div class="flex h-[100vh] justify-center items-center bg-black">
        <div class="flex justify-start">
            <img src="assets/illustration/discus.png" alt="">
        </div>
        <div class="text-white p-6">
            <div class="space-y-10">
                <div class="flex items-center gap-4">
                    <img class="max-w-12 max-h-12" src="assets/icon/link.png" alt="">
                    <span class="text-4xl">Connects students with valuable internship opportunities.</span>
                </div>
                <div class="flex items-center gap-4">
                    <img class="max-w-16 max-h-16" src="assets/icon/thumb.png" alt="">
                    <span class="text-4xl">Find the perfect internship to match your skills and ambitions.</span>
                </div>
                <div class="flex items-center gap-4">
                    <img class="max-w-14 max-h-14" src="assets/icon/easy.png" alt="">
                    <span class="text-4xl">Easy access to internships.</span>
                </div>
            </div>
        </div>
    </div>
<<<<<<< HEAD
    <div class="h-[100vh] ">
=======

    <div class="h-[100vh] pt-32">
>>>>>>> a0b9b107aee6c5f5b414835325935caecd2bb219
        <div class="flex justify-start mb-6">
            <span class="text-3xl font-bold">Check out some of our internship.</span>
        </div>
        <div class="grid grid-cols-3 grid-rows-3 justify-center gap-6">
            @foreach ($internship as $intern)
                <div class="p-4 bg-white shadow-md rounded-lg">
                    <a href="/internship/{{ $intern->slug }}" class="font-medium text-3xl">{{ $intern->title }}</a> <br>
                    <a href="/company/{{ $intern->company->slug }}" class="text-slate-500">By {{ $intern->company->company_name }}</a>
                    {{-- <hr class="my-2"> --}}
                    <p>{{ $intern->excerpt }}</p>
                    {{-- <a class="text-sky-300" href="/internship/{{ $intern->slug }}"> Read more >></a> --}}
                </div>
            @endforeach
        </div>
    </div>
@endsection
