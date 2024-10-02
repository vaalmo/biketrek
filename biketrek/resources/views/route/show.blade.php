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
Collapse
index.blade.php
1 KB
@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="row g-0"> 
    <div class="col-md-4"> 
      <img src="{{ asset('/img/'.$viewData["route"]->getImage()) }}" class="img-fluid rounded-start"> 
    </div> 
    <div class="col-md-8"> 
      <div class="card-body"> 
        <h5 class="card-title"> 
          {{ $viewData["route"]->getName() }} ({{ $viewData["route"]->getLocation() }}) 
        </h5>         
        <p class="card-text">{{ $viewData["route"]->getDescription() }}</p>
        <p class="card-text">{{ $viewData["route"]->getStartPoint() }}</p>
        <p class="card-text">{{ $viewData["route"]->getFinalPoint() }}</p>
        <p class="card-text">{{ $viewData["route"]->getScore() }}</p>
        <p class="card-text">{{ $viewData["route"]->getTime() }}</p>


        <form action="{{ route('route.delete', $viewData["route"]->getId())}}" method="POST"> 
          @csrf       
          @method('DELETE') 
          <button class="btn btn-danger"> 
            <h5>borrar</h5>
          </button> 
        </form>
</div> 
</div> 
</div> 
@endsection
