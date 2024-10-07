@extends('layouts/layout')

@section('content')
    <div class="mb-3">
        <form action="/internship" method="GET" class="flex items-center justify-between">
            <input type="text" class="border border-gray-200 bg-white text-sm rounded-lg w-full ps-4 py-2.5" placeholder="Search" name="search" value="{{ request('search') }}"/>
            <button type="submit" class="border border-gray-200 bg-white p-3 ml-2 text-sm rounded-lg">
                <img class="w-4 h-4 " src="assets/search.png" alt="search-icon">
            </button>
        </form>
    </div>
    @include('partials/internship_list')
@endsection