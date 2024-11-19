@extends('layouts.admin')
@section("title", $viewData["title"])

@section('content')
<div class="container">
    <h1>Create Product</h1>

    <form method="POST" action="{{ route('admin.product.save') }}" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="name">Name of the product</label>
            <input type="text" id="name" name="name" class="form-control" required>
        </div>
        <br/>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description" name="description" class="form-control"></textarea>
        </div>
        <br/>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" step="0.01" id="price" name="price" class="form-control" required>
        </div>
        <br/>
        <div class="form-group">
            <label for="stock">Stock quantity</label>
            <input type="number" id="stock" name="stock" class="form-control" required>
        </div>
        <br/>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" id="image" name="image" class="form-control" required>
        </div>
        <br/>
        <div class="form-group">
            <label for="brand">Brand</label>
            <input type="text" id="brand" name="brand" class="form-control" required>
        </div>
        <br/>
        <div class="form-group">
            <label for="type">Type</label>
            <input type="text" id="type" name="type" class="form-control" required>
        </div>
        <br/>
        <div class="form-group">
            <label for="color">Color</label>
            <input type="text" id="color" name="color" class="form-control" required>
        </div>
        <br/>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection
