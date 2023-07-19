@extends('layouts.app')
@section('content')
<h4>แก้ไขข้อมูล</h4>
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
<form action="{{ route('manage.users.update',$user) }}" method="post">
@csrf
@method('PUT')
<input type="text" name="name" class="form-control mb-3" placeholder="ชื่อ" value="{{ $user->name }}" >

<input type="submit" value="แก้ข้อมูล" class="btn btn-success" >
</form>
@endsection
