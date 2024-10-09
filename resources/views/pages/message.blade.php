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
        <li><a href="/message_detail" class="font-medium text-3xl">Google</a></li>
        <hr class="my-2">
        <p>You've Got A New Message!</p>
    </div>
    @endforeach
    </ul>
    <ul class="px-6">
    @foreach ($company as $comp)
    <div class="shadow-md bg-white p-4 mb-2 rounded-lg">
        <li><a href="/message_detail" class="font-medium text-3xl">Facebook</a></li>
        <hr class="my-2">
        <p>You've Got A New Message!</p>
    </div>
    @endforeach
    </ul>
    <ul class="px-6">
    @foreach ($company as $comp)
    <div class="shadow-md bg-white p-4 mb-2 rounded-lg">
        <li><a href="/message_detail" class="font-medium text-3xl">Apple</a></li>
        <hr class="my-2">
        <p>You've Got A New Message!</p>
    </div>
    @endforeach
    </ul>
    <ul class="px-6">
    @foreach ($company as $comp)
    <div class="shadow-md bg-white p-4 mb-2 rounded-lg">
        <li><a href="/message_detail" class="font-medium text-3xl">InternSphere Developers</a></li>
        <hr class="my-2">
        <p>Check Out Our New Updates!</p>
    </div>
    @endforeach
    </ul>
    <ul class="px-6">
    @foreach ($company as $comp)
    <div class="shadow-md bg-white p-4 mb-2 rounded-lg">
        <li><a href="/message_detail" class="font-medium text-3xl">Facebook</a></li>
        <hr class="my-2">
        <p>You've Got A New Message!</p>
    </div>
    @endforeach
    </ul>
    <ul class="px-6">
    @foreach ($company as $comp)
    <div class="shadow-md bg-white p-4 mb-2 rounded-lg">
        <li><a href="/message_detail" class="font-medium text-3xl">Apple</a></li>
        <hr class="my-2">
        <p>You've Got A New Message!</p>
    </div>
    @endforeach
    </ul>  
@endsection