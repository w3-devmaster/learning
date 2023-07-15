@extends('layouts.app')
@section('content')
<h1>แก้ไขข้อมูลสินค้า</h1>
<a class="btn btn-info btn-sm" href="{{ route('product.index') }}">กลับ</a>
<hr>
<div class="row">
    <div class="col-md-6 col-12">
        <form action="{{ route('product.update',$product) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @if ($product->image != null)
            <img class="img-thumbnail w-25" src="{{ Storage::url($product->image) }}" alt="product-img">
            @endif
            <hr>
            <div class="form-group mb-3">
                <label for="product_name">ชื่อสินค้า</label>
                <input name="product_name" type="text" value="{{ $product->product_name }}" class="form-control @error('product_name') is-invalid @enderror">
                @error('product_name')
                <span class="invalid-feedback" role="alert" >
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="description">รายละเอียดสินค้า</label>
                <input name="description" type="text" value="{{ $product->description }}" class="form-control @error('description') is-invalid @enderror">
                @error('description')
                    <span class="invalid-feedback" role="alert" >
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="amount">จำนวน</label>
                <input name="amount" type="number" value="{{ $product->amount }}" class="form-control @error('amount') is-invalid @enderror" min="0">
                @error('amount')
                    <span class="invalid-feedback" role="alert" >
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="price">ราคา</label>
                <input name="price" type="number" value="{{ $product->price }}" class="form-control @error('price') is-invalid @enderror" min="0" step="0.25">
                @error('price')
                    <span class="invalid-feedback" role="alert" >
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="img">ภาพสินค้า</label>
                <input name="img" type="file" class="form-control-file @error('img') is-invalid @enderror" >
                @error('img')
                    <span class="invalid-feedback" role="alert" >
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="d-grid gap-2" >
                <input class="btn btn-success btn-sm" type="submit" value="บันทึกข้อมูลสินค้า">
            </div>
        </form>
    </div>
</div>
@endsection
