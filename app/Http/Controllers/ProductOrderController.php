<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductOrderController extends Controller
{
    public function lowStock() {
        // $products = Product::where('amount','<',15)->get();
        $products = Product::low()->get();

        return view('products.low-stock',compact('products'));
    }

    public function outOfStock() {
        // $products = Product::where('amount',0)->get();
        $products = Product::out()->get();

        return view('products.out-of-stock',compact('products'));
    }

    public function searchPrice(Request $request) {
        $request->validate([
            'operator' => 'required|string',
            'price' => 'required|numeric',
        ]);

        $products = Product::price($request->price,$request->operator)->get();

        return view('products.search',compact('products'));
    }

    public function trash() {
        $products = Product::onlyTrashed()->get();

        return view('products.trash',compact('products'));
    }

    public function restore($id) {
        $product = Product::where('id',$id)->onlyTrashed()->first();

        $product->restore();

        return redirect()->route('product.index')->with('message','กู้คืนสินค้า ' . $product->product_name . ' สำเร็จ');
    }

    public function delete($id) {
        $product = Product::where('id',$id)->onlyTrashed()->first();

        $product->forceDelete();

        return redirect()->route('product.index')->with('message','ลบสินค้าสำเร็จ');
    }

}
