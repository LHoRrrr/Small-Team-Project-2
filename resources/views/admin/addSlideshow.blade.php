@extends('admin.layouts.product')

@section('content')
<div class="container">
    <h2 class="mt-3 text-center text-uppercase">Create new Slideshow</h2>
    <form class="m-3" action="{{ route('addedslideshow')}}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label>Slideshow title</label>
        <input type="text" name="title" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Order</label>
        <input type="number" name="ssorder" class="form-control" value="1">
    </div>
    <div class="mb-3">
    <label>Enable</label><br>
    <input type="checkbox" name="enable" value="1">
    </div>

    <div class="mb-3">
        <label>Image</label>
        <input type="file" name="image" accept="image/*" class="form-control">
    </div>

    <input type="submit" class="btn btn-success" value="Add Slideshow">
</form>

</div>
@endsection
