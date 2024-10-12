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
        <div class="basis-2/4">
            @if ($internship->first() === null)
                <div class="p-4 mb-2 bg-white shadow-md rounded-lg">
                    There's nothing to see here yet...
                </div>
            @endif
            <ul id="internship-list">
                @foreach ($internship as $intern)
                    <div class="p-4 bg-white shadow-md rounded-lg @if (!$loop->last) mb-2 @endif cursor-pointer internship-item" onclick="showDetails('{{ $intern->id }}')" id="intern-{{ $intern->id }}">
                        <li><a class="font-medium text-3xl">{{ $intern->title }}</a></li>
                        <li><a class="text-slate-500">By {{ $intern->company->company_name }}</a></li>
                        <hr class="my-2">
                        <li>{{ $intern->excerpt }}</li>
                        <span class="text-sky-300">Read more >></span>
                    </div>
                @endforeach
            </ul>
        </div>

        <div class="basis-2/4 p-4 bg-white shadow-md rounded-lg" id="internship-detail">
            <p class="text-center text-slate-400">Select an internship to see the details</p>
        </div>
    </div>

    <script>
        let selectedInternshipId = null;

        function showDetails(id) {
            if (selectedInternshipId === id) {
                document.getElementById('intern-' + id).classList.remove('bg-sky-100');
                document.getElementById('internship-detail').innerHTML = `
                    <p class="text-center text-slate-400">Select an internship to see the details</p>
                `;
                selectedInternshipId = null;
                return;
            }

            let internship_item = document.querySelectorAll('.internship-item');
            internship_item.forEach(function(el) {
                el.classList.remove('bg-sky-100');
            });

            let selected_internship = document.getElementById('intern-' + id);
            selected_internship.classList.add('bg-sky-100');

            selectedInternshipId = id;
        }
    </script>
@endsection
