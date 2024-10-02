<!-- resources/views/dashboard.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Bienvenido, {{ Auth::user()->name }}!</h2>
    <p>Has iniciado sesión correctamente.</p>
    <a href="{{ route('logout') }}" class="btn btn-danger" 
        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        Cerrar Sesión
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</div>
@endsection
