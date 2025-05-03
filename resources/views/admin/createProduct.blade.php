@extends('admin.layouts.product')

@section('content')
<div class="container">
    <h2 class="mt-3 text-center text-uppercase">Create New Product</h2>
    <form class="m-3" action="{{ route('added') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label>Product Name</label>
        <input type="text" name="pname" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Price ($)</label>
        <input type="text" name="price" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Description</label>
        <textarea name="pdesc" class="form-control"></textarea>
    </div>

    <div class="mb-3">
        <label>Order</label>
        <input type="number" name="porder" class="form-control" value="1">
    </div>

    <div class="mb-3">
        <label>Image</label>
        <input type="file" name="image" accept="image/*" class="form-control">
    </div>

    <button type="submit" class="btn btn-success">Add Product</button>
</form>

</div>
@endsection
