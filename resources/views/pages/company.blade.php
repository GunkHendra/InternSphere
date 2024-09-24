@extends('layouts/layout')

@section('content')
    @if ($company->first() === null)
        <div class="border p-4 mb-2">
            <li>There's nothing to see here yet...</li>
        </div>
    @endif
    <ul>
    @foreach ($company as $comp)
        <div class="border p-4 mb-2"> 
            <li><a href="company/{{ $comp->slug }}" class="font-medium">{{ $comp->company_name }}</a></li>
            <hr class="my-2">
            <li><a>{{ $comp->email }}</a></li>
        </div>
    @endforeach
    </ul>
@endsection