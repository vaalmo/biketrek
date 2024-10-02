@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="card mb-3">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="{{ asset('storage/' . $viewData['product']['image']) }}" class="img-fluid rounded-start" alt="{{ $viewData['product']['name'] }}">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">
           {{ $viewData["product"]["name"] }}
        </h5>
        <p class="card-text">{{ $viewData["product"]["description"] }}</p>
        <p class="card-text"><strong>Price:</strong> ${{ number_format($viewData["product"]["price"], 2) }}</p>
        <a class="btn btn-primary" href="{{ route('cart.add', ['id'=> $viewData["product"]["id"]]) }}">Add to cart</a>
      </div>
    </div>
  </div>
</div>
@endsection
