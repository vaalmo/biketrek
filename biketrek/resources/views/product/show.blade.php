@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
@php
  $product = $viewData['product'];
@endphp
<div class="card mb-3">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="{{ asset('/storage/'.$product->getImage()) }}" class="img-fluid rounded-start" alt="{{ $product->getName() }}">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">
           {{ $product->getName() }}
        </h5>
        <p class="card-text">{{ $product->getDescription() }}</p>
        <p class="card-text"><strong>Price:</strong> ${{ number_format($product->getPrice(), 2) }}</p>
        <p class="card-text"><strong>Brand:</strong> {{ $product->getBrand() }}</p>
        <p class="card-text"><strong>Color:</strong> {{ $product->getColor() }}</p>
        <a class="btn btn-dark" href="{{ route('cart.add', ['id'=> $product->getId()]) }}">Add to cart</a>
      </div>
    </div>
  </div>
</div>
@endsection
