@extends('layouts/layout')

@section('content')
    <div class="pb-3 px-6">
        <form action="/company" method="GET" class="flex items-center justify-between">
            <input type="text" class="border border-gray-200 bg-white text-sm rounded-lg w-full ps-4 p-2.5" placeholder="Search" name="search" value="{{ request('search') }}"/>
            <button type="submit" class="border border-gray-200 bg-white p-3 ml-2 text-sm rounded-lg">
                <img class="w-4 h-4 " src="{{ asset('assets/search.png') }}" alt="search-icon">
            </button>
        </form>
    </div>
    @if ($company->first() === null)
        <div class="shadow-md bg-white p-4 mb-2 rounded-lg px-6">
            There's nothing to see here yet...
        </div>
    @endif
    <ul class="px-6">
    @foreach ($company as $comp)
        <div class="shadow-md bg-white p-4 mb-2 rounded-lg flex items-center gap-4">

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
    @endforeach
    </ul>
@endsection
