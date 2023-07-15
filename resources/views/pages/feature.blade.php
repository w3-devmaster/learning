@extends('layouts.app')
@section('title','Feature')
@section('content')
    <h1 class="text-center" >Feature Page</h1>
    <p class="text-center alert alert-success">{{ $data['name'] }}</p>
    <p class="text-center alert alert-success">{{ $data['email'] }}</p>
    <p class="text-center alert alert-success">{{ $data['age'] }}</p>
    <p class="text-center alert alert-success">{{ $data['gender'] }}</p>

@endsection
