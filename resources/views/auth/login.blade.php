@extends('layouts.base')

@section('title', 'CookShare | Login')

<head>
    <style scoped>
        .container {
            max-width: 70%;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 20px;
            border: 1px solid black;
            margin: auto;
            margin-top: 90px;
            overflow: hidden;
            background-color: #E6D5B8;
        }

        form, img {
            flex-grow: 1;
        }

        form {
            padding: 50px;
            display: flex;
            flex-direction: column;
            gap: 10px;
            align-items: center;
            
        }

        h2 {
            line-height: 3em;
            text-align: center;
        }


        input:-webkit-autofill,
        input:-webkit-autofill:hover, 
        input:-webkit-autofill:focus, 
        input:-webkit-autofill:active {
        -webkit-box-shadow: 0 0 0 30px #E6D5B8 inset !important;
        }

        input {
            border: none;
            font-size: 1em;
            line-height: 2em;
            width: 100%;
            padding: 5px 10px;
            background-color: transparent;
        }

        input:focus {
            border: none;
            outline: none;
        }

        .input-fs {
            padding: 5px;
            border-radius: 8px;
            border: 1px solid orange;
        }

        legend {
            font-size: 0.75em;
            padding: 0 5px;
            color: orange;
        }

        button {
            width: 35%;
            padding: 8px 16px;
            border-radius: 5px;
            border: none;
            outline: none;
            background-color: #F0A500;
            color: white;
            font-size: 1em;
            margin: 20px 0;
            transition: background-color 0.15s ease-in-out;
        }

        button:hover {
            background-color: hsla(44, 100%, 55%, 1.00);
            cursor: pointer;
        }

        #link {
            text-decoration: underline;
            color: black;
            font-weight: bold;
        }

        .container img {
            object-fit: cover;
            height: 560px;
            filter: brightness(70%);
        }
    </style>
</head>

@section('content')

<div class="container">
    <img src="https://beverlypress.com/wp-content/uploads/2023/08/Jill-RestaurantNewsFourSeasons-400x500.png">
    <form method="post" action="{{ route('login') }}">
        @csrf
        <h2>Welcome!</h2>

        <fieldset class="input-fs">
            <legend>E-mail</legend>
            <input type="email" name="email" placeholder="Email">
        </fieldset>
        <fieldset class="input-fs">
            <legend>Password</legend>
            <input type="password" name="password" placeholder="Password">
        </fieldset>
        <button type="submit">Log In</button>
        <p>Don't have an account yet? <a id="link" href="{{ URL::route('register.form') }}">Register now!</a></p>
    </form>
</div>
@endsection


