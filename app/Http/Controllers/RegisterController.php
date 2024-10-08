<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\EducationLevel;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    public function index(){
        return view('register/index', [
            "title" => "Register"
        ]);
    }

    public function store(Request $request){
        $validated = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'unique:users,email', 'email:dns'],
            'password' => ['required', 'min:8'],
        ]);

        User::create($validated);
        return redirect('/login')->with('success', 'Successfully Registered! You may login now.');
    }
}
