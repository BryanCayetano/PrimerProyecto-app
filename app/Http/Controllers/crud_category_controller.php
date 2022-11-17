<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class crud_category_controller extends Controller
{
    public function insert(Request $request) {

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
        ]);
        
        $Category = new Category();
        $Category->name = $request->name;
        $Category->description = $request->description;
        $Category->save();
        
        return response()->json([
            "status" => 1,
            "msg" => "¡Registro de categoría exitoso!",
        ]);

    }
}
