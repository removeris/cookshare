<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\Ingredient;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = $request->get('keyword');

        if(isset($query)) {
            $recipes = Recipe::where('title', 'LIKE', "%$query%")->get();
        } else {
            $recipes = Recipe::all();
        }

        return view('recipes.index', ['recipes' => $recipes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('recipes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'instruction' => 'required',
            'ingredientName' => 'required|array|min:1',
            'ingredientName.*' => 'required|string',
            'ingredientQuantity' => 'required|array',
            'ingredientQuantity.*' => 'required|string',
            'measurementUnit' => 'required|array',
            'measurementUnit.*' => 'required|string',
            'image' => 'required',
        ]);

        $recipe = new Recipe();

        $recipe->title = $request->input('title');
        $recipe->description = $request->input('description');
        $recipe->user_id = Auth::user()->id;
        $recipe->img_path = $request->file('image')->store('images', ['disk' => 'public']);
        
        foreach($request->input('instruction') as $instruction) {
            $recipe->instructions = $recipe->instructions . $instruction . ';';
        }
        
        $ingredientNames = $request->input('ingredientName');
        $ingredientQuantity = $request->input('ingredientQuantity');
        $ingredientUnits = $request->input('measurementUnit');

        $recipe->save();

        $ingredients = [];

        for($i = 0; $i < count($ingredientNames); $i++) {

            $ingredient = Ingredient::firstOrCreate([
                'name' => $ingredientNames[$i]
            ]);

            $ingredients[$ingredient->id] = [
                'quantity' => $ingredientQuantity[$i],
                'unit' => $ingredientUnits[$i]
            ];
        }

        $recipe->ingredients()->syncWithoutDetaching($ingredients);

        return redirect()->route('recipes.show', ['recipe' => $recipe->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $recipe = Recipe::with('user')->find($id);
     
        if(!isset($recipe)) {
            return redirect()->route('index');
        }

        return view('recipes.show', ['recipe' => Recipe::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $recipe = Recipe::with('user')->find($id);

        if(Auth::user()->id == $recipe->user->id) {
            return view('recipes.edit', ['recipe' => $recipe]);
        } else {
            return redirect()->route('recipes.index');
        }

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'instruction' => 'required',
            'ingredientName' => 'required|array|min:1',
            'ingredientName.*' => 'required|string',
            'ingredientQuantity' => 'required|array',
            'ingredientQuantity.*' => 'required|string',
            'measurementUnit' => 'required|array',
            'measurementUnit.*' => 'required|string',
        ]);

        $recipe = Recipe::find($id);
        $recipe->title = $request->input('title');
        $recipe->description = $request->input('description');
        $recipe->user_id = Auth::user()->id;
        
        if(isset($request->image)) {
            $recipe->img_path = $request->file('image')->store('images', ['disk' => 'public']);
        }

        $instructions = "";

        foreach($request->input('instruction') as $instruction) {
            $instructions = $instructions . $instruction . ';';
        }
        
        $recipe->instructions = $instructions;

        $ingredientNames = $request->input('ingredientName');
        $ingredientQuantity = $request->input('ingredientQuantity');
        $ingredientUnits = $request->input('measurementUnit');

        $recipe->update();

        $ingredients = [];

        for($i = 0; $i < count($ingredientNames); $i++) {

            $ingredient = Ingredient::firstOrCreate([
                'name' => $ingredientNames[$i]
            ]);

            $ingredients[$ingredient->id] = [
                'quantity' => $ingredientQuantity[$i],
                'unit' => $ingredientUnits[$i]
            ];
        }

        $recipe->ingredients()->sync($ingredients);

        return redirect()->route('recipes.show', ['recipe' => $recipe->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        error_log('Hit destroy');
    }

    public function userRecipes(string $userId) {
        if($userId == 'currentUser') {
            $userId = Auth::user()->id;
        }
        $recipes = Recipe::with('user')->where('user_id', $userId)->get();

        return view('recipes.user', ['recipes' => $recipes]);
    }
}
