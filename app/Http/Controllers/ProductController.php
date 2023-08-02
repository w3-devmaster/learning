<?php

namespace App\Http\Controllers;

use App\Classes\MyClass;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::paginate(20);

        return view('products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {

       $request->validate([
            'product_name' => 'required|string',
            'description' => 'nullable|string',
            'amount' => 'required|numeric|min:0',
            'price' => 'required|numeric',
            'img.*' => 'nullable|image|mimes:png,jpg,webp',
       ],[
            'product_name.required' => 'กรุณาระบุชื่อสินค้า',
            'amount.required' => 'กรุณาใส่จำนวนสินค้า',
            'price.required' => 'กรุณาใส่ราคา',
            'img.image' => 'กรุณาอัปโหลดไฟล์ภาพเท่านั้น',
            'img.mimes' => 'รองรับเฉพาะไฟล์ png,jpg,webp เท่านั้น',
       ]);



        $product = Product::create($request->all());

        if($request->hasFile('img')){
            $product->saveFromRequest('products',$request->img);
        }

       return redirect()->route('product.index')->with('message', 'เพิ่ม ' . $product->product_name .' เรียบร้อยแล้ว');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        // $date = new MyClass($product->created_at);
        // dd($date->genDate(false));

        return view('products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('products.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {

        $product->product_name = $request->product_name;
        $product->description = $request->description;
        $product->amount = $request->amount;
        $product->price = $request->price;

        if($request->hasFile('img')){
            $image = $request->img;

            if($product->image != null){
                Storage::delete($product->image);
            }

            $path = $image->storeAs('public/images/'.$image->getClientOriginalName());
            $product->image = $path;
        }

        $product->save();

        return redirect()->route('product.index')->with('message','บันทึกข้อมูลเรียบร้อยแล้ว');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->back()->with('message','ลบข้อมูลเสร็จสิ้น');
    }
}
