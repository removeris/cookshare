@extends('layouts.base')

@section('title', 'Create Recipe')

@section('content')

    <script type="text/javascript">
        
        function createNewIngredient() {
            const ingredientList = document.getElementById('ingredients');

            const newListItem = document.createElement('li');

            const ingredientName = document.createElement('input');
            ingredientName.setAttribute('placeholder', 'Product');
            ingredientName.setAttribute('type', 'text');
            ingredientName.setAttribute('name', 'ingredientName[]');

            const ingredientQuantity = document.createElement('input');
            ingredientQuantity.setAttribute('type', 'text')
            ingredientQuantity.setAttribute('placeholder', 'Quantity');
            ingredientQuantity.setAttribute('name', 'ingredientQuantity[]');
            
            const measurementUnit = document.createElement('input')
            measurementUnit.setAttribute('type', 'text');
            measurementUnit.setAttribute('placeholder', 'Units')
            measurementUnit.setAttribute('name', 'measurementUnit[]');

            newListItem.appendChild(ingredientName);
            newListItem.appendChild(ingredientQuantity);
            newListItem.appendChild(measurementUnit);

            ingredientList.appendChild(newListItem);
        };

        function createNewInstruction() {
            const instructionList = document.getElementById('instructions');

            const newListItem = document.createElement('li');
            
            const instruction = document.createElement('textarea');
            instruction.setAttribute('placeholder', 'Add instructions here');
            instruction.setAttribute('name', 'instruction[]');

            newListItem.appendChild(instruction);

            instructionList.appendChild(newListItem);
        }

    </script>

    <form method="post" action="/recipes/create">
        @csrf
        <label for="title">Enter recipe title</label><br>
        <input type="text" name="title"><br>

        <label for="description">Recipe description</label><br>
        <textarea name="description"></textarea><br>

        <label for="ingredients">Ingredient list</label>
        <ul id="ingredients" name="ingredient-list"></ul>
        <button id="add-ingredient" onclick="createNewIngredient()" type="button">Add New Ingredient</button><br>

        <label for="instructions">Instructions</label>
        <ol id="instructions"></ol>
        <button id="add-instruction" type="button" onclick="createNewInstruction()">Add New Step</button><br>

        <input type="submit" value="Save recipe">
    </form>

@endsection