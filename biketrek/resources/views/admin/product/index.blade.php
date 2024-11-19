@extends('layouts.admin')
@section('title', $viewData["title"])
@section('content')

<div class="card mb-4"> 
  <div class="card-header"> 
    Create Products 
  </div> 
  <div class="card-body"> 
    @if($errors->any()) 
    <ul class="alert alert-danger list-unstyled"> 
      @foreach($errors->all() as $error) 
      <li>- {{ $error }}</li> 
      @endforeach 
    </ul> 
    @endif 

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
    <br/>
<div class="card">
  <div class="card-header">
    Manage Products
  </div>
  <div class="card-body">
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Name</th>
          <th scope="col">Edit</th>
          <th scope="col">Delete</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($viewData["products"] as $product)
        <tr>
          <td>{{ $product->getId() }}</td>
          <td>{{ $product->getName() }}</td>
          <td>Edit</td>
          <td>Delete</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection