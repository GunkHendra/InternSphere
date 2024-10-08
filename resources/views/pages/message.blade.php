@extends('layouts/layout')

@section('content')
    @if ($company->first() === null)
    <div class="shadow-md bg-white p-4 mb-2 rounded-lg px-6">
        There's nothing to see here yet...
    </div>
    @endif
    <ul class="px-6">
    @foreach ($company as $comp)
    <div class="shadow-md bg-white p-4 mb-2 rounded-lg">
        <li><a href="company/{{ $comp->slug }}" class="font-medium text-3xl">{{ $comp->company_name }}</a></li>
        <li><a class="text-slate-500">Focused on {{ $comp->focus }}</a></li>
        <li><a class="text-slate-500">Contact : {{ $comp->email }}</a></li>
    </div>
    @endforeach
    </ul>
@endsection