@extends('layouts.admin')
@section("title", $viewData["title"])

@section('content')
<div class="container">
    <h1>Editar Producto</h1>

    <form method="POST" action="{{ route('admin.product.update', ['id' => $viewData['product']->id]) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT') 

        <div class="form-group">
            <label for="name">Nombre del Producto</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $viewData['product']->name) }}" required>
        </div>

        <div class="form-group">
            <label for="description">Descripción</label>
            <textarea id="description" name="description" class="form-control">{{ old('description', $viewData['product']->description) }}</textarea>
        </div>

        <div class="form-group">
            <label for="price">Precio</label>
            <input type="number" step="0.01" id="price" name="price" class="form-control" value="{{ old('price', $viewData['product']->price) }}" required>
        </div>

        <div class="form-group">
            <label for="stock">Cantidad en stock</label>
            <input type="number" id="stock" name="stock" class="form-control" value="{{ old('stock', $viewData['product']->stock) }}" required>
        </div>

        <div class="form-group">
            <label for="image">Imagen del Producto</label>
            <input type="file" id="image" name="image" class="form-control">
            <small>Deja este campo vacío si no deseas cambiar la imagen.</small>
        </div>

        <div class="form-group">
            <label for="brand">Marca</label>
            <input type="text" id="brand" name="brand" class="form-control" value="{{ old('brand', $viewData['product']->brand) }}" required>
        </div>

        <div class="form-group">
            <label for="type">Tipo</label>
            <input type="text" id="type" name="type" class="form-control" value="{{ old('type', $viewData['product']->type) }}" required>
        </div>

        <div class="form-group">
            <label for="color">Color</label>
            <input type="text" id="color" name="color" class="form-control" value="{{ old('color', $viewData['product']->color) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Producto</button>
    </form>
</div>
@endsection
