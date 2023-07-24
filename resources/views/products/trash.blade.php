@extends('layouts.app')
@section('content')
    <h1>สินค้าที่ถูกลบ</h1>
    <a class="btn btn-info btn-sm" href="{{ route('product.index') }}">กลับ</a>
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
                <th>จัดการ</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $item)
                <tr>
                    <td class="align-middle">{{ $item->id }}</td>
                    <td class="text-start align-middle" >{{ $item->product_name }}</td>
                    <td class="align-middle">{{ number_format($item->amount) }}</td>
                    <td class="align-middle">{{ number_format($item->price, 2) }}</td>
                    <td class="align-middle">
                        <form action="{{ route('products.delete', $item) }}" method="post">
                            @csrf
                            @method('delete')
                            <a title="กู้คืนสินค้า" class="btn btn-success btn-xs px-1 py-0" href="{{ route('products.restore', $item) }}"><i
                                    class="far fa-recycle fa-xs"></i></a>
                            <button title="ลบถาวร" class="btn btn-danger btn-xs px-1 py-0" type="submit"><i
                                    class="far fa-times-circle fa-xs"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
