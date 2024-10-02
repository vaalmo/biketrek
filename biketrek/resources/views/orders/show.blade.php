@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles de la Orden #{{ $order->id }}</h1>

    <p><strong>Estado:</strong> {{ $order->status }}</p>
    <p><strong>Dirección de envío:</strong> {{ $order->address }}</p>

    <h2>Productos</h2>
    <ul>
        @foreach($order->products as $product)
            <li>
                {{ $product->name }} - ${{ number_format($product->price, 2) }} x {{ $product->pivot->quantity }}
            </li>
        @endforeach
    </ul>

    <p><strong>Total:</strong> ${{ number_format($order->getTotal(), 2) }}</p>

    <a href="{{ route('orders.index') }}" class="btn btn-primary">Volver a las Órdenes</a>
</div>
@endsection
