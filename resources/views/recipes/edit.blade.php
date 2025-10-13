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
        transition: background-color 0.15s ease-in-out;
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

    .wrapper
    {
        display: flex;
        width: 100%;
        align-items: center;
    }

    .img-wrapper {
        display: flex;
        flex-direction: column;
        flex-grow: 1;   
    }

    .text-input-wrapper {
        display: flex;
        flex-direction: column;
        width: 90%;
    }

    .text-input-wrapper input[type="text"],
    .text-input-wrapper textarea {
        width: 80%;
    }

    input[type="file"] {
        display: none;
    }

    .img-wrapper img {
        width: 100px;
        height: auto;
    }


    .control-buttons {
        display: flex;
        justify-content: center;
        gap: 30px;
    }

    #delete-button {
        width: fit-content;
        align-self: center;
        padding: 10px 15px;
        border: 1px solid transparent;
        border-radius: 5px;
        background-color: gray;
        color: white;
    }

    #delete-button:hover {
        background-color: hsla(0, 0%, 60%, 1.00);
    }

    #delete-button:before {
        content: none;
    }

    .confirmation-box {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(0, 0, 0, 0.6);
        display: none;
        justify-content: center;
        align-items: center;
    }

    .confirm-button-wrapper a {
        text-decoration: none;
    }

    .cancel-button {
        border: 1px solid lightgray;
        background-color: lightgray;
        color: white;
        padding: 5px 10px;
        border-radius: 10px;
    }

    .confirm-button {
        border: 1px solid #E45826;
        background-color: #E45826;
        color: white;
        padding: 5px 10px;
        border-radius: 10px;
    }
</style>

@section('content')

    <script type="text/javascript">

        let modal = false;
        
        function createNewIngredient() {
            const ingredientList = document.getElementById('ingredients');

            const newListItem = document.createElement('li');

            const newButton = document.createElement('button');
            newButton.textContent = "-";
            newButton.onclick = deleteListItem(newButton);

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
            newListItem.appendChild(newButton);

            ingredientList.appendChild(newListItem);
        };

        function createNewInstruction() {
            const instructionList = document.getElementById('instructions');

            const newListItem = document.createElement('li');

            const newButton = document.createElement('button');
            newButton.textContent = "-";

            newButton.onclick = deleteListItem(newButton);
            
            const instruction = document.createElement('textarea');
            instruction.setAttribute('placeholder', 'Add instructions here');
            instruction.setAttribute('name', 'instruction[]');

            newListItem.appendChild(instruction);
            newListItem.appendChild(newButton);

            instructionList.appendChild(newListItem);
        }

        function toggleModal() {

            event.preventDefault();

            modal = !modal;
            if(modal == true) {
                const pageModal = document.getElementsByClassName('confirmation-box')[0];;
                pageModal.style.display = "flex";
            } else {
                const pageModal = document.getElementsByClassName('confirmation-box')[0];
                pageModal.style.display = "none";
            }
        }

        function submitForm() {
            const targetForm = document.getElementById('delete-recipe');

            targetForm.submit();
        }

        function deleteListItem(item) {
            console.log('hello');
            item.parentNode.remove();
        }

    </script>

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
                    <input type="number" placeholder="Quantity" name="ingredientQuantity[]" value="{{ $ingredient->quantity }}">
                    <input type="text" placeholder="Units" name="measurementUnit[]" value="{{ $ingredient->unit }}">
                    <button onclick="event.preventDefault();deleteListItem(this)">-</button>
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
                        <button onclick="event.preventDefault();deleteListItem(this)">-</button>
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
                        <a class="confirm-button" onclick="event.preventDefault();document.forms['delete-recipe'].submit()">Yes, delete</a>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection