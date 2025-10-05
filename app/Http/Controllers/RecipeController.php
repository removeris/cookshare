<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\Ingredient;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return "hello world!";
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
        ]);

        $recipe = new Recipe();
        $recipe->title = $request->input('title');
        $recipe->description = $request->input('description');
        $recipe->instructions = $request->input('instruction')[0];
        
        foreach($request->input('instruction') as $instruction) {
            $recipe->instructions = $recipe->instructions . ' ' . $instruction;
        }
        
        $ingredientNames = $request->input('ingredientName');
        $ingredientQuantity = $request->input('ingredientQuantity');
        $ingredientUnits = $request->input('measurementUnit');
        
        $recipe->save();

        $ingredients = [];

        for($i = 0; $i < count($ingredientNames); $i++) {
            $ingredients[] = [
                'name' => $ingredientNames[$i],
                'quantity' => $ingredientQuantity[$i],
                'unit' => $ingredientUnits[$i],
                'recipe_id' => $recipe->id,
            ];
        }

        $recipe->ingredients()->createMany($ingredients);

        return redirect()->route('recipes.show', ['recipe' => $recipe->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('recipes.show', ['recipe' => Recipe::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
