@extends('layouts.app')
@section('content')
    <h5>ชื่อสินค้า : {{ $product->product_name }}</h5>
    <a class="btn btn-primary btn-sm" href="{{ route('product.index') }}"><i class="fa-solid fa-arrow-left me-2"></i>กลับ</a>
    <p class="my-5">
        <p>จำนวนภาพ : {{ $product->images()->count() }}</p>
        @if (!$product->images()->exists())
            <img class="img-thumbnail shadow w-25" src="{{ asset('images/default-product.png') }}" alt="default-img">
        @else
            @foreach ($product->images as $image)
            <img style="max-width:100px;" class="img-thumbnail shadow w-25" src="{{ Storage::url($image->path) }}" alt="{{ $image->file_name }}">
            @endforeach
        @endif
    </p>
    <p>ชื่อสินค้า : {{ $product->product_name }}</p>
    <p>รายละเอียดสินค้า : {{ $product->description }}</p>
    <p>จำนวน : {{ $product->amount }}</p>
    <p>ราคา : {{ number_format($product->price,2) }}</p>
@endsection
