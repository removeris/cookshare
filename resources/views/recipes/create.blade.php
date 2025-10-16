@extends('layouts.base')

@section('title', 'Create Recipe')

@push('styles')
    @vite('resources/css/pages/recipe/create.css')
@endpush

@push('scripts')
    @vite('resources/js/recipe.js')
@endpush

@section('content')

    <div class="creation-container">
        <h2>New Recipe</h2>
        <form method="post" enctype="multipart/form-data" action="{{ route('recipes.store') }}">
            @csrf
            <div class="wrapper">
                <div class="text-input-wrapper">
                    <label for="title">Recipe title</label><br>
                    <input type="text" name="title" placeholder="Title"><br>
            
                    <label for="description">Recipe description</label><br>
                    <textarea name="description" placeholder="Describe your recipe, why is it cool?"></textarea><br>
                </div>
                <input type="file" name="image">
            </div>

            <label for="ingredients">Ingredient list</label>
            <ul id="ingredients" name="ingredient-list">
                <li>
                    <input type="text" placeholder="Product" name="ingredientName[]">
                    <input type="number" placeholder="Quantity" name="ingredientQuantity[]">
                    <input type="text" placeholder="Units" name="measurementUnit[]">
                </li>
            </ul>
            <button id="add-ingredient" onclick="createNewIngredient()" type="button">Add New Ingredient</button><br>
    
            <label for="instructions">Instructions</label>
            <ol id="instructions"></ol>
            <button id="add-instruction" type="button" onclick="createNewInstruction()">Add New Step</button><br>
    
            <input type="submit" value="Save recipe">
        </form>
    </div>


@endsection