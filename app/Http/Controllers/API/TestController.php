<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function products() {
        $products = Product::all();

        return response()->json($products);
    }
}
