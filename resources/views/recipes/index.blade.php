@extends('layouts.base')

@section('title', 'Index page')

@section('content')

    @foreach($recipes as $recipe)

        <h4>{{ $recipe->getTitle() }}</h4>
        <p>{{ $recipe->getDescription() }}</p>
        <h5>Ingredients</h5>
        <ul>
            @foreach ($recipe->getIngredients() as $ingredient)
                <li>{{ $ingredient->getName() }} {{ $ingredient->getQuantity() }} {{ $ingredient->getUnits() }}</li> 
            @endforeach
        </ul>
        <h5>Instructions</h5>
        <ol>
            @foreach ($recipe->getInstructions() as $instruction)
                <li>{{ $instruction }}</li> 
            @endforeach
        </ol>

    @endforeach
@endsection
