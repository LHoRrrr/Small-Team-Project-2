@extends('admin.layouts.product')

@section('content')
<div class="container">
    <h2 class="text-center text-uppercase m-3">Update Product Form</h2>

    <form class="m-3" action=" {{ route('updatedSlideshow', $slideshow->ssid)}}
" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
        <label>Slideshow title</label>
        <input type="text" name="title" class="form-control" value="{{$slideshow->title}}">
    </div>

    <div class="mb-3">
        <label>Order</label>
        <input type="number" name="ssorder" class="form-control" value="{{$slideshow->ssorder}}">
    </div>
    <div class="mb-3">
    <label>Enable</label><br>
    <input type="checkbox" name="enable" {{$slideshow->enable? 'checked': ''}} value="1">
    </div>
        <div class="mb-3">
            <label>Current Image</label><br>
            @if($slideshow->image)
                <img src="{{ asset('img/' . $slideshow->image) }}" width="100">
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
