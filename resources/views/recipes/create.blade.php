@extends('layouts.base')

@section('title', 'Create Recipe')

<style>

    input:-webkit-autofill,
    input:-webkit-autofill:hover, 
    input:-webkit-autofill:focus, 
    input:-webkit-autofill:active {
    -webkit-box-shadow: 0 0 0 30px #E6D5B8 inset !important;
    }

    .creation-container {
        background-color: #E6D5B8;
        padding: 40px 30px;
        margin: auto;
        width: 60%;
        border-radius: 15px;
        border: 1px solid transparent;
    }

    h2 {
        text-align: center;
    }

    form {
        display: flex;
        flex-direction: column;
    }

    form input[type="text"],
    form textarea {
        width: 30%;
        background-color: transparent;
        border: 1px solid #F0A500;
        border-radius: 5px;
        padding: 5px 10px;
    }

    form > textarea {
        height: 100px;
        resize: none;
    }

    #ingredients {
        display: flex;
        flex-direction: column;
        gap: 5px;
        margin: 10px 0px;
        list-style: none;
    }

    #ingredients li {
        display: flex;
        gap: 10px;
    }

    #ingredients li input {
        padding: 5px 10px;
        border: 1px solid #F0A500;
        border-radius: 5px;
        background-color: transparent;
        font-size: 1em;
        width: 200px;
    }
    
    input::placeholder,
    textarea::placeholder {
        color: #E45826;
    }

    button {
        padding: 10px 15px;
        width: fit-content;
        border: 1px solid #F0A500;
        border-radius: 10px;
        background-color: #F0A500;
        transition: background-color 0.15s ease-in-out;
        text-align: center;
        color: white;
    }

    button:hover {
        background-color: hsla(41, 100%, 56%, 1.00);
        cursor: pointer;
    }

    button::before {
        content: "+";
        font-size: 2em;
        margin-right: 10px;
    }

    input[type="submit"] {
        width: fit-content;
        align-self: center;
        padding: 10px 15px;
        border: 1px solid transparent;
        border-radius: 5px;
        background-color: #E45826;
        color: white;
    }

    input[type="submit"]:hover {
        background-color: hsla(16, 78%, 57%, 1.00);
        cursor: pointer;
    }

    #instructions {
        display: flex;
        flex-direction: column;
    }

    #instructions textarea {
        height: 70px;
        width: 40%;
        resize: none;
    }

    .wrapper {
        flex: 1;
        display: flex;
        width: 100%;
        align-items: center;
    }

    .wrapper img,
    .wrapper .text-input-wrapper {
        flex: 1;
    }
</style>

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