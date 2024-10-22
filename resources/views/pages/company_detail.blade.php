@php
    $star = ['Star_0.png', 'Star_1.png', 'Star_2.png', 'Star_3.png', 'Star_4.png', 'Star_Full.png'];
@endphp

@extends('layouts/layout')

@section('content')
    <div class="px-6">
        <div class="shadow-md bg-white p-4 rounded-lg flex items-center gap-4">

            @if($company->logo)
                <img src="{{ asset('assets/logo/' . $company->logo) }}" alt="{{ $company->company_name }} logo" class="w-16 h-16">
            @else
                <img src="{{ asset('assets/logo/default_logo.png') }}" alt="Default logo" class="w-16 h-16">
            @endif
            <ul>
                <li>
                    <p class="flex items-center justify-left gap-1">
                        <span class="font-medium text-3xl">{{ $company->company_name }}</span>
                        <span><img src="{{ asset('assets/icon/' . $star[$companyRating]) }}" alt="Star" class="inline w-35 h-10"></span>
                    </p>
                </li>
                <hr class="my-2">
                <li><a class="text-slate-500">Focused on {{ $company->focus }}</a></li>
                <li><a class="text-slate-500">Contact : {{ $company->email }}</a></li>
            </ul>
        </div>
        <div class="flex p-4 justify-center"><h1 class="text-3xl">Internship List</h1></div>
        <div>
            @include('partials/internship_list')
        </div>
    </div>
@endsection
