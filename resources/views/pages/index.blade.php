@extends('layouts/layout')

@section('content')
    <div class="flex flex-row">
        <div class="basis-1/4 border p-4 mr-4">
            Profile Space
        </div>
        <div class="basis-3/4">
            <ul>
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
    </div>
@endsection