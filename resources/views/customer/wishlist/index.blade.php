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
                                    <strong class="text-black">$.00</strong>
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
