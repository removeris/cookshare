<head>
    <style>
        h4 {
            line-height: 1.75em;
        }

        .recipe-img {
            width: 400px;
            height: auto;
        }
    </style>
</head>
<img class="recipe-img" src="{{ asset('/storage/'.$recipe->img_path) }}">
<h4>{{ $recipe->title }}</h4>
<p>{{ $recipe->description }}</p>
<h5>Ingredients</h5>
<ul>
    @foreach ($recipe->ingredients as $ingredient)
        <li>{{ $ingredient->name }} {{ $ingredient->quantity }} {{ $ingredient->unit }}</li> 
    @endforeach
</ul>
<h5>Instructions</h5>
<ol>
    {{ $recipe->instructions }}
</ol>
<h6>{{ $recipe->user->name }}</h6>