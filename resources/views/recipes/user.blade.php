@extends('layouts.base')

@section('title', 'Recipes | User')

<style>
    .list-container {
        display: flex;
        gap: 30px;
        padding: 30px;
    }
    
    h2 {
        padding: 15px;
        color: #F0A500;
        font-size: 2em;
        text-align: center;
    }
</style>

@section('content')
    
    <h2>My Recipes</h2>

    @isset($recipes)
        <div class="list-container">
            @foreach($recipes as $recipe)
            <a href="{{ route('recipes.show', ['recipe' => $recipe->id]) }}">
                @include('components.recipe_card', ['recipe' => $recipe])
            </a>
            @endforeach
        </div>
    @else
        <p>You have not created any recipes yet..</p>
    @endisset

@endsection