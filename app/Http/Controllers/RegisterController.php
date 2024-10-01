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
            "title" => "Register",
            "education" => EducationLevel::all()
        ]);
    }

    public function store(Request $request){
        $validated = $request->validate([
            'name' => ['required'],
            'education_level_id' => ['required'],
            'emaild' => ['required', 'unique:users,email', 'email:dns'],
            'password' => ['required', 'min:8'],
        ]);

        dd($validated);
        // User::create($validated);
    }
}
