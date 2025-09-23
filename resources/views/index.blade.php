@extends('layouts.base')

@section('title', 'Index page')

<head>
    <style>

        .hero {
            margin-top: -25px;
        }

        img {
            position: relative;
            object-fit: cover;
            object-position: 50% 60%;
            width: 100%;
            height: 250px;
            filter: brightness(35%);
            z-index: 1;
        }

        h3 {
            position: relative;
            text-align: center;
            color: white;
            font-size: 25px;
            z-index: 2;
            top: calc(250px / 2);
            user-select: none;
        }

        h3 span {
            color: orange;
        }
    </style>

</head>

@section('content')
    <div class="hero">
        <h3>A recipe has no soul. <span>You</span>, as the cook, must bring <span>soul</span> to the recipe</h3>
        <img src="https://www.gourmetfoodparlour.com/img/containers/assets/full-width-slider/full-width-slider-tapasselection.jpg/40d6d1da2168cf4fb37f76cc53f00ea3.webp">
    </div>
@endsection
