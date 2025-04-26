@extends('admin.layouts.product')

@section('content')
<div class="container mt-4">
    <h2>Edit Product</h2>

    <form action="{{ route('updated',$product->pid) }}
" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label>Product Name</label>
            <input type="text" name="pname" class="form-control" value="{{ $product->pname }}" required>
        </div>

        <div class="mb-3">
            <label>Price ($)</label>
            <input type="text" name="price" class="form-control" value="{{ $product->price }}" required>
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="pdesc" class="form-control">{{ $product->pdesc }}</textarea>
        </div>

        <div class="mb-3">
            <label>Order</label>
            <input type="number" name="porder" class="form-control" value="{{ $product->porder }}">
        </div>

        <div class="mb-3">
            <label>Current Image</label><br>
            @if($product->image)
                <img src="{{ asset('img/' . $product->image) }}" width="100">
            @else
                No Image
            @endif
        </div>

        <div class="mb-3">
            <label>Change Image</label>
            <input type="file" name="image" class="form-control">
        </div>

        <button class="btn btn-primary">Update Product</button>
    </form>
</div>
@endsection
