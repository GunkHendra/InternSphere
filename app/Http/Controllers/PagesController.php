<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Internship;
use App\Models\Company;

class PagesController extends Controller
{
    public function index(){
        return view('pages/index', [
            "title" => "Home",
            "internship" => Internship::all()
        ]);
    }

    public function internship(){
        return view('pages/internship', [
            "title" => "Internship",
            "internship" => Internship::all()
        ]);
    }

    public function internship_detail(Internship $internship){
        return view('pages/internship_detail', [
            "title" => "Internship",
            "internship" => $internship
        ]);
    }

    public function company(){
        return view('pages/company', [
            "title" => "Company",
            "company" => Company::all()
        ]);
    }

    public function company_detail(Company $company){
        return view('pages/company_detail', [
            "title" => "Company",
            "company" => $company,
            "internship" => Internship::where('company_id', $company->id)->get()
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
