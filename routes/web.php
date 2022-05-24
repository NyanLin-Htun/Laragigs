<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
use App\Models\Listing;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|https://www.youtube.com/watch?v=G3e-cpL7ofc
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [ListingController::class, 'index']);
// create Post
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');
// Store Listing Date
Route::post('/listings', [ListingController::class, 'store'])->middleware('auth');
//Show Edit form
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');
//Update Listing 
Route::put('/listings/{listing}/update', [ListingController::class, 'update'])->middleware('auth');
//Delete Listing 
Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])->middleware('auth');
//Manage Listing
Route::get('/listings/manage', [ListingController::class, 'manage'])->middleware('auth');
// Show Single Listing
Route::get('/show/{listing}', [ListingController::class, 'show']);
//Show Register/Create form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');
// Create User
Route::post('/users', [UserController::class, 'store']);
//Log User Out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');
// Show Login Form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');
//Authenticate User
Route::post('/users/authenticate', [UserController::class, 'authenticate']);






