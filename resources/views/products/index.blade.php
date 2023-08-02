@extends('layouts.app')
@section('content')
    <h1>สินค้าทั้งหมด</h1>
    <a class="btn btn-success btn-sm" href="{{ route('product.create') }}">เพิ่มสินค้า</a>
    <a class="btn btn-warning btn-sm" href="{{ route('products.low-stock') }}">สินค้าใกล้หมด</a>
    <a class="btn btn-danger btn-sm" href="{{ route('products.out-of-stock') }}">สินค้าที่หมดแล้ว</a>
    <a class="btn btn-secondary btn-sm" href="{{ route('products.trash') }}">สินค้าที่ถูกลบ</a>
    <hr>
    <form action="{{ route('products.search') }}" method="post">
        @csrf
        <div class="input-group input-group-sm">
            <span class="input-group-text">ค้นหาสินค้า</span>
            <select name="operator" class="form-select">
                <option selected value="=">ราคาเท่ากับ</option>
                <option value="<">ราคาน้อยกว่า</option>
                <option value=">">ราคามากกว่า</option>
            </select>
            <input name="price" type="number" class="form-control" placeholder="ระบุราคาที่ต้องการค้นหา" >
            <input class="btn btn-primary" type="submit" value="ค้นหา">
        </div>
    </form>
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('message'))
        <div class="alert alert-success mt-3">
            {{ session('message') }}
        </div>
    @endif
    <hr>
    <table class="table table-striped table-sm table-bordered text-center">
        <thead>
            <tr>
                <th>#</th>
                <th class="text-start">ชื่อสินค้า</th>
                <th>จำนวน</th>
                <th>ราคา</th>
                <th>วันที่ลงสินค้า</th>
                <th>จัดการ</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $item)
                @php
                    $date = new \App\Classes\MyClass($item->created_at);
                @endphp
                <tr>
                    <td class="align-middle">{{ $item->id }}</td>
                    <td class="text-start align-middle" >{{ $item->product_name }}</td>
                    <td class="align-middle">{{ number_format($item->amount) }}</td>
                    <td class="align-middle">{{ number_format($item->price, 2) }}</td>
                    <td class="align-middle">{{ $date->genDate() }}</td>
                    <td class="align-middle">
                        <form action="{{ route('product.destroy', $item) }}" method="post">
                            @csrf
                            @method('delete')
                            <a class="btn btn-info btn-xs px-1 py-0" href="{{ route('product.show', $item) }}"><i
                                    class="far fa-eye fa-xs"></i></a>
                            <a class="btn btn-warning btn-xs px-1 py-0" href="{{ route('product.edit', $item) }}"><i
                                    class="far fa-edit fa-xs"></i></a>
                            <button class="btn btn-danger btn-xs px-1 py-0" type="submit"><i
                                    class="far fa-times-circle fa-xs"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
                <tr>
                    <td colspan="5">
                        {!! $products->links() !!}
                    </td>
                </tr>
        </tbody>
    </table>
@endsection
