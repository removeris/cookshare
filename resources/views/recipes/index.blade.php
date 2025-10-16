@extends('layouts.base')

@section('title', 'Recipes | Browse')

@push('styles')
    @vite('resources/css/pages/recipe/index.css')
@endpush

@section('content')

    <img src="https://images.pexels.com/photos/2403392/pexels-photo-2403392.jpeg?cs=srgb&dl=pexels-yente-van-eynde-1263034-2403392.jpg&fm=jpg">


    <div class="container">
        <form method="get" action="{{ route('recipes.index') }}">
            <div class="searchbox-wrapper">
                <input type="text" name="keyword" placeholder="Search">
                <button onclick="submit()">→</button>
            </div>
        </form>
    </div>
    
    <div class="list-container">
        @forelse ($recipes as $recipe)
            <a href="{{ URL::route('recipes.show', ['recipe' => $recipe]) }}">
                @include('components.recipe_card', ['recipe' => $recipe])
            </a>
        @empty
            <p>No recipes were found..</p>
        @endforelse
    </div>
@endsection