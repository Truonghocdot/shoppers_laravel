@extends('layouts.user')
@section('main')
    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0"><a href="{{ route('home') }}">Home</a> <span class="mx-2 mb-0">/</span> <strong
                        class="text-black">Cart</strong></div>
            </div>
        </div>
    </div>
    <div class="site-section">
        <div class="container">
            <div class="row mb-5">
                <form class="col-md-12" name="change-cart" action="{{ route('cart.update.item') }}" method="POST">
                    @csrf
                    <div class="site-blocks-table">
                        @if (count($cart_items) == 0)
                            <div class="alert alert-primary" role="alert">
                                <strong>Cart is empty!</strong> <a href="{{ route('shop') }}" class="alert-link">Go to
                                    shop</a>
                            </div>
                        @else
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="product-thumbnail">Image</th>
                                        <th class="product-name">Product</th>
                                        <th class="product-price">Price</th>
                                        <th class="product-quantity">Quantity</th>
                                        <th class="product-quantity">Size</th>
                                        <th class="product-total">Total</th>
                                        <th class="product-remove">Remove</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cart_items as $item)
                                        <tr>
                                            <td class="product-thumbnail">
                                                <img src="images/products/{{ $item->image }}" alt="Image"
                                                    class="img-fluid">
                                            </td>
                                            <td class="product-name">
                                                <h2 class="h5 text-black">
                                                    {{ $item->title }}
                                                </h2>
                                            </td>
                                            @if ($item->promotion_price > 0)
                                                <td>${{ $item->promotion_price }}.00</td>
                                            @else
                                                <td>${{ $item->price }}.00</td>
                                            @endif
                                            <td>
                                                <div class="input-group mb-3" style="max-width: 120px;">
                                                    <div class="input-group-prepend">
                                                        <button class="btn btn-outline-primary js-btn-minus"
                                                            type="button">&minus;</button>
                                                    </div>
                                                    <input type="text" class="form-control text-center"
                                                        value={{ $item->count }} name='{{ $item->id }}' id='count-item'
                                                        placeholder="" aria-label="Example text with button addon"
                                                        aria-describedby="button-addon1">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-outline-primary js-btn-plus"
                                                            type="button">&plus;</button>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{ $item->size }}</td>
                                            @if ($item->promotion_price > 0)
                                                <td>${{ $item->promotion_price * $item->count }}.00</td>
                                            @else
                                                <td>${{ $item->price * $item->count }}.00</td>
                                            @endif
                                            <td><a href="{{ route('cart.delete.item', ['id' => $item->id]) }}"
                                                    id="btn-delete"
                                                    onclick="return confirm('Do you really want to delete this item?')"
                                                    class="btn btn-primary btn-sm">
                                                    X
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </form>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="row mb-5">
                        <div class="col-md-6 mb-3 mb-md-0">
                            <button type="submit" id="btn-update-cart" class="btn btn-primary btn-sm btn-block">Update
                                Cart</button>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('shop') }}" class="btn btn-outline-primary btn-sm btn-block">Continue
                                Shopping</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 pl-5">
                    <div class="row justify-content-end">
                        <div class="col-md-7">
                            <div class="row">
                                <div class="col-md-12 text-right border-bottom mb-5">
                                    <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <span class="text-black">Total</span>
                                </div>
                                <div class="col-md-6 text-right">
                                    <strong class="text-black">${{ $total }}.00</strong>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="{{ route('checkout') }}" class="btn btn-primary btn-lg py-3 btn-block">Proceed
                                        To Checkout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var form_change = document.forms['change-cart'];
        var btn_change_cart = document.querySelector('#btn-update-cart');
        var btn_delete_cart = document.querySelector('#btn-delete');

        var form_delete = new FormData();
        btn_change_cart.addEventListener('click', (e) => {
            e.preventDefault();
            form_change.submit();
        });
    </script>
@endsection
