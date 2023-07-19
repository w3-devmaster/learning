@extends('layouts.app')
@section('content')
<h4>เพิ่มข้อมูล User</h4>
<hr>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ route('manage.users.store') }}" method="post">
@csrf
<input type="text" name="name" class="form-control mb-3" placeholder="ชื่อ" >
<input type="email" name="email" class="form-control mb-3" placeholder="อีเมล" >
<input type="password" name="password" class="form-control mb-3" placeholder="รหัสผ่าน" >
<input type="password" name="password_confirmation" class="form-control mb-3" placeholder="ยืนยันรหัสผ่าน" >
<input type="submit" value="เพิ่มข้อมูล" class="btn btn-success" >
</form>
@endsection
