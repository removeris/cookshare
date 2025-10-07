@extends('layouts.base')

@section('title', 'CookShare | Register')

<head>
    <style>
        form {
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

<form method="post" action="{{ route('register') }}">
    @csrf
    <input type="text" name="name" placeholder="Name">
    <input type="email" name="email" placeholder="Email">
    <input type="password" name="password" placeholder="Password">
    <button type="submit">Register</button>
</form>
@endsection