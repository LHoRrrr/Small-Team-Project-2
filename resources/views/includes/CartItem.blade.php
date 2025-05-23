



<form action="{{ route('order.product')}}" method="POST">
    @csrf
<div class="container py-5">
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Products</th>
                    <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                            <th scope="col">Handle</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $subtotal = 0; $shipping =5; $total=0; @endphp
                        @if(session('cart'))
                        @foreach(session('cart') as $key => $value)
                        <tr data-id="{{$key}}">
                            <th scope="row">
                                <div class="d-flex align-items-center">
                                    <img src="img/{{ $value['image'] }}" class="img-fluid me-5 rounded-circle" style="width: 80px; height: 80px;" alt="">
                                </div>
                            </th>
                            <td>
                                <p class="mb-0 mt-4">{{$value['pname']}}</p>
                            </td>
                            <td>
                                    <p class="mb-0 mt-4">{{$value['price']}} $</p>
                                </td>
                                <td>
                                    <div class="input-group quantity mt-4" style="width: 100px;">
                                        <div class="input-group-btn">
                                            <button class="btn quantityremove btn-sm rounded-circle bg-light border" >
                                                <i class="fa fa-minus"></i>
                                            </button>
                                        </div>
                                        <input type="text" class="form-control form-control-sm input-qty text-center border-0  " value="{{$value['quantity']}}" min="1">
                                        <div class="input-group-btn">
                                            <button class="btn quantityadd btn-sm  rounded-circle bg-light border">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="mb-0 mt-4">{{number_format($value['quantity'] * $value['price'], 2)}} $</p>
                                </td>
                                <td>
                                    <button class="btn btn-md rounded-circle bg-light border mt-4 delete-from-cart" >
                                        <i class="fa fa-times text-danger"></i>
                                    </button>
                                </td>
                                
                            </tr>
                            @php
                            $subtotal += $value['price'] * $value['quantity'];
                            $total = number_format($subtotal + $shipping,2);
                            @endphp
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="mt-5">
                    <input type="text" class="border-0 border-bottom rounded me-5 py-3 mb-4" placeholder="Coupon Code">
                    <button class="btn border-secondary rounded-pill px-4 py-3 text-primary" type="button">Apply Coupon</button>
                </div>
                <div class="row g-4 justify-content-end">
                    <div class="col-8"></div>
                    <div class="col-sm-8 col-md-7 col-lg-6 col-xl-4">
                        <div class="bg-light rounded">
                            <div class="p-4">
                                <h1 class="display-6 mb-4">Cart <span class="fw-normal">Total</span></h1>
                                <div class="d-flex justify-content-between mb-4">
                                    <h5 class="mb-0 me-4">Subtotal:</h5>
                                    <p class="mb-0">${{number_format($subtotal)}}</p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <h5 class="mb-0 me-4">Shipping</h5>
                                    <div class="">
                                        <p class="mb-0">Flat rate: ${{number_format($shipping,2)}}</p>
                                    </div>
                                </div>
                                <p class="mb-0 text-end">Shipping to Cambodia.</p>
                            </div>
                            <div class="py-4 mb-4 border-top border-bottom d-flex justify-content-between">
                                <h5 class="mb-0 ps-4 me-4">Total</h5>
                                <p class="mb-0 pe-4">${{$total}}</p>
                            </div>
                            <input type='submit' class="btn border-secondary rounded-pill px-4 py-3 text-primary text-uppercase mb-4 ms-4" value="Proceed Checkout" >
                        </div>
                    </div>
                </div>
            </div>
        </form>