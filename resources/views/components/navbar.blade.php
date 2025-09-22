<style>
    .left-container a {
        font-family: 'MonteCarlo', sans-serif;
        font-size: 60px;
    }

    .left-container a,
    .right-container a {
        text-decoration: none;
        color: black;
    }

    .right-container {
        display: flex;
        align-items: center;
        gap: 30px;
    }

    .right-container a {
        font-size: 18px;
    }

    .right-container a:hover{
        text-decoration: underline;
    }

    nav {
        padding: 10px 80px 20px 20px;
        display: flex;
        justify-content: space-between;
    }
</style>

<nav>
        <div class="left-container">
            <a href="{{ URL::route('recipes.index') }}">CookShare</a>
        </div>
        <div class="right-container">
            <a href="{{ URL::route('recipes.search') }}">Search</a>
            <a href="{{ URL::route('recipes.create') }}">Create</a>
            <a href="#">Register</a>
            <a href="#">Login</a>
        </div>
</nav>