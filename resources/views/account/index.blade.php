@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-6 col-12">
            <h1>ข้อมูลส่วนตัว</h1>
            <form action="{{ route('account.update',$account) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <img style="max-width: 200px;" class="img-thumbnail w-50" src="{{ Storage::url($account->image?->path) }}" alt="avatar">
                <div class="form-group mb-3">
                    <label for="firstname">ชื่อเรียก</label>
                    <input id="firstname" name="firstname" type="text" class="form-control" value="{{ $account->firstname }}">
                </div>
                <label for="img">รูปประจำตัว</label>
                <input id="img" name="img" type="file" required>

                <div class="d-grid gap-2">
                    <input class="btn btn-success btn-sm" type="submit" value="บันทักข้อมูล">
                </div>
            </form>
        </div>
    </div>
@endsection
