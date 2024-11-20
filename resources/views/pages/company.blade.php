@php
    $star = ['Star_0.png', 'Star_1.png', 'Star_2.png', 'Star_3.png', 'Star_4.png', 'Star_Full.png'];
@endphp

@extends('layouts/layout')

@section('content')
    <div class="pb-3 px-6">
        <form action="/company" method="GET" class="flex items-center justify-between">
            <input type="text" class="bg-gray-50 rounded-lg p-4 shadow-lg text-sm border border-gray-150 w-full" placeholder="Search" name="search" value="{{ request('search') }}"/>
            <button type="submit" class="bg-gray-50 rounded-lg shadow-lg text-sm border border-gray-150 p-4 ml-2">
                <img class="w-4 h-4 " src="{{ asset('assets/search.png') }}" alt="search-icon">
            </button>
        </form>
    </div>
    @if ($company->first() === null)
        <div class="shadow-md bg-white p-4 mb-2 rounded-lg px-6">
            There's nothing to see here yet...
        </div>
    @endif
    <ul class="px-6 space-y-4">
    @foreach ($company as $comp)
        <div class="bg-gray-50 rounded-lg p-8 shadow-lg">
            <div class="flex items-center gap-4 mb-2">
                @if($comp->logo)
                    <img src="{{ asset('assets/logo/' . $comp->logo) }}" alt="{{ $comp->company_name }} logo" class="w-16 h-16">
                @else
                    <img src="{{ asset('assets/logo/default_logo.png') }}" alt="Default logo" class="w-16 h-16">
                @endif
                <div>
                    <li><a href="/company/{{ $comp->slug }}" class="font-medium text-3xl">{{ $comp->company_name }}</a></li>
                    <li><a class="text-slate-500">Focused on {{ $comp->focus }}</a></li>
                    <li><a class="text-slate-500">Contact : {{ $comp->email }}</a></li>
                </div>
            </div>

            <hr class="my-2">
            <li><p class="text-sm md:text-base line-clamp-2">{{ $comp->description }}</p></li>
        </div>
    @endforeach
    </ul>
@endsection
