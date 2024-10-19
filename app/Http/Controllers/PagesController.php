<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Company;
use App\Models\Education;
use App\Models\Internship;
use App\Models\Requirement;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\EducationLevel;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function index(){
        return view('pages/index', [
            "title" => "Home",
            "internship" => Internship::with(['company',])->latest()->limit(9)->get()
        ]);
    }

    public function internship(){
        $internship = Internship::with(['company'])->latest();

        if (request('search') && Str::lower(request('search')) != "internship"){
            $internship->where('title', 'like', '%' . request('search') . '%')->orWhere('description', 'like', '%' . request('search') . '%');
        }

        return view('pages/internship', [
            "title" => "Internship",
            "internship" => $internship->get(),
            // "requirement" => Requirement::where('internship_id', $internship->id)->first()
        ]);
    }

    public function internship_detail(Internship $internship){
        return view('pages/internship_detail', [
            "title" => "Internship",
            "internship" => $internship,
            "requirement" => Requirement::where('internship_id', $internship->id)->first(),
            "averageRating" => $internship->averageRating(),
            "commentsCount" => $internship->commentsCount(),
            "comments" => $internship->comments()->latest()->get(),
        ]);
    }

    public function company(){
        $company = Company::latest();

        if (request('search')){
            $company->where('company_name', 'like', '%' . request('search') . '%')->orWhere('focus', 'like', '%' . request('search') . '%');
        }

        return view('pages/company', [
            "title" => "Company",
            "company" => $company->get(),
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
            "title" => "Message",
            "company" => Company::latest()->limit(1)->get(),
        ]);
    }

    public function message_detail(){
        return view('pages/message_detail', [
            "title" => "Message",
            "company" => Company::latest()->limit(1)->get(),
        ]);
    }
}
