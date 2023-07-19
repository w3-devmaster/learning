@extends('layouts.app')
@section('content')
<h4><i class="far fa-users me-2" ></i>ผู้ใช้งานทั้งหมด</h4>
    <a class="btn btn-sm btn-success" href="{{ route('manage.users.create') }}"><i class="fa fa-plus-circle me-2" ></i>เพิ่มผู้ใช้งาน</a>
    <hr>
    <table class="table table-sm table-striped table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>ชื่อ</th>
                <th>อีเมล</th>
                <th>แก้ไข</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <a class="text-warning" href="{{ route('manage.users.edit',$user) }}"><i class="far fa-edit" ></i></a>
                </td>
            </tr>
            @endforeach
            <tr>
                <td colspan="4" >
                    {!! $users->links() !!}
                </td>
            </tr>
        </tbody>
    </table>
@endsection
