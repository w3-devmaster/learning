@extends('layouts.app')
@section('content')
    <h1>ข้อมูลส่วนตัว</h1>
    @php
        $account = Auth::user()->account;
    @endphp
    {{ $account->firstname . ' ' . $account->lastname }}
@endsection
