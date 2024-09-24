<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;

// routing
// home
Route::get('/', [PagesController::class, 'index']);

// internship
Route::get('/internship', [PagesController::class, 'internship']);
Route::get('/internship/{slug}', [PagesController::class, 'internship_detail']);

// network
Route::get('/mynetwork', [PagesController::class, 'mynetwork']);

// message
Route::get('/message', [PagesController::class, 'message']);

// profile
Route::get('/profile', [PagesController::class, 'profile']);