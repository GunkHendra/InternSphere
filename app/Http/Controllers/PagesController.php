<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Company;
use App\Models\Appliance;
use App\Models\Education;
use App\Models\Internship;
use App\Models\Requirement;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\EducationLevel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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
            "isApplied" => Appliance::where('internship_id', $internship->id)->where('user_id', Auth::id())->first(),
        ]);
    }

    public function apply(Internship $internship){
        if (!Auth::check()) {
            return redirect()->back()->with('error', 'You need to be logged in to apply for an internship.');
        }

        $userId = Auth::id();

        $existingApplication = Appliance::where('internship_id', $internship->id)
            ->where('user_id', $userId)
            ->first();

        if ($existingApplication) {
            return redirect()->back()->with('error', 'You have already applied for this internship.');
        }

        Appliance::create([
            'user_id' => $userId,
            'internship_id' => $internship->id,
        ]);

        return redirect()->back()->with('success', 'Successfully applied for this internship!');
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
        $comp = Company::with(['internship.comments'])
                ->where('id', $company->id)
                ->first();

        $divider = 0;
        $averageRatingHolder = 0;
        foreach ($comp->internship as $intern) {
            $averageRating = $intern->comments->avg('rating');
            $averageRatingHolder += round($averageRating);
            $divider++;
        }

        if ($divider != 0){
            $averageRating = $averageRatingHolder / $divider;
        } else{
            $averageRating = 0;
        }

        return view('pages/company_detail', [
            "title" => "Company",
            "company" => $company,
            "internship" => Internship::where('company_id', $company->id)->with(['company',])->latest()->get(),
            "companyRating" => $averageRating,
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
