@extends('layouts.app')
@section('content')
    <h1>โพสต์ทั้งหมด</h1>
    <a class="btn btn-success btn-sm" href="{{ route('post.create') }}">สร้างโพสต์</a>
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
                <th class="text-start">เจ้าของ</th>
                <th class="text-start">ชื่อโพสต์</th>
                <th>เนื้อหา</th>
                <th>วันที่เขียน</th>
                <th>จัดการ</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td class="align-middle">{{ $loop->iteration }}</td>
                    <td class="text-start align-middle" >{{ $post->user->name }}</td>
                    <td class="text-start align-middle" >{{ $post->title }}</td>
                    <td class="align-middle">{{ $post->content }}</td>
                    <td class="align-middle">{{ $post->created_at }}</td>
                    <td class="align-middle">
                        <form action="{{ route('post.destroy', $post) }}" method="post">
                            @csrf
                            @method('delete')
                            <a class="btn btn-info btn-xs px-1 py-0" href="{{ route('post.show', $post) }}"><i
                                    class="far fa-eye fa-xs"></i></a>
                            <a class="btn btn-warning btn-xs px-1 py-0" href="{{ route('post.edit', $post) }}"><i
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
