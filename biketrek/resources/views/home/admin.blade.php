@extends('layouts.app') 
@section('title', 'Home Page - BikeTrek') 
@section('content') 
<div class="text-center"> 
    Welcome to the BikeTrek Admin Dashboard
</div> 
<div class="text-center"> 
    Manage your products, orders and users here! 
    <a href="{{ route('product.create')}}"class="btn bg-primary text-white}}">create product </a>
</div> 
@endsection