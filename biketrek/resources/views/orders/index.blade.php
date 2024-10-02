@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Your Orders</h1>

    @if($orders->isEmpty())
        <p>No tienes órdenes aún.</p>
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th># Orden</th>
                    <th>Dirección de envío</th>
                    <th>Total</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->address }}</td>
                        <td>${{ number_format($order->getTotal(), 2) }}</td>
                        <td>{{ $order->status }}</td>
                        <td>
                            <a href="{{ route('orders.show', $order->id) }}" class="btn btn-primary btn-sm">Ver Detalles</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
