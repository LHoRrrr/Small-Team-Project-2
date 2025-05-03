@extends('admin.layouts.slideshow')
@section('content')
<div class="container">
<a href="{{ route('addslideshow')}}"><button class="btn btn-primary m-3">Add New Slideshow</button></a>
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
        <a href="{{ route('editSlideshow', $id = $sh->ssid) }}" class="btn btn-primary">Update</a>
        <form action="{{ route('deleteSlideshow', $sh->ssid) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete this slideshow?')">Delete</button>
            </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
@endsection