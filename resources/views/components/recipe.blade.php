<head>
    <style>
        * {
            color: white;
        }

        h2 {
            font-size: 2em;
            text-align: center;
        }

        h3 {
            font-size: 1.75em;
            line-height: 2em;
        }

        .recipe-img {
            width: 200px;
            height: 200px;
        }

        .wrapper {
            padding: 50px;
        }

        ul {
            list-style-type: circle;
            padding-left: 20px;
        }

        ol {
            list-style-type: decimal;
            padding-left: 20px;
            margin-bottom: 20px;
        }

        h6 {
            line-height: 2em;
            color: rgba(255, 255, 255, 0.7);
        }

        .container {
            display: flex;
            gap: 30px;
        }

        .subcontainer {
            display: flex;
            flex-direction: column;
        }

        a {
            text-decoration: underline;
        }

    </style>
</head>
<h2>{{ $recipe->title }}</h2>
<div class="wrapper">
    <div class="container">
        <img class="recipe-img" src="{{ asset('/storage/'.$recipe->img_path) }}">
        <div class="subcontainer">
            <h3>Description</h3>
            <p>{{ $recipe->description }}</p>
        </div>
    </div>
    <h3>Ingredients</h3>
    <ul>
        @foreach ($recipe->ingredients as $ingredient)
            <li>{{ $ingredient->name }} {{ $ingredient->quantity }} {{ $ingredient->unit }}</li> 
        @endforeach
    </ul>
    <h3>Instructions</h3>
    <ol>
        <?php $instructions = explode(';', $recipe->instructions) ?>
        @foreach($instructions as $instruction)
            @if($instruction != '')
                <li>{{ $instruction }}</li>
            @endif
        @endforeach
    </ol>
    <h6>Author</h6>
    <a href="{{ url()->route('recipes.user', ['userId' => $recipe->user->id ]) }}">{{ $recipe->user->name }}</a>
</div>