@push('styles')
    @vite('resources/css/components/navbar.css')
@endpush

<nav>
    <div class="left-container">
        <a href="{{ URL::route('index') }}">CookShare</a>
    </div>
    <div class="right-container">
        <?php //<a href="{{ URL::route('recipes.search') }}">Search</a> ?>
        @guest
        <a href="{{ route('recipes.index') }}">Browse</a>
        <a href="{{ route('login') }}">Login</a>
        @endguest
        
        @auth
        <a href="{{ route('recipes.index') }}">Browse</a>
        <a href="{{ route('recipes.user', ['userId' => 'currentUser']) }}">My Recipes</a>
        <a href="{{ route('recipes.create') }}">Create</a>
        <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit()">Logout</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        @endauth
    </div>
</nav>