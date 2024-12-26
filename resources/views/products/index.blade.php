@extends('layouts.app')

@section('title', 'Products List')
@section('header-title', 'Product Management')
@section('content')
<div class="container">

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="pull-right">
        <a href="{{ route('admin.products.create') }}" class="btn btn-primary">Create New Product</a>
        <br>
    </div>

    <table class="table table-bordered mt-3" id="products-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Product Name</th>
                <th>Image</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $product->name }}</td>
                    <td>
                        @if($product->image)
                            <img src="{{ asset('storage/'.$product->image) }}" alt="Product Image" width="50">
                        @else
                            No Image
                        @endif
                    </td>
                    <td>${{ $product->price }}</td>
                    <td>
                        <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#products-table').DataTable(); 
        });
    </script>
@endpush
