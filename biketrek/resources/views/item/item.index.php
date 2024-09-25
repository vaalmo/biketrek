@extends('layouts.app')
@section('title', $viewData['title']) <!-- Acceso correcto a viewData -->
@section('subtitle', $viewData['subtitle'])
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h1>{{ $viewData['subtitle'] }}</h1>
            <ul>
                @foreach($viewData['items'] as $item)
                    <li>{{ $item['name'] }} - ${{ $item['price'] }}</li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
