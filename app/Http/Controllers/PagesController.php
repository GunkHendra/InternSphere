<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Education;
use App\Models\Internship;
use App\Models\Requirement;
use Illuminate\Http\Request;
use App\Models\EducationLevel;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function index(){
        return view('pages/index', [
            "title" => "Home",
            "internship" => Internship::with(['company',])->latest()->limit(5)->get()
        ]);
    }

    public function internship(){
        return view('pages/internship', [
            "title" => "Internship",
            "internship" => Internship::with(['company',])->latest()->get()
        ]);
    }

    public function internship_detail(Internship $internship){
        return view('pages/internship_detail', [
            "title" => "Internship",
            "internship" => $internship,
            "requirement" => Requirement::where('internship_id', $internship->id)->first()
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
            "internship" => Internship::where('company_id', $company->id)->with(['company',])->latest()->get()
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
