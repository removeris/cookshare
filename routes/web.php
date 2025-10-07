<?php

use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\LoginController;

Route::get('/', function() {
    return view('index');
})->name('index');

Route::resource('recipes', RecipeController::class);

Route::post('/login', [LoginController::class, 'authenticate'])->name('login');
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/logout', [LoginController::class, 'logoutUser'])->name('logout');

Route::get('/register', [RegistrationController::class, 'registrationForm'])->name('register');
Route::post('/register', [RegistrationController::class, 'registerNewUser'])->name('register');

/*

Route::prefix('recipes')->name('recipes.')->group(function() {
    
    Route::get('/', function(Request $request) {
        $recipes = $request->session()->get('recipes', []);
        return view('recipes.index', ['recipes' => $recipes]);
    })->name('index');

    Route::get('/', [RecipeController::class, 'index'])->name('index');

    Route::get('/search', function(Request $request) {
        $recipes = $request->session()->get('recipes', []);

        if(isset($_GET['keyword'])) {
            $matchingRecipes = [];

            foreach($recipes as $recipe) {
                if(str_contains(strtoupper($recipe->getTitle()), strtoupper($_GET['keyword']))) {
                    $matchingRecipes[] = $recipe;
                }
            }

            return view('recipes.search', ['recipes' => $matchingRecipes]);
        } else {
            
            return view('recipes.search', ['recipes' => $recipes]);
        }

    })->name('search');

});
*/