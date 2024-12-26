@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Product</h1>

    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Product Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" required>
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" class="form-control" id="price" name="price" value="{{ $product->price }}" step="0.01" required>
        </div>
        <div class="form-group">
            <label for="detail">Product Detail</label>
            <textarea class="form-control" id="detail" name="detail">{{ $product->detail }}</textarea>
        </div>
        <div class="form-group">
            <label for="image">Product Image</label>
            <input type="file" class="form-control" id="image" name="image" accept="image/*">
            @if($product->image)
                <img src="{{ asset('storage/'.$product->image) }}" alt="Product Image" width="100">
            @endif
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
