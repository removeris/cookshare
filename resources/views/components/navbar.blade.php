<style>
    .left-container a {
        font-family: 'MonteCarlo', sans-serif;
        font-size: 2em;
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
        font-size: 1em;
    }

    .right-container a:hover{
        text-decoration: underline;
    }

    nav {
        padding: 5px 80px 5px 20px;
        display: flex;
        justify-content: space-between;
    }
</style>

<nav>
    <div class="left-container">
        <a href="{{ URL::route('index') }}">CookShare</a>
    </div>
    <div class="right-container">
        <?php //<a href="{{ URL::route('recipes.search') }}">Search</a> ?>
        <a href="{{ URL::route('recipes.create') }}">Create</a>
        <a href="{{ URL::route('register') }}">Register</a>
        <a href="{{ URL::route('login') }}">Login</a>
    </div>
</nav>