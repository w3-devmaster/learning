@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-6 col-12">
            <h1>ข้อมูลส่วนตัว</h1>
            <form action="{{ route('update-user',Auth::user()) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <img style="max-width: 200px;" class="img-thumbnail w-50" src="{{ Storage::url(Auth::user()->avatar?->path) }}" alt="avatar">
                <div class="form-group mb-3">
                    <label for="name">ชื่อเรียก</label>
                    <input id="name" name="name" type="text" class="form-control" value="{{ Auth::user()->name }}">
                </div>
                <label for="avatar">รูปประจำตัว</label>
                <input id="avatar" name="avatar" type="file">

                <div class="d-grid gap-2">
                    <input class="btn btn-success btn-sm" type="submit" value="บันทักข้อมูล">
                </div>
            </form>
        </div>
    </div>
@endsection
