@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="card mb-3">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ3SZk_6fWHKhPS1nx5vkmxjQVL2Z7TRX6qHA&s" class="img-fluid rounded-start" alt="Bike image">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">
           {{ $viewData["product"]["name"] }}
        </h5>
        <p class="card-text">{{ $viewData["product"]["description"] }}</p>
        <p class="card-text"><strong>Price:</strong> ${{ $viewData["product"]["price"] }}</p>
      </div>
    </div>
  </div>
</div>
@endsection
