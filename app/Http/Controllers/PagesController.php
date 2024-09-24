<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Internship;

class PagesController extends Controller
{
    public function index(){
        return view('pages/index', [
            "title" => "Home"
        ]);
    }

    public function internship(){
        return view('pages/internship', [
            "title" => "Internship",
            "internship" => Internship::all()
        ]);
    }

    public function internship_detail($slug){
        return view('pages/internship_detail', [
            "title" => "Internship",
            "internship" => Internship::find($slug)
        ]);
    }

    public function mynetwork(){
        return view('pages/mynetwork', [
            "title" => "My Network"
        ]);
    }

    public function message(){
        return view('pages/message', [
            "title" => "Message"
        ]);
    }

    public function profile(){
        return view('pages/profile', [
            "title" => "Profile"
        ]);
    }
}
