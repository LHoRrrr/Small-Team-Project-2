@extends('admin.layouts.product')

@section('content')
<div class="container">
    <a href="{{ route('newproduct') }}" class="btn btn-primary m-3">Add new Product</a>

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
