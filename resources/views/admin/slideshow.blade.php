@extends('admin.layouts.slideshow')
@section('content')
<div class="container">
<button class="btn btn-primary m-3">Add New Slideshow</button>
<table class="table m-3">
  <thead>
    <tr>
      <th>No</th>
      <th>Title</th>
      <th>Image</th>
      <th>Enable</th>
      <th>Order</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
  @php $i = 1; @endphp
    @foreach($slideshow as $sh)
    <tr>
      <td>{{$i++}}</td>
      <td>{{$sh->title}}</td>
      <td><img src="{{ asset('img/' . $sh->image)}}" alt="{{$sh->title}}" width="60"></td>
      <td>{{$sh->enable}}</td>
      <td>{{$sh->ssorder}}</td>
      <td>
        <button class="btn btn-primary">Update</button>
        <button class="btn btn-danger">Delete</button>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
@endsection