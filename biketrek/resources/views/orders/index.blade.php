@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="container">
    <h1>Your Orders</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th># Orden</th>
                    <th>ID</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($viewData["orders"] as $order)
                    <tr>
                        <td>{{ $order->getId() }}</td>
                        <td>${{ number_format($order->getTotal(), 2) }}</td>
                        <td>
                            <a href="{{ route('orders.show', $order->getId()) }}" class="btn btn-primary btn-sm">Ver Detalles</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
</div>
@endsection
