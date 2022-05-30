<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return response()->json($products, 200);
    }

    public function show($id)
    {
        $product = Product::with('prices')->find($id);

        if (!empty($product)) {
            return response()->json($product, 200);
        } else {
            return response()->json([
                "message" => "Product not found"
            ], 404);
        }
    }
}
