@extends('layouts.app')
@section("title", $viewData["title"])
@section("subtitle", $viewData["subtitle"])
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
    <h1>Products in cart</h1>
      <ul>
        @foreach($viewData["cartProducts"] as $key => $product)
          <li>
            Name: {{ $product->getName() }} -
            Price: {{ $product->getPrice() }}
          </li>
        @endforeach
      </ul>
      <a href="{{ route('cart.removeAll') }}">Remove all products from cart</a>
    </div>
  </div>
</div>
@endsection
