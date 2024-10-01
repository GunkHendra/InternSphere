<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index(){
        return view('register/index', [
            "title" => "Register"
        ]);
    }

    public function store(Request $request){
        $validated = $request->validate([
            'email' => ['required', 'unique:users,email'],
            'password' => ['required', 'min:8']
        ]);

        dd($validated);
    }
}
