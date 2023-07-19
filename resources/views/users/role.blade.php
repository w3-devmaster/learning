@extends('layouts.app')
@section('content')
<h4>สิทธิ์ : {{ $role->role_name }}</h4>
<hr>
<table class="table table-sm table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>ชื่อ</th>
            <th>อีเมล</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($role->users as $user)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
