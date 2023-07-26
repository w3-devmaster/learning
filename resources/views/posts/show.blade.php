@extends('layouts.app')
@section('content')
@if (!$post->images()->exists())
    <img class="img-thumbnail shadow w-25" src="{{ asset('images/default-product.png') }}" alt="default-img">
@else
    @foreach ($post->images as $image)
    <img style="max-width:500px;" class="img-thumbnail shadow w-25" src="{{ Storage::url($image->path) }}" alt="{{ $image->file_name }}">
    @endforeach
@endif
<h4>{{ $post->title }}</h4>
<div>{{ $post->content }}</div>
@endsection
