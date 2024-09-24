@extends('layouts/layout')

@section('content')
    <ul>
    @foreach ($internship as $intern)
        <div class="border p-4 mb-2"> 
            <li><a href="internship/{{ $intern->id }}" class="font-medium">{{ $intern->title }}</a></li> <hr class="my-2">
            <li>{{ $intern->excerpt }}</li>
            <a class="text-sky-300" href="internship/{{ $intern->id }}"> Read More...</a>
        </div>
    @endforeach
    </ul>
@endsection