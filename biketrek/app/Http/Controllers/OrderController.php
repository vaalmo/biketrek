<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Item;
use App\Models\Order;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class OrderController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData["title"] = "Orders - Biketrek Store";
        $viewData["subtitle"] = "List of orders";
        $viewData['orders'] = Order::where('user_id', Auth::id())->get();
        $viewData['success'] = session('viewData.success');

        return view('orders.index')->with('viewData', $viewData);
    }

    public function show(string $id): View|RedirectResponse
    {
        $viewData = [];
        try {
            
            $order = Order::where('user_id', Auth::id())->findOrFail($id);
        } catch (Exception $e) {
            $viewData['objectType'] = 'Order';
            return redirect()->route('error.nonexistent')->with('viewData', $viewData);
        }
        
        $viewData['order'] = $order;
        $viewData['items'] = $order->getItems();

        return view('order.show')->with('viewData', $viewData);
    }

    public function create(Request $request): RedirectResponse
    {
        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('viewData', ['success' => 'Your cart is empty.']);
        }

        $order = new Order;
        $order->setUserId(Auth::id());
        $order->setTotal(0);
        $order->save();

        $totalPrice = 0;
        foreach ($cart as $productId) {
            $product = Product::findOrFail($productId);
            $item = new Item;
            $item->setOrder($order); 
            $item->setProduct($product); 
            $item->setQuantity(1);
            $item->setPrice($product->getPrice()); 
            $item->save();

            $totalPrice += $product->getPrice();
        }

        $order->setTotal($totalPrice);
        $order->save();

        session()->forget('cart');

        return redirect()->route('orders.index')->with('viewData', ['success' => 'Order created successfully!']);
    }
}
