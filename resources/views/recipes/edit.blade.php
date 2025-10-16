@extends('layouts.base')

@section('title', 'Create Recipe')

@push('styles')
    @vite('resources/css/pages/recipe/edit.css')
@endpush

@push('scripts')
    @vite('resources/js/recipe.js')
@endpush

@section('content')
    <div class="creation-container">
        <h2>New Recipe</h2>
        <form method="post" enctype="multipart/form-data" action="{{ route('recipes.update', ['recipe' => $recipe]) }}">
            @method('PUT')
            @csrf

            <div class="wrapper">
                <div class="text-input-wrapper">
                    <label for="title">Recipe title</label><br>
                    <input type="text" name="title" placeholder="Title" value="{{ $recipe->title }}"><br>
            
                    <label for="description">Recipe description</label><br>
                    <textarea name="description" placeholder="Describe your recipe, why is it cool?">{{ $recipe->description }}</textarea><br>
                </div>

                <div class="img-wrapper">
                    <img src="{{ asset('/storage/'.$recipe->img_path) }}">
                    <label for="image">Select Image</label>
                    <input id="image" type="file" name="image" value="{{ $recipe->img_path }}">
                </div>
            </div>

            <label for="ingredients">Ingredient list</label>
            <ul id="ingredients" name="ingredient-list">
                @foreach($recipe->ingredients as $ingredient)
                <li>
                    <input type="text" placeholder="Product" name="ingredientName[]" value="{{ $ingredient->name }}">
                    <input type="number" placeholder="Quantity" name="ingredientQuantity[]" value="{{ $ingredient->pivot->quantity }}">
                    <input type="text" placeholder="Units" name="measurementUnit[]" value="{{ $ingredient->pivot->unit }}">
                    <button class="remove" onclick="event.preventDefault();deleteListItem(this)">-</button>
                </li>
                @endforeach
            </ul>
            <button id="add-ingredient" onclick="createNewIngredient()" type="button">Add New Ingredient</button><br>
    
            <label for="instructions">Instructions</label>
            <ol id="instructions">
                <?php $instructions = explode(';', $recipe->instructions); ?>

                @foreach($instructions as $instruction)
                    <li>
                        <textarea name="instruction[]" placeholder="Add instructions here">{{ $instruction }}</textarea>
                        <button class="remove" onclick="event.preventDefault();deleteListItem(this)">-</button>
                    </li>
                @endforeach
            </ol>
            <button id="add-instruction" type="button" onclick="createNewInstruction()">Add New Step</button><br>

            <div class="control-buttons">
                <input type="submit" value="Save recipe">
                <button id="delete-button" onclick="toggleModal()">Delete Recipe</button>
            </div>
        </form>

        <div class="confirmation-box">
            <div style="width: 200px; height: 200px; background-color: white; z-index: 999; display: flex; flex-direction: column; justify-content: space-around; align-items: center; border-radius: 15px">
                <h2>Are you sure?</h2>
                <div class="confirm-button-wrapper">
                    <a class="cancel-button" onclick="toggleModal()">Cancel</a>
                    <form id="delete-recipe" method="post" action="{{ route('recipes.destroy', ['recipe' => $recipe]) }}">
                        @method('DELETE')
                        @csrf
                        <a class="confirm-button" onclick="event.preventDefault();submitForm()">Yes, delete</a>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection