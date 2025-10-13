<style>
    .card {
        display: flex;
        flex-direction: column;
        border: 5px solid transparent;
        border-left: none;
        border-top: none;
        width: 200px;
        z-index: 3;
    }

    .card-img {
        width: 200px;
        height: 200px;
        filter: brightness(80%);
    }

    .data {
        display: flex;
        flex-direction: column;
        padding: 10px;
    }

    h3 {
        color: #F0A500;
        line-height: 1.5em;
        font-size: 1.5em;
        margin-bottom: 12px;
    }

    p {
        color: white;
        line-height: 1.25em;
    }

    h4 {
        color: hsla(0, 0%, 65%, 1.00);
        align-self: flex-end;
        line-height: 2em;
    }

    .card:hover {
        border: 5px solid #F0A500;
        border-left: none;
        border-top: none;
        .card-img {
            filter: brightness(100%);
        }
    }
</style>

<div class="card">
    <img class="card-img" src="{{ asset('/storage/'.$recipe->img_path) }}">
    <div class="data">
        <h3>{{ $recipe->title }}</h2>
        <p>{{ $recipe->description }}</p>
        <h4>{{ $recipe->user->name }}</h4>
    </div>
</div>