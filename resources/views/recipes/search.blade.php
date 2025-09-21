@extends('layouts.base')

@section('title', 'CookShare | Search')

<head>
    <style>
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        form {
            width: 35%;
            margin-top: -25px;
            z-index: 1;
        }

        .searchbox-wrapper {
            display: flex;
            padding: 5px 10px;
            border: solid 1px orange;
            border-radius: 20px;
            background-color: white;
        }

        input {
            padding: 10px 20px;
            border: none;
            outline: none;
            width: 100%;
            background-color: transparent;
            color: black;
        }

        .searchbox-wrapper:has(input:focus) {
            border: solid 2px orange;
        }

        img {
            object-fit: cover;
            object-position: 55% 80%;
            width: 100%;
            height: 250px;
            filter: brightness(50%);
            z-index: 9999;
        }

    </style>
</head>

@section('content')


    <img src="https://images.pexels.com/photos/2403392/pexels-photo-2403392.jpeg?cs=srgb&dl=pexels-yente-van-eynde-1263034-2403392.jpg&fm=jpg">

    <div class="container">
        <form method="get" action="/recipes/search">
            <div class="searchbox-wrapper">
                <input type="text" name="keyword" placeholder="Search">
            </div>
        </form>
    </div>
    
    @isset($_GET['keyword'])

        @foreach ($recipes as $recipe)
            <a href="{{ URL::route('recipes.show', ['id' => $recipe->getId()]) }}">{{ $recipe->getTitle() }}</a>
        @endforeach
    @endisset
@endsection