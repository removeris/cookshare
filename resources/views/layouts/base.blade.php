<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Doto:wght@100..900&family=MonteCarlo&display=swap');

        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        .left-container a {
            font-family: 'MonteCarlo', sans-serif;
            text-decoration: none;
            color: black;
            font-size: 60px;
        }

        nav {
            padding: 10px 30px;
            display: flex;
            justify-content: space-between;
        }
    </style>
</head>
<body>
    <nav>
        <div class="left-container">
            <a href="{{ URL::route('recipes.index') }}">CookShare</a>
        </div>
        <div class="right-container">
            <a href="{{ URL::route('recipes.search') }}">Search</a>
            <a href="{{ URL::route('recipes.create') }}">Create</a>
        </div>
    </nav>
    <div>
        @yield('content')
    </div>
</body>
</html>