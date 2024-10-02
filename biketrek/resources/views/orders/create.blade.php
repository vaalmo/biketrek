@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Orden</h1>

    <form method="POST" action="{{ route('orders.store') }}">
        @csrf

        <div class="form-group">
            <label for="address">Dirección de envío</label>
            <input type="text" id="address" name="address" class="form-control" required>
        </div>

        <h2>Productos en el carrito</h2>
        <ul>
            @foreach(session('cart_product_data') as $productId)
                @php
                    $product = \App\Models\Product::find($productId);
                @endphp
                @if ($product && $product->stock > 0)  <!-- Verifica que el producto existe y tiene stock -->
                    <li>
                        {{ $product->name }} - ${{ number_format($product->price, 2) }} (Stock: {{ $product->stock }})
                        <input type="hidden" name="cart[][product_id]" value="{{ $product->id }}">
                        <input type="number" name="cart[][quantity]" value="1" min="1" max="{{ $product->stock }}" required>
                    </li>
                @endif
            @endforeach
        </ul>

        <button type="submit" class="btn btn-primary">Crear Orden</button>
    </form>
</div>
@endsection 
