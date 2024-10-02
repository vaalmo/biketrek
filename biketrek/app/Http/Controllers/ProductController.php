<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

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
        $validatedData = $request->validate([
            "name" => "required|string",
            "description" => "nullable|string",
            "price" => "required|numeric",
            "stock" => "required|integer|min:0",
            "image" => "required|image|mimes:jpeg,png,jpg,gif|max:2048",
            "brand" => "required|string",
            "type" => "required|string",
            "color" => "required|string",
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        $product = new Product();
        $product->name = $validatedData['name'];
        $product->description = $validatedData['description'];
        $product->price = $validatedData['price'];
        $product->stock = $validatedData['stock'];
        $product->image = $imagePath;
        $product->brand = $validatedData['brand'];
        $product->type = $validatedData['type'];
        $product->color = $validatedData['color'];
        $product->save();

        return redirect()->route('product.index')->with('success', 'Producto guardado correctamente');
    }

    public function edit(string $id): View
    {
        $viewData = [];
        $product = Product::findOrFail($id);
        $viewData["title"] = "Edit product - " . $product->name;
        $viewData["product"] = $product;
        return view('product.edit')->with("viewData", $viewData);
    }

    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            "name" => "required|string",
            "description" => "nullable|string",
            "price" => "required|numeric",
            "stock" => "required|integer|min:0",
            "image" => "nullable|image|mimes:jpeg,png,jpg,gif|max:2048",
            "brand" => "required|string",
            "type" => "required|string",
            "color" => "required|string",
        ]);

        $product = Product::findOrFail($id);

        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $imagePath = $request->file('image')->store('images', 'public');
            $product->image = $imagePath;
        }

        $product->name = $validatedData['name'];
        $product->description = $validatedData['description'];
        $product->price = $validatedData['price'];
        $product->stock = $validatedData['stock'];
        $product->brand = $validatedData['brand'];
        $product->type = $validatedData['type'];
        $product->color = $validatedData['color'];
        $product->save();

        return redirect()->route('product.index')->with('success', 'Producto actualizado correctamente');
    }
}
