<!DOCTYPE html>
<html lang="en">
<body>
@extends('layouts.admin')

@section('content')
    <h1>{{ $product->name }}</h1>
    <img src="{{ asset('storage/images/' . $product->image) }}" alt="{{ $product->name }}" style="width: 300px; height: auto;">
    <p><strong>Price:</strong> {{ $product->price }}</p>
    <p><strong>Brand:</strong> {{ $product->brand }}</p>
    <p><strong>Description:</strong> {{ $product->description }}</p>
    <a href="{{ route('admin.products.index') }}">Back to Products</a>
@endsection
</body>
</html>