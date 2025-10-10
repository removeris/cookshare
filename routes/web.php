<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegistrationController;
use App\Http\Middleware\UserAuth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecipeController;

Route::get('/', function() {
    return view('index');
})->name('index');

//Route::resource('recipes', RecipeController::class);


Route::middleware(UserAuth::class)->group(function() {
    Route::resource('recipes', RecipeController::class)->except(['index', 'show']);
});
Route::resource('recipes', RecipeController::class)->only(['index', 'show']);


Route::post('/login', [LoginController::class, 'authenticate'])->name('login');
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');
Route::post('/logout', [LoginController::class, 'logoutUser'])->name('logout');

Route::get('/register', [RegistrationController::class, 'registrationForm'])->name('register.form');
Route::post('/register', [RegistrationController::class, 'registerNewUser'])->name('register');