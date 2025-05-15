
@extends('layouts.cart');
        <!-- Single Page Header start -->
@section('content')
        <div class="container-fluid page-header py-5 m-0">
            <h1 class="text-center text-white display-6">Cart</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active text-white">Cart</li>
            </ol>
        </div>
        <!-- Single Page Header End -->


        <!-- Cart Page Start -->
        <div class="container-fluid py-5" id="cart-product">
            @include('includes.CartItem')
        </div>
        <!-- Cart Page End -->

@endsection

@section('script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
    $(document).on("click", ".quantityadd", function(e) {
        e.preventDefault();

        var button = $(this);
        var input = button.closest('.input-group').find('.input-qty');
        var productId = button.closest('tr').data('id');
       // var oldquantity = Number(input.val());
        var quantity = Number(input.val());

        
            
        // update the input box // update the input box
        $.ajax({
            url: "{{ route('cart.update') }}",
            method: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                type: "update",
                product_id: productId,
                quantity: quantity + 1
            },
            success: function (response) {
                if (response.success) {
                    $('#cart-product').html(response.html); // Replace cart content
                } else {
                    alert(response.message);
                }
            }
        });

    });
    $(document).on("click", ".quantityremove", function(e) {
        e.preventDefault();

        var button = $(this);
        var input = button.closest('.input-group').find('.input-qty');
        var productId = button.closest('tr').data('id');
        var quantity = Number(input.val());

        $.ajax({
            url: "{{ route('cart.update') }}",
            method: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                type: "update",
                product_id: productId,
                quantity: quantity -1
            },
            success: function (response) {
                if (response.success) {
                    $('#cart-product').html(response.html); // Replace cart content
                } else {
                    alert(response.message);
                }
            }
        });
    });
    $(document).on("click", ".delete-from-cart", function(e) {
        e.preventDefault();

        var button = $(this);
        var productId = button.closest('tr').data('id');
        //alert(productId);
                $.ajax({
            url: "{{ route('cart.update') }}",
            method: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                type: "delete",
                product_id: productId,
            },
            success: function (response) {
                if (response.success) {
                    $('#cart-product').html(response.html); // Replace cart content
                } else {
                    alert(response.message);
                }
            }
        });
    });
</script>
@endsection


