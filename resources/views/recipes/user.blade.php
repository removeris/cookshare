@extends('layouts.base')

@section('title', 'Recipes | User')

@section('content')

    @isset($recipes)
        @foreach($recipes as $recipe)
            <a href="{{ route('recipes.show', ['recipe' => $recipe->id]) }}">
                <h2>{{ $recipe->title }}</h2>
                <p>{{ $recipe->description }}</p>
            </a>
        @endforeach
    @else

    @endisset

@endsection