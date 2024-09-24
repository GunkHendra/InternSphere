@extends('layouts/layout')

@section('content')
    <ul>
        <div class="border p-4"> 
            <li>{{ $company->company_name }}</li> <hr class="my-2">
            <li>{{ $company->email }}</li>
        </div>
    </ul>
    <div class="flex p-4 justify-center"><h1 class="text-xl">Internship List</h1></div>
    <div>
        <ul>
        @if ($internship->first() === null)
            <div class="border p-4 mb-2">
                <li>There's nothing to see here yet...</li>
            </div>
        @endif
        @foreach ($internship as $intern)
            <div class="border p-4 mb-2"> 
                <li><a href="internship/{{ $intern->slug }}" class="font-medium">{{ $intern->title }}</a></li>
                <hr class="my-2">
                <li>By <a href="/company/{{ $intern->company->slug }}">{{ $intern->company->company_name }}</a></li>
                <li>{{ $intern->excerpt }}</li>
                <a class="text-sky-300" href="internship/{{ $intern->id }}"> Read More...</a>
            </div>
        @endforeach
        </ul>
    </div>
@endsection