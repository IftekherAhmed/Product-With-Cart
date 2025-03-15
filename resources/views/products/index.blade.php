@extends('layouts.app')

@section('content')
{{-- row --}}
<div class="row">
    {{-- Product Column --}}
    <div class="col-md-8">
        <h2 class="mb-4">Product Catalog</h2>
        {{-- Search input --}}
        <input type="text" id="search" class="form-control mb-3" placeholder="Search products...">
        {{--/ Search input --}}

        {{-- Row --}}
        <div class="row">
            {{-- Loop through products --}}
            @foreach($products as $product)
            <div class="col-md-4 mb-4">
                {{-- Product card --}}
                <div class="card">
                    <div class="card-body">
                        {{-- Product name --}}
                        <b class="product-title">{{ $product['name'] }}</b>
                        {{--/ Product Name --}}
                        
                        {{-- Product price --}}
                        <p class="text-danger">
                            <strong>${{ number_format($product['price'], 2) }}</strong>
                        </p>
                        {{--/ Product price --}}

                        {{-- Add to cart button --}}
                        <a class="add-to-cart text-decoration-none text-dark" href="#"
                            data-id="{{ $product['id'] }}" 
                            data-name="{{ $product['name'] }}" 
                            data-price="{{ $product['price'] }}">
                            <strong>
                                <i class="bi bi-plus-circle"></i> Add to Cart
                            </strong>
                        </a>
                        {{--/ Add to cart button --}}
                    </div>
                </div>
                {{--/ Product card --}}
            </div>
            @endforeach
        </div>
        {{--/ Row --}}
    </div>
    {{--/ Product Column --}}

    {{-- Shopping Cart Column --}}
    <div class="col-md-4">
        <h2 class="mt-5">Shopping Cart</h2>
        <div id="cart">
            <table class="table">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Cart items will be dynamically inserted here -->
                </tbody>
            </table>
        </div>

        {{-- Discount --}}
        <div id="cart-discount" class="mt-3 fw-bold"></div>

        {{-- Cart total --}}
        <div id="cart-total" class="mt-3 fw-bold"></div>
    </div>
    {{--/ Shopping Cart Column --}}
</div>
{{--/ row --}}
@endsection

{{-- Page Js --}}
@section('page_js')
<script>
$(document).ready(function () {
    // Function to update the cart
    function updateCart() {
        $.get("{{ route('cart.show') }}", function (data) {
            $("#cart tbody").html(data);
            applyDiscount();
        });
    }

    // Function to apply discount if applicable
    function applyDiscount() {
        let total     = 0;
        let itemCount = 0;
        let discount  = 0;

        $(".cart-item").each(function () {
            let price       = parseFloat($(this).data("price"));
            let quantity    = parseInt($(this).data("quantity"));
            total           += price * quantity;
            itemCount       += quantity;
        });

        if (itemCount >= 3) {
            discount = total * 0.1; // 10% discount
            total   -= discount;

            $("#cart-discount").text(`Discount: $${discount.toFixed(2)}`);
        } else {
            $("#cart-discount").text("");
        }

        $("#cart-total").text(`Total: $${total.toFixed(2)}`);
    }

    // Event handler for adding items to the cart
    $(".add-to-cart").click(function () {
        let id    = $(this).data("id");
        let name  = $(this).data("name");
        let price = $(this).data("price");

        $.ajax({
            url: "{{ route('cart.add') }}",
            method: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                id: id,
                name: name,
                price: price,
            },
            success: function () {
                updateCart();
            }
        });
    });

    // Event handler for removing items from the cart
    $(document).on("click", ".remove-from-cart", function () {
        let id = $(this).data("id");

        $.ajax({
            url: "{{ route('cart.remove') }}",
            method: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                id: id,
            },
            success: function () {
                updateCart();
            }
        });
    });

    // Event handler for search input
    $("#search").on("input", function () {
        let searchText = $(this).val().toLowerCase();

        $(".card").each(function () {
            let name = $(this).find(".product-title").text().toLowerCase();
            $(this).toggle(name.includes(searchText));
        });
    });

    // Initial cart update
    updateCart();
});
</script>
@endsection
{{--/ Page Js --}}
