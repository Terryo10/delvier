<?php

namespace App\Http\Controllers;

use App\product;

class ApiController extends Controller
{
    public function products()
    {
        $products = product::all();
        return response()->json([
            'success' => true,
            'products' => $products,
        ]);

    }
}
