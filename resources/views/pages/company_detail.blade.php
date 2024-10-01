@extends('layouts/layout')

@section('content')
    <ul>
        <div class="shadow-md bg-white p-4 rounded-lg"> 
            <li class="font-medium text-3xl">{{ $company->company_name }}</li> <hr class="my-2">
            <li><a class="text-slate-500">Focused on {{ $company->focus }}</a></li>
            <li><a class="text-slate-500">Contact : {{ $company->email }}</a></li>
        </div>
    </ul>
    <div class="flex p-4 justify-center"><h1 class="text-3xl">Internship List</h1></div>
    <div>
        @include('layouts/internship_list')
        </ul>
    </div>
@endsection