@extends('layouts.user')
@section('main')
    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0"><a href="{{ route('home') }}">Home</a> <span class="mx-2 mb-0">/</span> <strong
                        class="text-black">Coupon</strong></div>
            </div>
        </div>
    </div>
    <div class="site-section">
        <div class="alert alert-primary" role="alert">
            <h1 style="text-align: center;">This coupon was created for grateful my customer.</h1>
        </div>
        <div class="container">
            <div class="row mb-3">
                <form class="col-md-12" name="change-cart" action="{{ route('cart.update.item') }}" method="POST">
                    @csrf
                    <div class="site-blocks-table">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="product-price">Title</th>
                                    <th class="product-price">Value</th>
                                    <th class="product-quantity">Count</th>
                                    <th class="product-price">Code</th>

                                </tr>
                            </thead>
                            <tbody>
                                @if (count($byUser) > 0)
                                    @foreach ($byUser as $item)
                                        <tr>
                                            <td class="product-name  d-flex align-items-center">
                                                <img src="images/coupon.png" alt="Image" class="img-fluid w-25">
                                                <h2 class="h5 text-black" style="line-height: 50%">
                                                    {{ $item->content }}
                                                </h2>
                                            </td>
                                            <td>{{ $item->value }}%</td>
                                            <td>{{ $item->count }}</td>
                                            <td>
                                                <strong
                                                    style="font-size: 24px; color: cadetblue">{{ $item->code }}</strong>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <h2>Have not any coupon at present!</h2>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
            <div class="row mb-5">
                <h3>This coupon will be open in 5 minutes after 00:AM.
                    <br>
                    When was end of 5 minutes this coupon will be
                    disable
                </h3>
                <hr>
                <form class="col-md-12 mt-2" name="change-cart" action="{{ route('cart.update.item') }}" method="POST">
                    @csrf
                    <div class="site-blocks-table">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="product-price">Title</th>
                                    <th class="product-price">Value</th>
                                    <th class="product-quantity">Count</th>
                                    <th class="product-price">Code</th>

                                </tr>
                            </thead>
                            <tbody>
                                @if (count($daily) > 0)
                                    @foreach ($daily as $item)
                                        <tr>
                                            <td class="product-name  d-flex align-items-center">
                                                <img src="images/coupon.png" alt="Image" class="img-fluid w-25">
                                                <h2 class="h5 text-black" style="line-height: 50%">
                                                    {{ $item->content }}
                                                </h2>
                                            </td>
                                            <td>{{ $item->value }}%</td>
                                            <td>{{ $item->count }}</td>
                                            <td>
                                                <strong id="daily"
                                                    style="font-size: 24px; color: cadetblue">{{ $item->code }}</strong>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <h2>Have not any coupon at present!</h2>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </form>
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
        var code_daily = document.querySelectorAll("#daily");
        let D = new Date();
        let h = D.getHours();
        let m = D.getMinutes();
        let s = D.getSeconds();
        if (h == 00 && m < 5) {

        } else {
            let time = 'h-' + (60 - D.getMinutes()) + 'm-' + (60 - D.getSeconds()) + 's';
            code_daily.forEach(item => {
                item.innerText = "Time left: " + (23 - D.getHours()) + time;
            });
        }
    </script>
@endsection
