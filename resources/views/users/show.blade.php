@extends('layouts.app')
@section('content')
<h4>สิทธิ์ทั้งหมดของ : {{ $user->name }}</h4>
<hr>
<table class="table table-sm table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Role</th>
            <th>รายละเอียด</th>
            <th>ดูข้อมูล</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($user->roles as $role)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $role->role_name }}</td>
            <td>{{ $role->description }}</td>
            <td>
                <a class="text-warning" href="{{ route('role',$role) }}"><i class="far fa-eye" ></i></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
