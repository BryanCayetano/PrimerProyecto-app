<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class crud_productos_controller extends Controller
{
    public function insert_category(Request $request) {

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'category_id' => 'required',
        ]);
        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->category_id = $request->category_id;
        $product->save();
        
        return response()->json([
            "status" => 1,
            "msg" => "¡Registro de producto exitoso!",
        ]);

    }

    public function delete(Request $request){
        $product = new Product();
        $product->id = $request->id;
        if ($product = Product::find($product)){

            Request::delete();
        }
    }
}
