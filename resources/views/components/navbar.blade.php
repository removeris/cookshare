<style>
    .left-container a {
        font-family: 'MonteCarlo', sans-serif;
        font-size: 2em;
    }

    .left-container a,
    .right-container a {
        text-decoration: none;
        color: #F0A500;
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
        @guest
        <a href="{{ URL::route('login') }}">Login</a>
        @endguest

        @auth
        <a href="{{ URL::route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit()">Logout</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        @endauth
    </div>
</nav>