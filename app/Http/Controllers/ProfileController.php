<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EducationLevel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index(){
        return view('profile/index', [
            "title" => "Profile",
            "user" => Auth::user(),
            "educations" => EducationLevel::where('id', Auth::user()->education_level_id)->first(),
        ]);
    }

    public function edit_profile()
    {
        return view('profile/edit_profile', [
            "title" => "Edit Profile",
            "educationLevels" => EducationLevel::all(),
            "user" => Auth::user(),
        ]);

        $user = Auth::user();
        $educations = EducationLevel::all();
        return view('edit_profile', compact('user', 'educations'));
    }

    public function update_profile(Request $request)
    {
        $user = Auth::user();
        $user = Auth()->user();

        $request->validate([
            // 'fotoprofile' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'telp' => 'required|string|max:255',
            'about' => 'nullable|string',
            'education_level_id' => 'required|exists:education_levels,id',
            'tanggal_lahir' => 'required|date',
            'cv' => 'nullable|file|mimes:pdf|max:2048',
        ]);


        $user->name = $request->name;
        $user->alamat = $request->alamat;
        $user->telp = $request->telp;
        $user->about = $request->about;
        $user->education_level_id = $request->education_level_id;
        $user->tanggal_lahir = $request->tanggal_lahir;


        // if ($request->hasFile('fotoprofile')) {
        //     $filePath = $request->file('fotoprofile')->store('profile_pictures', 'public');
        //     $user->fotoprofile = '/storage/' . $filePath;
        // }

        if ($request->hasFile('cv')) {
            $cvPath = $request->file('cv')->store('cvs', 'public');
            $user->pdf = $cvPath; // Store hanya path relatif, cukup 'cvs/filename.pdf'
        }

        $user->save(); // Save the user

        return redirect('/profile')->with('success', 'Profile updated successfully!');
    }
}
