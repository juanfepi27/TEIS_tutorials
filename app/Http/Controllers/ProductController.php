<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ProductController extends Controller
{
    public static $products = [
        ["id"=>"1", "name"=>"TV", "description"=>"Best TV", "price"=>"2000"],
        ["id"=>"2", "name"=>"iPhone", "description"=>"Best iPhone", "price"=>"1500"],
        ["id"=>"3", "name"=>"Chromecast", "description"=>"Best Chromecast", "price"=>"50"],
        ["id"=>"4", "name"=>"Glasses", "description"=>"Best Glasses", "price"=>"25"]
    ];

    public function index(): View
    {
        $viewData = [];
        $viewData["title"] = "Products - Online Store";
        $viewData["subtitle"] =  "List of products";
        $viewData["products"] = ProductController::$products;
        return view('product.index')->with("viewData", $viewData);
    }

    public function show(string $id) : View | RedirectResponse//multiple retorno
    {
        $viewData = [];
        if ((int)$id<=count(ProductController::$products) && (int)$id>0) 
        {
            $product = ProductController::$products[$id-1];//OJO
            //-BÚSQUEDA INEFICIENTE EN CASO DE AGREGAR Y ¡ELIMINAR! PRODUCTOS
            //-POR QUÉ PUEDE restarse un str con un 1??
            $viewData["title"] = $product["name"]." - Online Store";
            $viewData["subtitle"] =  $product["name"]." - Product information";
            $viewData["product"] = $product;
            return view('product.show')->with("viewData", $viewData);
        }else
        {
            return redirect()->route('home.index');
            // return view('home.index');
        }
    }

    public function create(): View
    {
        $viewData = []; //to be sent to the view
        $viewData["title"] = "Create product";

        return view('product.create')->with("viewData",$viewData);
    }

    public function save(Request $request)
    {
        $request->validate([
            "name" => "required",
            "price" => "required|numeric|min:0"
        ]);
        // dd($request->all());
        
        //here will be the code to call the model and save it to the database

        return view('product.confirm')->with("name",$request["name"])->with("price",$request["price"]);
    }

}
