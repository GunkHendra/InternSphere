<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EducationLevel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
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
    }

    public function update_profile(Request $request)
    {
        $user = Auth::user();

        $request->validate([
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

        // Handle the cropped profile image if available
        if ($request->filled('fotoprofile')) {
            $dataUri = $request->input('fotoprofile');

            // Separate metadata and image data
            list($type, $data) = explode(';', $dataUri);
            list(, $data) = explode(',', $data); // Just take the base64 data

            // Decode base64 data and save as file
            $imageName = 'profile_' . $user->id . '_' . time() . '.png';
            $imagePath = 'profile_pictures/' . $imageName;
            \Storage::disk('public')->put($imagePath, base64_decode($data));

            // Update the user profile image path
            $user->fotoprofile = $imagePath;
        }

        // Handle CV upload if available
        if ($request->hasFile('cv')) {
            // Remove old CV if it exists
            if ($user->pdf) {
                \Storage::disk('public')->delete($user->pdf);
            }

            // Store the new CV
            $cvPath = $request->file('cv')->store('cvs', 'public');
            $user->pdf = $cvPath;
        }

        $user->save();

        return redirect('/profile')->with('success', 'Profile updated successfully!');
    }

}
