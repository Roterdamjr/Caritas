@extends('layouts.main')

@section('content')

    <h3>
        @auth
            <p>Bem-vindo, {{ Auth::user()->name }}!</p>
        @endauth

        @guest
            <p>Você não está autenticado. <a href="/login">Login</a></p>
        @endguest
    </h3>

@endsection