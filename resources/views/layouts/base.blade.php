<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Caveat:wght@400..700&family=Doto:wght@100..900&family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=MonteCarlo&display=swap');

        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: 'Josefin Sans';
        }

        body {
            background-color: #1B1A17;
        }
    </style>
</head>
<body>
    @include('components.navbar')
    
    <div>
        @yield('content')
    </div>
    
    @stack('scripts')
</body>
</html>