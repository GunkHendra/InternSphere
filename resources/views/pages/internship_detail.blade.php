@extends('layouts/layout')

@section('content')
    <div class="border p-4 mb-2"> 
        <a class="font-medium text-3xl">{{ $internship->title }}</a>
        <br>
        <a class="text-slate-500" href="/company/{{ $internship->company->slug }}">By {{ $internship->company->company_name }}</a>
        <hr class="my-2">
        {!! $internship->description !!}
    </div>
    <div class="border p-4"> 
        <a class="font-medium text-1xl">Education Requirement</a>
        <hr>
        <a href="">{{ $requirement->education_id }}, {{ $requirement }} Year</a>
    </div>
@endsection