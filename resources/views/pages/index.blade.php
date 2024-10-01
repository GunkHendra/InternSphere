@extends('layouts/layout')

@section('content')
    <div class="flex flex-row">
        <div class="basis-1/4 border p-4 mr-4 rounded-lg">
            Profile Space
        </div>
        <div class="basis-3/4">
            @include('layouts/internship_list')
        </div>
    </div>
@endsection