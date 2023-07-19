@extends('layouts.app')
@section('content')
    <h4><i class="far fa-users me-2" ></i>สิทธิ์ใช้งานทั้งหมด</h4>
    <hr>
    <table class="table table-sm table-striped table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>ชื่อสิทธิ์</th>
                <th>รายละเอียด</th>
                <th>ดูสิทธิ์</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($roles as $role)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $role->role_name }}</td>
                <td>{{ $role->description }}</td>
                <td>
                    <a class="text-primary" href="{{ route('role',$role) }}"><i class="far fa-eye" ></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
