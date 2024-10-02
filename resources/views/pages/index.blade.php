@extends('layouts/layout')

@section('content')
    <div class="flex h-[86vh] justify-center items-center mb-6">
        <div class="flex justify-between items-center gap-10">
            <img class="max-w-56 max-h-56" src="assets/logo.png" alt="Logo">
            <div class="space-y-5">
                <a href="/about" class="text-8xl font-bold">{{ config('app.name') }}</a>
                <p class="text-2xl">Where the internship waits for you.</p>
            </div>
        </div>
    </div>
    <div>
        @include('layouts/internship_list')
    </div>
@endsection