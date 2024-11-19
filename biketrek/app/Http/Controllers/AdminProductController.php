<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class AdminProductController extends Controller 
{
    public function create(): View
    {
        $viewData = [];
        $viewData["title"] = "Create product";
        return view('product.create')->with("viewData", $viewData);
    }

    public function save(Request $request)
    {

        Product::validate($request);

        $newProduct = new Product();
        $newProduct->setName($request->input('name'));
        $newProduct->setDescription($request->input('description'));
        $newProduct->setPrice($request->input('price'));
        $newProduct->setStock($request->input('stock'));
        $newProduct->setImage("bike.png");
        $newProduct->setBrand($request->input('brand'));
        $newProduct->setType($request->input('type'));
        $newProduct->setColor($request->input('color'));
        $newProduct->save();

        if ($request->hasFile('image')) {
            $imageName = $newProduct->getId().".".$request->file('image')->extension();
            Storage::disk('public')->put(
                $imageName,
                file_get_contents($request->file('image')->getRealPath())
            );
            $newProduct->setImage($imageName);
            $newProduct->save();
        }


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

        Product::validate($request);

        $product = Product::findOrFail($id);
        $product->setName($request->input('name'));
        $product->setDescription($request->input('description'));
        $product->setPrice($request->input('price'));
        $product->setStock($request->input('stock'));
        $product->setBrand($request->input('brand'));
        $product->setType($request->input('type'));
        $product->setColor($request->input('color'));

        if ($request->hasFile('image')) {
            $imageName = $product->getId().".".$request->file('image')->extension();
            Storage::disk('public')->put(
                $imageName,
                file_get_contents($request->file('image')->getRealPath())
            );
            $product->setImage($imageName);
        }

        $product->save();
        return redirect()->route('product.index')->with('success', 'Producto actualizado correctamente');
    }

    public function delete($id)
    {
        Product::destroy($id);
        return back();
    }
}