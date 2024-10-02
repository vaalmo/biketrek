<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
        // Muestra todas las órdenes
        $orders = Order::all();
        return view('orders.index', compact('orders'));
    }

    public function show($id)
    {
        // Muestra una orden específica
        $order = Order::findOrFail($id);
        return view('orders.show', compact('order'));
    }

    public function create()
    {
        // Muestra el formulario para crear una orden
        return view('orders.create');
    }

    public function store(Request $request)
    {
        // Validación de los datos de entrada
        $validatedData = $request->validate([
            'address' => 'required',
            'cart' => 'required|array',
            'cart.*.product_id' => 'required|exists:products,id',
            'cart.*.quantity' => 'required|integer|min:1',
        ]);

        DB::beginTransaction(); // Inicia una transacción

        try {
            // Crear la orden con los datos del formulario
            $order = Order::create([
                'status' => 'Pendiente', // Estado por defecto
                'address' => $request->address,
            ]);
            
            // Inicializa el total de la orden
            $total = 0;

            // Recorre los productos en el carrito
            foreach ($request->cart as $cartItem) {
                $product = Product::findOrFail($cartItem['product_id']);
                $quantity = $cartItem['quantity'];
                
                // Calcula el total de la orden
                $total += $product->price * $quantity;

                // Asocia los productos a la orden con la cantidad correspondiente
                $order->products()->attach($product->id, ['quantity' => $quantity]);
            }

            // Actualiza el total de la orden
            $order->update(['total' => $total]);

            DB::commit(); // Confirma la transacción

            return redirect()->route('orders.show', $order->id);
        } catch (\Exception $e) {
            DB::rollBack(); // Revierte la transacción si algo falla

            return redirect()->back()->withErrors('Error al crear la orden: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        // Muestra el formulario para editar una orden
        $order = Order::findOrFail($id);
        return view('orders.edit', compact('order'));
    }

    public function update(Request $request, $id)
    {
        // Validación de los datos
        $validatedData = $request->validate([
            'status' => 'required',
            'address' => 'required',
        ]);

        // Actualiza la orden
        $order = Order::findOrFail($id);
        $order->update($validatedData);

        return redirect()->route('orders.index');
    }

    public function destroy($id)
    {
        // Elimina la orden
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->route('orders.index');
    }
}
