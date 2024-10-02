@extends('layouts.app')
@section("title", $viewData["title"])

@section('content')
<div class="container">
    <h1>Crear Producto</h1>

    <form method="POST" action="{{ route('product.save') }}" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="name">Nombre del Producto</label>
            <input type="text" id="name" name="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="description">Descripción</label>
            <textarea id="description" name="description" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <label for="price">Precio</label>
            <input type="number" step="0.01" id="price" name="price" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="stock">Cantidad en stock</label>
            <input type="number" id="stock" name="stock" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="image">Imagen del Producto</label>
            <input type="file" id="image" name="image" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="brand">Marca</label>
            <input type="text" id="brand" name="brand" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="type">Tipo</label>
            <input type="text" id="type" name="type" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="color">Color</label>
            <input type="text" id="color" name="color" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Crear Producto</button>
    </form>
</div>
@endsection
