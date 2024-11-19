<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CartController extends Controller
{
    public function index(Request $request): View
    {
    
        $products = Product::all();

        $cartProducts = [];
        $cartProductData = $request->session()->get('cart_product_data');
        if ($cartProductData) {
            foreach ($products as $product) {
                if (in_array($product->id, array_keys($cartProductData))) {
                    $cartProducts[] = $product;
                }
            }
        }

        $viewData = [];
        $viewData['title'] = 'Cart - BikeTrek';
        $viewData['subtitle'] = 'Cart';
        $viewData['products'] = $products;
        $viewData['cartProducts'] = $cartProducts;

        return view('cart.index')->with('viewData', $viewData);
    }

    public function add(string $id, Request $request): RedirectResponse
    {

        $product = Product::findOrFail($id);

        if ($product->stock > 0) {
            $cartProductData = $request->session()->get('cart_product_data', []);
            $cartProductData[$id] = $id;
            $request->session()->put('cart_product_data', $cartProductData);

            return back()->with('success', 'Producto añadido al carrito');
        }

        return back()->with('error', 'Producto sin stock disponible');
    }

    public function removeAll(Request $request): RedirectResponse
    {
        $request->session()->forget('cart_product_data');

        return back()->with('success', 'Todos los productos fueron removidos del carrito');
    }
}
