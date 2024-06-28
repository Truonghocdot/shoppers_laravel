@extends('layouts.user')
@section('main')
    <div class="site-blocks-cover" style="background-image: url(images/hero_1.jpg);" data-aos="fade">
        <div class="container">
            <div class="row align-items-start align-items-md-center justify-content-end">
                <div class="col-md-5 text-center text-md-left pt-5 pt-md-0">
                    <h1 class="mb-2">Finding Your Perfect Shoes</h1>
                    <div class="intro-text text-center text-md-left">
                        <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus at iaculis quam.
                            Integer accumsan tincidunt fringilla. </p>
                        <p>
                            <a href="{{ route('shop') }}" class="btn btn-sm btn-primary">Shop Now</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="site-section site-section-sm site-blocks-1">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="">
                    <div class="icon mr-4 align-self-start">
                        <span class="icon-truck"></span>
                    </div>
                    <div class="text">
                        <h2 class="text-uppercase">Free Shipping</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus at iaculis quam. Integer
                            accumsan tincidunt fringilla.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="icon mr-4 align-self-start">
                        <span class="icon-refresh2"></span>
                    </div>
                    <div class="text">
                        <h2 class="text-uppercase">Free Returns</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus at iaculis quam. Integer
                            accumsan tincidunt fringilla.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="icon mr-4 align-self-start">
                        <span class="icon-help"></span>
                    </div>
                    <div class="text">
                        <h2 class="text-uppercase">Customer Support</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus at iaculis quam. Integer
                            accumsan tincidunt fringilla.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section site-blocks-2">
        <div class="container">
            <div class="row">
                @if (count($categories) > 0)
                    @foreach ($categories as $item)
                        <div class="col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-0" data-aos="fade" data-aos-delay="">
                            <a class="block-2-item" style="cursor: pointer;"
                                href="{{ route('shop.category', ['title' => $item->title]) }}">
                                <figure class="image">
                                    <img src="/images/categories/{{ $item->thumbnail }}" alt="" class="img-fluid">
                                </figure>
                                <div class="text">
                                    <span class="text-uppercase">Collections</span>
                                    <h3 class="text-capitalize">{{ $item->title }}</h3>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @else
                    <h3>Empty data</h3>
                @endif
            </div>
        </div>
    </div>

    <div class="site-section block-3 site-blocks-2 bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7 site-section-heading text-center pt-4">
                    <h2>Featured Products</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="nonloop-block-3 owl-carousel">
                        @if (count($products) > 0)
                            @foreach ($products as $item)
                                <div class="item">
                                    <a href="{{ route('product.detail', ['id' => $item->id]) }}">
                                        <div class="block-4 text-center">
                                            <figure class="block-4-image">
                                                <img src="images/products/{{ $item->image }}" alt="Image placeholder"
                                                    class="img-fluid">
                                            </figure>
                                            <div class="block-4-text p-4">
                                                <h3><a href="#">{{ $item->title }}</a></h3>
                                                <p class="mb-0">{{ $item->description }}</p>
                                                <div class="d-flex justify-content-center">
                                                    Price:
                                                    <p class="text-primary font-weight-bold">$ {{ $item->price }}
                                                    </p>
                                                </div>
                                                <form action="{{ route('wishlist.new') }}"
                                                    class="d-flex justify-content-around" method="POST">
                                                    @method('PATCH')
                                                    @csrf
                                                    <input type="hidden" name="pro_id" value="{{ $item->id }}">
                                                    <button type="submit" class="btn btn-primary">
                                                        <i class="fa-regular fa-heart"></i>
                                                    </button>
                                                    <a href="{{ route('product.detail', ['id' => $item->id]) }}"
                                                        class="btn btn-primary">
                                                        <i class="fa-regular fa-eye"></i>
                                                    </a>
                                                </form>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        @else
                            <h2>Empty data</h2>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section block-3 site-blocks-2 bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7 site-section-heading text-center pt-4">
                    <h2> Products On Sale</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="nonloop-block-3 owl-carousel">
                        @if (count($products_onsale) > 0)
                            @foreach ($products_onsale as $item)
                                <div class="item">
                                    <a href="{{ route('product.detail', ['id' => $item->id]) }}">
                                        <div class="block-4 text-center">
                                            <figure class="block-4-image">
                                                <img src="images/products/{{ $item->image }}" alt="Image placeholder"
                                                    class="img-fluid">
                                            </figure>
                                            <div class="box-sale position-absolute"
                                                style="top: 0; background: red; padding: 8px 12px; color: #fff">
                                                On Sale
                                            </div>
                                            <div class="block-4-text p-4">
                                                <h3><a href="#">{{ $item->title }}</a></h3>
                                                <p class="mb-0">{{ $item->description }}</p>
                                                <div class="d-flex justify-content-around ">
                                                    <div class="d-flex">Promotion price: <p
                                                            class="pl-2 text-primary font-weight-bold">$
                                                            {{ $item->promotion_price }}
                                                        </p>
                                                    </div>
                                                    <div class="d-flex">
                                                        Old price:
                                                        <p class="text-primary font-weight-bold"
                                                            style="text-decoration: line-through ">$ {{ $item->price }}
                                                        </p>
                                                    </div>
                                                </div>
                                                <form action="{{ route('wishlist.new') }}"
                                                    class="d-flex justify-content-around" method="POST">
                                                    @method('PATCH')
                                                    @csrf
                                                    <input type="hidden" name="pro_id" value="{{ $item->id }}">
                                                    <button type="submit" class="btn btn-primary">
                                                        <i class="fa-regular fa-heart"></i>
                                                    </button>
                                                    <a href="{{ route('product.detail', ['id' => $item->id]) }}"
                                                        class="btn btn-primary">
                                                        <i class="fa-regular fa-eye"></i>
                                                    </a>
                                                </form>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        @else
                            <h2>Empty data</h2>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section block-8">
        <div class="container">
            <div class="row justify-content-center  mb-5">
                <div class="col-md-7 site-section-heading text-center pt-4">
                    <h2>Coupon daily!</h2>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-md-12 col-lg-7 mb-5">
                    <a href=""><img src="images/blog_1.jpg" alt="Image placeholder"
                            class="img-fluid rounded"></a>
                </div>
                <div class="col-md-12 col-lg-5 text-center pl-md-5">
                    <h2><a href="#">Coupon every day at 00:AM </a></h2>
                    <h2 id="daily"> </h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam iste dolor accusantium facere
                        corporis ipsum animi deleniti fugiat. Ex, veniam?</p>
                    <p><a href="{{ route('coupon') }}" class="btn btn-primary btn-sm">Coupon </a></p>
                </div>
            </div>
        </div>
    </div>
    <script>
        var daily = document.getElementById('daily');

        let D = new Date();
        let h = D.getHours();
        let m = D.getMinutes();
        let s = D.getSeconds();

        var x = setInterval(function() {
            let time = 'h-' + (59 - D.getMinutes()) + 'm-' + (59 - D.getSeconds()) + 's';
            daily.innerText = "Time left: " + (23 - D.getHours()) + time;
        }, 1000);
    </script>
@endsection
