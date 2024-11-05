<?php

use App\Models\Internship;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;

// routing
// home
Route::get('/', [PagesController::class, 'index']);

// internship
Route::get('/internship', [PagesController::class, 'internship']);
Route::get('/internship/{internship:slug}', [PagesController::class, 'internship_detail']);

Route::post('/internship/apply/{internship:id}', [PagesController::class, 'apply'])->middleware('auth');

// company
Route::get('/company', [PagesController::class, 'company']);
Route::get('/company/{company:slug}', [PagesController::class, 'company_detail']);

// network
Route::get('/mynetwork', [PagesController::class, 'mynetwork']);

// message
Route::get('/message', [PagesController::class, 'message']);
Route::get('/message_detail', [PagesController::class, 'message_detail']);

// profile
Route::get('/profile', [ProfileController::class, 'index'])->name('profile')->middleware('auth');
Route::get('/edit_profile', [ProfileController::class, 'edit_profile'])->name('edit_profile')->middleware('auth');
Route::post('/edit_profile', [ProfileController::class, 'update_profile'])->name('update_profile')->middleware('auth');

// login register
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

// logout
Route::post('/logout', [LoginController::class, 'logout']);


Route::get('/message_detail', [PagesController::class, 'message_detail']);

// about
Route::get('/about', [PagesController::class, 'about']);
