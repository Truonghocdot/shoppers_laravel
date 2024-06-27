@extends('layouts.user')
@section('main')
    <section style="background-color: #eee;">
        <div class="container py-5">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb" class="bg-body-tertiary rounded-3 p-3 mb-4">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">User</a></li>
                            <li class="breadcrumb-item active" aria-current="page">User Profile</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp"
                                alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                            <h5 class="my-3">{{ $user->name }}</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Full Name</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ $user->name }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Email</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0"> {{ $user->email }} </p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Phone</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0"> {{ $user->phone }} </p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Country</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ $user->country }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card mb-4 mb-md-0">
                                <div class="card-body">
                                    <h2 class="mb-4">
                                        Order present
                                    </h2>
                                    @foreach ($order as $item)
                                        <h5 class="text-black">{{ $item->created_at }}</h5>
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th class="product-thumbnail">Image</th>
                                                    <th class="product-name">Product</th>
                                                    <th class="product-price">Price</th>
                                                    <th class="product-quantity">Quantity</th>
                                                    <th class="product-quantity">Size</th>
                                                    <th class="product-total">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($orderItem as $detail)
                                                    @if ($detail->order_id == $item->id)
                                                        <tr>
                                                            <td class="product-thumbnail">
                                                                <img src="images/products/{{ $detail->image }}"
                                                                    alt="Image" class="img-fluid"
                                                                    style="max-width: 80px">
                                                            </td>
                                                            <td class="product-name">
                                                                <h2 class="h5 text-black">
                                                                    {{ $detail->title }}
                                                                </h2>
                                                            </td>
                                                            @if ($detail->promotion_price > 0)
                                                                <td>${{ $detail->promotion_price }}.00</td>
                                                            @else
                                                                <td>${{ $detail->price }}.00</td>
                                                            @endif
                                                            <td>
                                                                {{ $detail->count }}
                                                            </td>
                                                            <td>{{ $detail->size }}</td>
                                                            @if ($detail->promotion_price > 0)
                                                                <td>${{ $detail->promotion_price * $detail->count }}.00
                                                                </td>
                                                            @else
                                                                <td>${{ $detail->price * $detail->count }}.00</td>
                                                            @endif
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            </tbody>
                                            <div class="d-flex align-items-center gap-3 mb-3">
                                                <p>Status: @switch($item->status)
                                                        @case(0)
                                                            Wait for owner confirm order
                                                        @break

                                                        @case(1)
                                                            Order being transported
                                                        @break

                                                        @case(2)
                                                            Order will come to you early
                                                        @break

                                                        @case(3)
                                                            Order completed!
                                                            Put your comment under detail products
                                                        @break

                                                        @default
                                                    @endswitch </p>
                                                <p>Type Payment: {{ $detail->payment }}</p>
                                            </div>
                                            <div class="d-flex align-items-center gap-3 mb-3">
                                                <p class="my-0">
                                                    Total price: <strong
                                                        class="text-black">{{ $item->total_money }}$</strong>
                                                </p>
                                                @if ($item->status == 0)
                                                    <form action="{{ route('order.cancel') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="order_id" value="{{ $item->id }}">
                                                        <button
                                                            onclick="return confirm('If you cancel this order, coupon in this order will be disable and not return coupon, are you sure?')"
                                                            class="btn btn-danger">Cancel Order</button>
                                                    </form>
                                                @else
                                                    <form action="{{ route('order.confirm') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="order_id" value="{{ $item->id }}">
                                                        <button class="btn btn-primary">Confirm Completed Order!</button>
                                                    </form>
                                                @endif
                                            </div>
                                        </table>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
