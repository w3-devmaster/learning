@extends('layouts.app')
@section('content')
<h4>User ทั้งหมด</h4>
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
        @foreach (getUser() as $user)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
                <a class="text-warning" href=""><i class="far fa-eye" ></i></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
