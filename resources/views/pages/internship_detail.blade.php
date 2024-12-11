@php
    $addon = ['st', 'nd', 'rd', 'th'];
    $star = ['Star_0.png', 'Star_1.png', 'Star_2.png', 'Star_3.png', 'Star_4.png', 'Star_Full.png'];
@endphp

@extends('layouts/layout')

@section('content')
<div class="px-6">
    <div class="rounded-lg bg-white shadow-md p-4 mb-2">
        <div class="flex flex-col md:flex-row justify-between items-center">
            <div class="flex items-center gap-4 mb-4 md:mb-0">
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

            {{-- Form Apply Button --}}
            <form action="/internship/apply/{{ $internship->id }}" method="POST" id="applyForm" class="w-full md:w-auto mt-4 md:mt-0">
                @csrf
                @if ($isApplied === null)
                    <button type="button" id="applyButton" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded w-full md:w-auto">
                        Apply
                    </button>                    
                @else
                    <button type="button" class="bg-white border-2 border-blue-500 text-black py-3 px-6 rounded-lg text-lg w-full md:w-auto" disabled>
                        Already Applied
                    </button>
                @endif
            </form>
        </div>
        
        <hr class="my-2">
        
        <!-- Deskripsi dengan fitur Read More -->
        <div class="mt-5 text-lg" id="description">
            <p id="description-text" class="whitespace-pre-line">{!! Str::limit($internship->description, 500) !!}</p>
            @if(strlen($internship->description) > 500)
                <button id="read-more-btn" class="text-blue-500 mt-2">Read More</button>
            @endif
        </div>

        <p class="flex items-center justify-left gap-1 mt-2">
            Rating: {{ $internship->averageRating() ? round($internship->averageRating(), 0) : 'No rating yet' }} / 5
            <span>
                <img src="{{ asset('assets/icon/' . $star[round($internship->averageRating(), 0)]) }}" alt="Star" class="inline w-35 h-10">
            </span>
        </p>
        <p class="text-sm">{{ $commentsCount }} comments</p>
    </div>

    <!-- Education Requirement Section -->
    <div class="rounded-lg bg-white shadow-md p-4 mb-4">
        <a class="font-medium text-1xl">Education Requirement</a>
        <hr class="my-2">
        @if($requirement && $requirement->education)
            <a>{{ $requirement->education->education_level }}, {{ $requirement->education->education_year }}{{ $addon[$requirement->education->education_year - 1] }} Year.</a>
        @else
            <p>No education requirements specified.</p>
        @endif
    </div>

    <!-- Comment and Rating Form -->
    <div class="rounded-lg bg-white shadow-md p-4 mb-4">
        <h3 class="font-medium text-2xl mb-4">Add a Comment and Rating</h3>
        <form action="/internship/comment/{{ $internship->id }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="rating">Rating:</label>
                <div class="flex gap-2">
                    @for($i = 1; $i <= 1; $i++)
                        <input type="radio" id="rating-{{ $i }}" name="rating" value="{{ $i }}" required>
                        <label for="rating-{{ $i }}">
                            <img src="{{ asset('assets/icon/Star_Full.png') }}" alt="Star" class="inline w-30 h-10">
                        </label>
                    @endfor
                </div>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="comment">Comment:</label>
                <textarea id="comment" name="comment" rows="4" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter your comment here..." required></textarea>
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Submit Comment
            </button>
        </form>
    </div>

    <!-- Comments Section -->
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



<!-- Script for Read More/Show Less -->
<script>
    document.getElementById('read-more-btn').addEventListener('click', function() {
        const descriptionText = document.getElementById('description-text');
        const isExpanded = descriptionText.classList.toggle('expanded');
        descriptionText.innerHTML = isExpanded ? `{!! addslashes($internship->description) !!}` : `{!! Str::limit($internship->description, 500) !!}`;
        this.textContent = isExpanded ? 'Show Less' : 'Read More';
    });
</script>

<style>
    #description-text.expanded {
        white-space: normal;
    }
</style>

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
