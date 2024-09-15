@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="row">
  @foreach ($viewData["routes"] as $route)
  <div class="col-md-4 col-lg-3 mb-2">
    <div class="card">
      <img src="https://laravel.com/img/logotype.min.svg" class="card-img-top img-card">
      <div class="card-body text-center">
        <a href="{{ route('route.show', ['id'=> $route["id"]]) }}"
          class="btn bg-primary text-white">{{ $route["name"] }}</a>
      </div>
    </div>
  </div>
  @endforeach
</div>
@endsection
