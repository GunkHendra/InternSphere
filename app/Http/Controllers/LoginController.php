<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmailJob;
use App\Mail\SendOtpEmail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rules\Password;

class LoginController extends Controller
{
    public function index(){
        return view('login/index', [
            "title" => "Login"
        ]);
    }

    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email:dns'],
            'password' => ['required', 'min:8'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/profile');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

     // Menampilkan form lupa password
     public function showForgotPasswordForm()
    {
        return view('login.lupa_password', [
            'title' => 'Forgot Password',
        ]);
    }

    // Mengirimkan OTP ke email
    public function sendOtp(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'email', 'exists:users,email'],
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->with('error', 'Email address not found.');
        }

        // Generate OTP
        $otp = rand(100000, 999999);

        // Save OTP to session
        Session::put('otp', $otp);
        Session::put('email', $request->email);

        // Send OTP to email
        Mail::raw("Your OTP is: $otp", function ($message) use ($request) {
            $message->to($request->email)
                    ->subject('Password Reset OTP');
        });

        return redirect('/verifyOtp')->with('success', 'OTP sent to your email.');
    }

    public function showVerifyOtpForm()
    {
        return view('login.otp', [
            'title' => 'Enter OTP',
        ]);
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => ['required', 'numeric'],
        ]);

        $otp = Session::get('otp');

        if ($request->otp != $otp) {
            return back()->with('error', 'Invalid OTP.');
        }

        return redirect('/resetPasswordForm')->with('success', 'OTP verified. You can reset your password.');
    }

    public function showResetPasswordForm()
    {
        if (!Session::has('email') || !Session::has('otp')) {
            return redirect('/forgotPassword')->with('error', 'Session expired. Please request a new OTP.');
        }

        return view('login.reset_Password', [
            'title' => 'Reset Password',
        ]);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'password' => ['required', 'confirmed', 'min:8'], // Validasi password
        ]);

        $email = Session::get('email');
        $user = User::where('email', $email)->first();

        if (!$user) {
            return back()->with('error', 'Email address not found.');
        }

        // Update password
        $user->password = bcrypt($request->password);
        $user->save();

        // Hapus session
        Session::forget('otp');
        Session::forget('email');

        return redirect('/login')->with('success', 'Password successfully changed! You can log in now.');
    }

}
