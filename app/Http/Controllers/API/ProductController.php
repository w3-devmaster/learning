<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {
        $products = Product::paginate(10);
        $data = [
            'message' => 'found product data ' . $products->count() . ' rows',
            'data' => ProductResource::collection($products),
        ];

        return response()->json($data);
    }
}
