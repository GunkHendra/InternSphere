@php
    $addon = ['st', 'nd', 'rd', 'th'];
    $star = ['Star_0.png', 'Star_1.png', 'Star_2.png', 'Star_3.png', 'Star_4.png', 'Star_Full.png'];
@endphp

@extends('layouts/layout')

@section('content')
<div id="confirmationModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <h2 class="text-xl font-semibold mb-4">Confirm Application</h2>
        <p>Are you sure you want to apply for this internship?</p>
        <div class="mt-6 flex justify-end gap-4">
            <button id="cancelButton" class="bg-gray-400 hover:bg-gray-500 text-white py-2 px-4 rounded">Cancel</button>
            <button id="confirmButton" class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded">Apply</button>
        </div>
    </div>
</div>

<div class="px-6">
    <div class="rounded-lg bg-white shadow-md p-4 mb-2">
        <div class="flex justify-between items-center">
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
            {{-- <form action="{{ route('internship.apply', $internship->id) }}" method="POST"> --}}
            <form action="/internship/apply/{{ $internship->id }}" method="POST" id="applyForm">
                @csrf
                @if ($isApplied === null)
                    {{-- <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Apply
                    </button> --}}
                    <button type="button" id="applyButton" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Apply
                    </button>                    
                @else
                    <button type="button" class="bg-white border-2 border-blue-500 text-black py-2 px-4 rounded-lg" disabled>
                        Already Applied
                    </button>
                @endif
            </form>
        </div>
        <hr class="my-2">
        {!! $internship->description !!}

        <p class="flex items-center justify-left gap-1">
            Rating: {{ $internship->averageRating() ? round($internship->averageRating(), 0) : 'No rating yet' }} / 5
            <span>
                 <img src="{{ asset('assets/icon/' . $star[round($internship->averageRating(), 0)]) }}" alt="Star" class="inline w-35 h-10">
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
                    <div class="flex items-center gap-2">
                    <p>Rating: {{ $comment->rating }} / 5</p>
                    <!-- Menampilkan bintang di sebelah rating -->
                    <img src="{{ asset('assets/icon/' . $star[$comment->rating]) }}" alt="Star" class="w-35 h-10 inline-block">
                    </div>
                <p>{{ $comment->comment }}</p>
            </div>
            @endforeach
        </div>
        @endif
    </div>
</div>

<script>
    document.getElementById('applyButton').addEventListener('click', function () {
        document.getElementById('confirmationModal').classList.remove('hidden');
    });

    document.getElementById('cancelButton').addEventListener('click', function () {
        document.getElementById('confirmationModal').classList.add('hidden');
    });

    document.getElementById('confirmButton').addEventListener('click', function () {
        document.getElementById('applyForm').submit();
    });
</script>
@endsection
