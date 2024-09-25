<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData["title"] = "Bikes - Biketrek Store";
        $viewData["subtitle"] = "List of bikes";
        $viewData["products"] = Product::all(); 
        return view('product.index')->with("viewData", $viewData);
    }

    public function show(string $id): View
    {
        $viewData = [];
        $product = Product::findOrFail($id); 
        $viewData["title"] = $product->name . " - Biketrek Store";
        $viewData["subtitle"] = $product->name . " - Product information";
        $viewData["product"] = $product;
        return view('product.show')->with("viewData", $viewData);
    }

    public function create(): View
    {
        $viewData = [];
        $viewData["title"] = "Create product";
        return view('product.create')->with("viewData", $viewData);
    }
    

    public function save(Request $request)
    {
        $request->validate([
            "name" => "required|string",
            "description" => "nullable|string",
            "price" => "required|numeric",
            "stock" => "required|integer|min:0",
            "image" => "required|string",
            "brand" => "required|string",
            "type" => "required|string",
            "color" => "required|string",
        ]);

        $product = new Product();
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->stock = $request->input('stock');
        $product->image = $request->input('image');
        $product->brand = $request->input('brand');
        $product->type = $request->input('type');
        $product->color = $request->input('color');
        $product->save();

        return redirect()->route('product.index')->with('success', 'Producto guardado correctamente');
    }
}
