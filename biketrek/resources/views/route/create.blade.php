@extends('layouts.app')
@section("title", $viewData["title"])
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Create Route</div>
          <div class="card-body">
            @if($errors->any())
            <ul id="errors" class="alert alert-danger list-unstyled">
              @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
            @endif

            <form method="POST" action="{{ route('route.save') }}">
              @csrf
              <input type="text" class="form-control mb-2" placeholder="Enter name" name="name" value="{{ old('name') }}" />
              <input type="text" class="form-control mb-2" placeholder="Enter description" name="description" value="{{ old('description') }}" />
              <input type="text" class="form-control mb-2" placeholder="Enter start point" name="startPoint" value="{{ old('startPoint') }}" />
              <input type="text" class="form-control mb-2" placeholder="Enter final point" name="finalPoint" value="{{ old('finalPoint') }}" />
              <input type="text" class="form-control mb-2" placeholder="Enter score" name="score" value="{{ old('score') }}" />
              <input type="text" class="form-control mb-2" placeholder="Enter location" name="location" value="{{ old('location') }}" />
              <input type="text" class="form-control mb-2" placeholder="Enter time" name="time" value="{{ old('time') }}" />
              <input type="submit" class="btn btn-primary" value="Send" />
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection