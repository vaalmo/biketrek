<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    public static $products = [
        ["id"=>"1", "name"=>"Mountain Bike", "description"=>"Best mountain bike", "price"=>"1200"],
        ["id"=>"2", "name"=>"Road Bike", "description"=>"Best road bike", "price"=>"1500"],
        ["id"=>"3", "name"=>"Hybrid Bike", "description"=>"Best hybrid bike", "price"=>"1000"],
        ["id"=>"4", "name"=>"Electric Bike", "description"=>"Best electric bike", "price"=>"2500"]
    ];

    public function index(): View
    {
        $viewData = [];
        $viewData["title"] = "Bikes - Biketrek Store";
        $viewData["subtitle"] =  "List of bikes";
        $viewData["products"] = ProductController::$products;
        return view('product.index')->with("viewData", $viewData);
    }

    public function show(string $id) : View
    {
        $viewData = [];
        $product = ProductController::$products[$id-1];
        $viewData["title"] = $product["name"]." - Biketrek Store";
        $viewData["subtitle"] =  $product["name"]." - Product information";
        $viewData["product"] = $product;
        return view('product.show')->with("viewData", $viewData);
    }

    public function create(): View
    {
        $viewData = [];
        $viewData["title"] = "Create bike product";
        return view('product.create')->with("viewData", $viewData);
    }

    public function save(Request $request)
    {
        $request->validate([
            "name" => "required",
            "price" => "required"
        ]);
        dd($request->all());
    }
}
