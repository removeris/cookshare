@extends('layouts.base')

@section('title', 'Create Recipe')

@section('content')

    <script type="text/javascript">

        var count = 0;

        const addIngredient = document.getElementById('add-ingredient');
        const ingredientList = document.getElementById('ingredient-list');


        function createNewIngredient() {

            console.log('Added New Ingredient')

            const newListItem = document.createElement('li');
            const index = document.createElement('span');
            index.innerText = `${count}.`
            count += 1;
            const ingredientName = document.createElement('input');
            const ingredientQuantity = document.createElement('input');

            newListItem.appendChild(index);
            newListItem.appendChild(ingredientName);
            newListItem.appendChild(ingredientQuantity);

            ingredientList.appendChild(newListItem);

        };
    </script>

    <form>
        <label for="title">Enter recipe title</label><br>
        <input type="text" name="title"><br>
        <label for="description">Recipe description</label><br>
        <textarea name="description"></textarea><br>
        <label for="ingredients">Ingredient list</label>
        
        <ul id="ingredient-list">
            <li>Asaqdasds</li>
            <li>basdfasd</li>
        </ul>
        
        <button id="add-ingredient" onclick="createNewIngredient()">Tap to add new ingredient</button>


        


    </form>

@endsection