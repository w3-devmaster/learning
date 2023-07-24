@extends('layouts.app')
@section('content')
    <h1>สินค้าใกล้หมด</h1>
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
                    <td class="align-middle">{{ $loop->iteration }}</td>
                    <td class="text-start align-middle" >{{ $item->product_name }}</td>
                    <td class="align-middle">{{ number_format($item->amount) }}</td>
                    <td class="align-middle">{{ number_format($item->price, 2) }}</td>
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
        </tbody>
    </table>
@endsection
