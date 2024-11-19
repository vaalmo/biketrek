@extends('layouts.app')
@section("title", $viewData["title"])
@section("subtitle", $viewData["subtitle"])
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <h1>Products in Cart</h1>
      <ul>
        @foreach($viewData["cartProducts"] as $key => $product)
          <li>
            Name: {{ $product->getName() }} - 
            Price: ${{ number_format($product->getPrice(), 2) }}
          </li>
        @endforeach
      </ul>
      <p><strong>Total:</strong> ${{ number_format(collect($viewData["cartProducts"])->sum('price'), 2) }}</p>
      <a href="{{ route('orders.create') }}" class="btn btn-dark">Proceed to order</a>
      <a href="{{ route('cart.removeAll') }}" class="btn btn-danger">Remove all products</a>
    </div>
  </div>
</div>
@endsection
