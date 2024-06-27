@extends('layouts.user')
@section('main')
    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0">
                    <a href="{{ route('home') }}">Home</a>
                    <span class="mx-2 mb-0">/</span>
                    <strong class="text-black">Wishlist</strong>
                </div>
            </div>
        </div>
    </div>
    <div class="site-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-12">
                    <div class="site-blocks-table">
                        @if (count($wishlist_items) > 0)
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="product-thumbnail">Image</th>
                                        <th class="product-title">Title</th>
                                        <th class="product-price">Price</th>
                                        <th class="product-total">Add To Cart</th>
                                        <th class="product-remove">Remove</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($wishlist_items as $item)
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
                                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                                    data-target="#exampleModal" data-whatever="@mdo">Add To Cart
                                                </button>
                                                <div class="modal fade" id="exampleModal" tabindex="-1"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Confirm your
                                                                    product
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{ route('cart.add.item') }}" method="POST"
                                                                    name="change-cart">
                                                                    <input type="hidden" name="pro_id"
                                                                        value="{{ $item->id }}">
                                                                    <div class="form-group">
                                                                        <label for="recipient-name"
                                                                            class="col-form-label">Count</label>
                                                                        <input type="number" class="form-control"
                                                                            name="count" id="recipient-name">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="message-text"
                                                                            class="col-form-label">Size:</label>
                                                                    </div>
                                                                    <div class="mb-1 d-flex">
                                                                        @csrf
                                                                        <input type="hidden" name="pro_id"
                                                                            value="{{ $item->id }}">
                                                                        <label for="option-sm" class="d-flex mr-3 mb-3">
                                                                            <span class="d-inline-block mr-2"
                                                                                style="top:-2px; position: relative;"><input
                                                                                    type="radio" id="option-sm"
                                                                                    value="S" required
                                                                                    name="shop-sizes"></span> <span
                                                                                class="d-inline-block text-black">Small</span>
                                                                        </label>
                                                                        <label for="option-md" class="d-flex mr-3 mb-3">
                                                                            <span class="d-inline-block mr-2"
                                                                                style="top:-2px; position: relative;"><input
                                                                                    type="radio" id="option-md"
                                                                                    value="M" name="shop-sizes"></span>
                                                                            <span
                                                                                class="d-inline-block text-black">Medium</span>
                                                                        </label>
                                                                        <label for="option-lg" class="d-flex mr-3 mb-3">
                                                                            <span class="d-inline-block mr-2"
                                                                                style="top:-2px; position: relative;"><input
                                                                                    type="radio" id="option-lg"
                                                                                    value="L" name="shop-sizes"></span>
                                                                            <span
                                                                                class="d-inline-block text-black">Large</span>
                                                                        </label>
                                                                        <label for="option-xl" class="d-flex mr-3 mb-3">
                                                                            <span class="d-inline-block mr-2"
                                                                                style="top:-2px; position: relative;"><input
                                                                                    type="radio" id="option-xl"
                                                                                    value='XL' name="shop-sizes"></span>
                                                                            <span class="d-inline-block text-black"> Extra
                                                                                Large</span>
                                                                        </label>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="button" type="submit"
                                                                    id="btn-update-cart" class="btn btn-primary">Send
                                                                    message</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><a href="{{ route('wishlist.delete', ['id' => $item->wid]) }}"
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
                        @else
                            <div class="alert alert-primary" role="alert">
                                <strong>Wishlist is empty!</strong> <a href="{{ route('shop') }}" class="alert-link">Go to
                                    shop</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="row mb-5">
                        <div class="col-md-6">
                            <a href="{{ route('shop') }}" class="btn btn-outline-primary btn-sm btn-block">Continue
                                Shopping</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var form_change = document.forms['change-cart'];
            var btn_change_cart = document.querySelector('#btn-update-cart');

            btn_change_cart.addEventListener('click', (e) => {
                e.preventDefault();
                form_change.submit();
            });
        });
    </script>
@endsection
