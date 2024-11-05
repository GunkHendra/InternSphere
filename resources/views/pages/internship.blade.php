@php
    $star = ['Star_0.png', 'Star_1.png', 'Star_2.png', 'Star_3.png', 'Star_4.png', 'Star_Full.png'];
@endphp

@extends('layouts/layout')

@section('content')
    <div class="mb-3 px-6">
        <form action="/internship" method="GET" class="flex items-center justify-between">
            <input type="text" class="border border-gray-200 bg-white text-sm rounded-lg w-full ps-4 py-2.5" placeholder="Search" name="search" value="{{ request('search') }}"/>
            <button type="submit" class="border border-gray-200 bg-white p-3 ml-2 text-sm rounded-lg">
                <img class="w-4 h-4" src="assets/search.png" alt="search-icon">
            </button>
        </form>
    </div>

    <div class="flex flex-row px-6 space-x-6">
        <div>
            @if ($internship->first() === null)
                <div class="p-4 mb-2 bg-white shadow-md rounded-lg">
                    There's nothing to see here yet...
                </div>
            @endif
            <ul id="internship-list">
                @foreach ($internship as $intern)
                    <div class="p-4 bg-white shadow-md rounded-lg @if (!$loop->last) mb-2 @endif cursor-pointer internship-item" onclick="showDetails('{{ $intern->id }}')" id="intern-{{ $intern->id }}">
                        <div class="flex items-center gap-4 mb-2">
                            @if($intern->company && $intern->company->logo)
                                <img src="{{ asset('assets/logo/' . $intern->company->logo) }}" alt="{{ $intern->company->company_name }} logo" class="w-12 h-12">
                            @else
                                <img src="{{ asset('assets/logo/default_logo.png') }}" alt="Default logo" class="w-12 h-12">
                            @endif
                            <a href="/internship/{{ $intern->slug }}" class="font-medium text-xl md:text-2xl">{{ $intern->title }}</a>
                        </div>
                        <li><a href="/company/{{ $intern->company->slug }}" class="text-slate-500">By {{ $intern->company->company_name }}</a></li>
                        <hr class="my-2">
                        <li><p class="text-sm md:text-base line-clamp-3">{{ $intern->description }}</p></li>

                        <p class="flex items-center justify-left gap-1">
                            Rating: {{ $intern->averageRating() ? round($intern->averageRating(), 0) : 'No rating yet' }} / 5
                            <span>
                                 <img src="{{ asset('assets/icon/' . $star[round($intern->averageRating(), 0)]) }}" alt="Star" class="inline w-35 h-10">
                            </span>
                        </p>

                        <p class="text-sm">{{ $intern->commentsCount() }} comments</p>
                        
                    </div>
                @endforeach
            </ul>
        </div>

        {{-- <div class="basis-2/4 p-4 bg-white shadow-md rounded-lg" id="internship-detail">
            <p class="text-center text-slate-400">Select an internship to see the details</p>
        </div> --}}
    </div>

    <script>

        // let selectedInternshipId = null;
        // function showDetails(id) {
        //     if (selectedInternshipId === id) {
        //         document.getElementById('intern-' + id).classList.remove('border-2');
        //         document.getElementById('internship-detail').innerHTML = `
        //             <p class="text-center text-slate-400">Select an internship to see the details</p>
        //         `;
        //         selectedInternshipId = null;
        //         return;
        //     }
        //     else{                
        //         let internship_item = document.querySelectorAll('.internship-item');
        //         internship_item.forEach(function(el) {
        //             el.classList.remove('border-2');
        //         });
    
        //         let selected_internship = document.getElementById('intern-' + id);
        //         selected_internship.classList.add('border-2');
        //         selected_internship.classList.add('border-sky-300');
    
        //         selectedInternshipId = id;
        //     }
        // }
    </script>
@endsection
