@php
    $addon = ['st', 'nd', 'rd', 'th'];
@endphp

@extends('layouts/layout')

@section('content')
    <div class="rounded-lg bg-white shadow-md p-4 mb-2">
        <a class="font-medium text-3xl">{{ $internship->title }}</a>
        <br>
        <a class="text-slate-500" href="/company/{{ $internship->company->slug }}">By {{ $internship->company->company_name }}</a>
        <hr class="my-2">
        {!! $internship->description !!}
    </div>
    <div class="rounded-lg bg-white shadow-md p-4"> 
        <a class="font-medium text-1xl">Education Requirement</a>
        <hr>
        <a href="">{{ $requirement->education->education_level }}, {{ $requirement->education->education_year }} @if ($addon[$requirement->education->education_year - 1] < 5)
            {{ $addon[$requirement->education->education_year - 1] }}
        @else
            +
        @endif
        Year.</a>
    </div>
@endsection