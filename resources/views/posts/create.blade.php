@extends('layouts.app')
@section('content')
<h1>สร้างโพสต์</h1>
<a class="btn btn-info btn-sm" href="{{ route('post.index') }}">กลับ</a>
<hr>
<div class="row">
    <div class="col-md-6 col-12">
        <form action="{{ route('post.store') }}" method="post">
            @csrf
            <div class="form-group mb-3">
                <label for="title">ชื่อโพสต์</label>
                <input name="title" type="text" value="{{ old('title') }}" class="form-control @error('title') is-invalid @enderror">
                @error('title')
                    <span class="invalid-feedback" role="alert" >
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="content">เนื้อหา</label>
                <input name="content" type="text" value="{{ old('content') }}" class="form-control @error('content') is-invalid @enderror">
                @error('content')
                    <span class="invalid-feedback" role="alert" >
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="d-grid gap-2" >
                <input class="btn btn-success btn-sm" type="submit" value="สร้างโพสต์">
            </div>
        </form>
    </div>
</div>
@endsection
