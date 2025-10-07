@extends('layouts.base')

@section('title', 'CookShare | Login')

<head>
    <style>
        form {
            margin-top: 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 10px;
        }

        form * {
            width: 40%;
            padding: 10px 15px;
            border: 1px solid lightgray;
            border-radius: 5px;
            font-size: 20px;
        }

        button {
            background-color: black;
            color: white;
            cursor: pointer;
        }
    </style>
</head>

@section('content')

<form method="post" action="{{ route('login') }}">
    @csrf
    <input type="email" name="email" placeholder="Email">
    <input type="password" name="password" placeholder="Password">
    <button type="submit">Log In</button>
</form>
@endsection


