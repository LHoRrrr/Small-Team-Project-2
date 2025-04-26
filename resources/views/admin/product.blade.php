@extends('admin.layouts.product')
@section('content')
<button class="btn btn-primary btn-margin">Add new Product</button>
<table class="table m-5">
  <thead>
    <tr>
      <th>No</th>
      <th>Name</th>
      <th>Image</th>
      <th>Description</th>
      <th>Price</th>
      <th>Order</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
  @php $i = 1; @endphp
    @foreach($products as $p)
    
    <tr>
      <td>{{$i++}}</td>
      <td>{{$p->pname}}</td>
      <td><img src="{{ asset('img/'. $p->image) }}" alt="{{$p->pname}}" width="60"></td>
      <td class="text-truncate" style="max-width: 200px;">{{ $p->pdesc }}</td>

      <td>${{$p->price}}</td>
      <td>{{$p->porder}}</td>
      <td>
        <button class="btn btn-primary">Update</button>
        <button class="btn btn-danger">Delete</button>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

@endsection