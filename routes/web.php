<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

Class Recipe {
    private $id;
    private $title;

    private $description;
    private $ingredients;
    private $dateCreated;
    private $dateModified;

    private $instructions = [];

    public function __construct($title, $description, $id) {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->ingredients = [];
        $this->instructions = [];
        $this->dateCreated = Carbon::now();
    }

    public function getId() {
        return $this->id;
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

    public function addIngredient(Ingredient $ingredient) {
        $this->ingredients[] = $ingredient;
    }

    public function addInstruction($instruction) {
        $this->instructions[] = $instruction;
    }
}

Class Ingredient {
    private $name;
    private $quantity;
    private $units;

    function __construct($name, $quantity, $units) {
        $this->name = $name;
        $this->quantity = $quantity;
        $this->units = $units;
    }

    public function getName() {
        return $this->name;
    }

    public function getQuantity() {
        return $this->quantity;
    }

    public function getUnits() {
        return $this->units;
    }
    
}

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/login', function() {
    return view('login');
})->name('login');

Route::get('/register', function() {
    return view('register');
})->name('register');

Route::prefix('recipes')->name('recipes.')->group(function() {
    
    Route::get('/', function(Request $request) {
        $recipes = $request->session()->get('recipes', []);
        return view('recipes.index', ['recipes' => $recipes]);
    })->name('index');

    Route::get('/create', function() {
        return view('recipes.create');
    })->name('create');

    Route::post('/create', function(Request $request)  {

        $recipes = $request->session()->get('recipes', []);

        $newRecipe = new Recipe($_POST['title'], $_POST['description'], count($recipes));
        
        $ingredientNames = $_POST['ingredientName'];
        $ingredientQuantities = $_POST['ingredientQuantity'];
        $measurementUnits = $_POST['measurementUnit'];

        for ($i = 0; $i < count($ingredientNames); $i++) {
            $ingredient = new Ingredient($ingredientNames[$i], $ingredientQuantities[$i], $measurementUnits[$i]);
            $newRecipe->addIngredient($ingredient);
        }

        $instructions = $_POST['instruction'];

        for($i = 0; $i < count($instructions); $i++) {
            $newRecipe->addInstruction($instructions[$i]);
        }

        $recipes[] = $newRecipe;


        // Using session storage to be able to access the same variable accross redirects
        $request->session()->put('recipes', $recipes);

        return redirect()->route('index');
    })->name('create');

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

    Route::get('/{id}', function(Request $request, $id) {
        $recipes = $request->session()->get('recipes', []);

        abort_if(!isset( $recipes[$id] ), 404);
        return view('recipes.show', ['recipe' => $recipes[$id]]);
    })->name('show');

});
