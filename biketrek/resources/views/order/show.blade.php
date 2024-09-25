@extends('layouts.app')

@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])

@section('content')
<div class="card mb-3">
  <div class="row g-0">
    <div class="col-md-12">
      <div class="card-body">
        <h5 class="card-title">
           Order #{{ $viewData["order"]["id"] }}
        </h5>
        <p class="card-text">Order date: {{ $viewData["order"]["created_at"] }}</p>
        <p class="card-text">Total: ${{ $viewData["order"]["total"] }}</p>
        // ...
      </div>
    </div>
  </div>
</div>
@endsection