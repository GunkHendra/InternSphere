@extends('layouts/layout')

@section('content')
    <ul>
        <div class="border p-4"> 
            <li>{{ $internship->title }}</li> <hr class="my-2">
            {!! $internship->description !!}
        </div>
    </ul>
@endsection