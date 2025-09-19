<?php

use Illuminate\Support\Facades\Route;

Class Recipe {
    private $title;

    private $description;
    private $ingredients;
    private $dateCreated;
    private $dateModified;

    private $instructions = [];

    public function __construct($title, $ingredients, $instructions) {
        $this->title = $title;
        $this->ingredients = $ingredients;
        $this->instructions = $instructions;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getIngredients() {
        return $this->ingredients;
    }

    public function getInstructions() {
        return $this->instructions;
    }

    public function getDescription() {
        return $this->description;
    }
}

$recipes = [];

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('recipes')->name('recipes.')->group(function() use ( $recipes ) {
    Route::get('/', function() {
        return view('recipes.index');
    })->name('index');

    Route::get('/create', function() use ($recipes) {
        return view('recipes.create', $data = $recipes);
    })->name('');
});
