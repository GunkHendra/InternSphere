<?php

use App\Models\Internship;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\RegisterController;

// routing
// home
Route::get('/', [PagesController::class, 'index']);

// internship
Route::get('/internship', [PagesController::class, 'internship']);
Route::get('/internship/{internship:slug}', [PagesController::class, 'internship_detail']);

// company
Route::get('/company', [PagesController::class, 'company']);
Route::get('/company/{company:slug}', [PagesController::class, 'company_detail']);

// network
Route::get('/mynetwork', [PagesController::class, 'mynetwork']);

// message
Route::get('/message', [PagesController::class, 'message']);

// profile
Route::get('/profile', [PagesController::class, 'profile']);

// login register
Route::get('/login', [LoginController::class, 'index']);
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);