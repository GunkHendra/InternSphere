@extends('layouts/layout')

@section('content')
    <div class="mb-3 px-6">
        <form action="/internship" method="GET" class="flex items-center justify-between">
            <input type="text" class="border border-gray-200 bg-white text-sm rounded-lg w-full ps-4 py-2.5" placeholder="Search" name="search" value="{{ request('search') }}"/>
            <button type="submit" class="border border-gray-200 bg-white p-3 ml-2 text-sm rounded-lg">
                <img class="w-4 h-4" src="{{ asset('assets/search.png') }}" alt="search-icon">
            </button>
        </form>
    </div>
    <div class="px-6">
        @foreach ($internship as $intern)
            <div class="p-4 bg-white shadow-md rounded-lg mb-4">
                <div class="flex items-center gap-4">

                    @if($intern->company && $intern->company->logo)
                        <img src="{{ asset('assets/logo/' . $intern->company->logo) }}" alt="{{ $intern->company->company_name }} logo" class="w-12 h-12">
                    @else
                        <img src="{{ asset('assets/logo/default_logo.png') }}" alt="Default logo" class="w-12 h-12">
                    @endif
                    <a href="/internship/{{ $intern->slug }}" class="font-medium text-xl sm:text-2xl md:text-3xl">{{ $intern->title }}</a>
                </div>
                <a href="/company/{{ $intern->company->slug }}" class="text-slate-500 text-sm sm:text-base">By {{ $intern->company->company_name }}</a>
                <p class="text-sm sm:text-base mt-2">{{ $intern->excerpt }}</p>

                <p class="mt-2">
                    Rating: {{ $intern->averageRating() ? round($intern->averageRating(), 2) : 'No rating yet' }} / 5
                </p>
                <p class="text-sm">{{ $intern->commentsCount() }} comments</p>
            </div>
        @endforeach
    </div>
@endsection
