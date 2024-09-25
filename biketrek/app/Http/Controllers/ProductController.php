<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    // Elimina la lista estática de productos ya que los datos provienen de la base de datos

    // Función para mostrar la lista de productos
    public function index(): View
    {
        $viewData = [];
        $viewData["title"] = "Bikes - Biketrek Store";
        $viewData["subtitle"] = "List of bikes";
        // Obtener todos los productos de la base de datos
        $viewData["products"] = Product::all(); 
        return view('product.index')->with("viewData", $viewData);
    }

    // Función para mostrar los detalles de un producto específico
    public function show(string $id): View
    {
        $viewData = [];
        // Obtener el producto por su ID desde la base de datos
        $product = Product::findOrFail($id); 
        $viewData["title"] = $product->name . " - Biketrek Store";
        $viewData["subtitle"] = $product->name . " - Product information";
        $viewData["product"] = $product;
        return view('product.show')->with("viewData", $viewData);
    }

    // Función para mostrar el formulario de creación de productos
    public function create(): View
    {
        $viewData = [];
        $viewData["title"] = "Create product";
        return view('product.create')->with("viewData", $viewData);
    }

    // Función para guardar un nuevo producto en la base de datos
    public function save(Request $request)
    {
        // Validación de los datos del formulario
        $request->validate([
            "name" => "required|string",
            "price" => "required|numeric",
            'description' => 'nullable|string',
            'stock' => 'required|integer|min:0',
        ]);

        // Crear y guardar el nuevo producto en la base de datos
        $product = new Product();
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->stock = $request->input('stock');
        $product->save();

        // Redirigir al índice de productos con un mensaje de éxito
        return redirect()->route('product.index')->with('success', 'Producto guardado correctamente');
    }
}
