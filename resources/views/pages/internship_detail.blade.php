@php
    $addon = ['st', 'nd', 'rd', 'th'];
@endphp

@extends('layouts/layout')

@section('content')
<div class="px-6">

    <div class="rounded-lg bg-white shadow-md p-4 mb-2">
        <div class="flex items-center gap-4">
            @if($internship->company && $internship->company->logo)
                <img src="{{ asset('assets/logo/' . $internship->company->logo) }}" alt="{{ $internship->company->company_name }} logo" class="w-16 h-16">
            @else
                <img src="{{ asset('assets/logo/default_logo.png') }}" alt="Default logo" class="w-16 h-16">
            @endif
            <div>
                <a class="font-medium text-3xl">{{ $internship->title }}</a><br>
                <a class="text-slate-500" href="/company/{{ $internship->company->slug }}">By {{ $internship->company->company_name }}</a>
            </div>
        </div>
        <hr class="my-2">
        {!! $internship->description !!}

        <p class="mt-2 flex items-center justify-left">
            Rating: {{ $averageRating ? round($averageRating, 2) : 'No rating yet' }} / 5
            <span class="ml-1 mb-1">
                <!-- Manual star icon addition -->
                <img src="{{ asset('assets/icon/Star_Full.png') }}" alt="Full Star" class="inline w-35 h-10">
            </span>
        </p>
        <p class="text-sm">{{ $commentsCount }} comments</p>
    </div>

    <div class="rounded-lg bg-white shadow-md p-4 mb-4">
        <a class="font-medium text-1xl">Education Requirement</a>
        <hr class="my-2">
        @if($requirement && $requirement->education)
            <a>{{ $requirement->education->education_level }}, {{ $requirement->education->education_year }}{{ $addon[$requirement->education->education_year - 1] }} Year.</a>
        @else
            <p>No education requirements specified.</p>
        @endif
    </div>


    <div class="rounded-lg bg-white shadow-md p-4">
        <h3 class="font-medium text-2xl mb-4">Comments</h3>

        @if($internship->comments->isEmpty())
            <p>No comments yet. Be the first to comment!</p>
        @else
        <div class="flex flex-col gap-4">
            @foreach ($internship->comments as $comment)
                <div class="@if (!$loop->last) border-b pb-4 @endif border-gray-200">
                    <p><strong>{{ $comment->user->name }}</strong> <span class="text-sm text-gray-500">{{ $comment->created_at->diffForHumans() }}</span></p>
                    <p>Rating: {{ $comment->rating }} / 5</p>
                    <p>{{ $comment->comment }}</p>
                </div>
            @endforeach
        </div>
        @endif
    </div>
</div>
@endsection
