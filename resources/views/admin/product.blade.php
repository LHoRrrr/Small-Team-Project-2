@extends('admin.layouts.product')

@section('content')
<div class="container">
    <h1 class="m-3 text-center text-bold text-uppercase">Product List</h1>
    <a href="{{ route('newproduct') }}" class="btn btn-primary m-3">Add new Product</a>
    @if(session('success'))
    <div class=" m-3 alert alert-success alert-dismissible fade show" role="alert">
        {{session('success')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    @if(session('fail'))
    <div class=" m-3 alert alert-warning alert-dismissible fade show" role="alert">
        {{session('fail')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <table class="table m-3">
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
                    <td>{{ $i++ }}</td>
                    <td>{{ $p->pname }}</td>
                    <td><img src="{{ asset('img/' . $p->image) }}" alt="{{ $p->pname }}" width="60"></td>
                    <td class="text-truncate" style="max-width: 200px;">{{ $p->pdesc }}</td>
                    <td>${{ $p->price }}</td>
                    <td>{{ $p->porder }}</td>
                    <td>
                        <a href="{{ route('update', $p->pid) }}" class="btn btn-primary">Update</a>

                        <form action="{{ route('delete', $p->pid) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete this product?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
