@extends('layouts.app')
@section('content')
    <h4><i class="far fa-users me-2" ></i>ผู้ใช้งานทั้งหมด</h4>
    <hr>
    <table class="table table-sm table-striped table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>ชื่อ</th>
                <th>อีเมล</th>
                <th>ดูสิทธิ์</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <a class="text-primary" href="{{ route('user',$user) }}"><i class="far fa-eye" ></i></a>
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

