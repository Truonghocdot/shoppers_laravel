@extends('layouts.user')
@section('main')
    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0"><a href="{{ route('home') }}">Home</a> <span class="mx-2 mb-0">/</span> <strong
                        class="text-black">Shop</strong></div>
            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">

            <div class="row mb-5">
                <div class="col-md-9 order-2">

                    <div class="row">
                        <div class="col-md-12 mb-5">
                            <div class="float-md-left mb-4">
                                <h2 class="text-black h5"><a href="">Shop All</a></h2>
                            </div>
                            <div class="d-flex">
                                <div class="dropdown mr-1 ml-md-auto">
                                </div>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-secondary btn-sm dropdown-toggle"
                                        id="dropdownMenuReference" data-toggle="dropdown">Reference</button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuReference">
                                        <a class="dropdown-item" href="{{ route('shop.search') }}?arrange=ASC">Name,
                                            A to Z</a>
                                        <a class="dropdown-item" href="{{ route('shop.search') }}?arrange=DESC">Name,
                                            Z to A</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="{{ route('shop.search') }}?price=ASC">Price, low to
                                            high</a>
                                        <a class="dropdown-item" href="{{ route('shop.search') }}?price=DESC">Price, high to
                                            low</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-5">
                        @if (count($products) > 0)
                            @foreach ($products as $item)
                                <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
                                    <div class="block-4 text-center border">
                                        <figure class="block-4-image">
                                            <a href="{{ route('product.detail', ['id' => $item->id]) }}"><img
                                                    src="{{ url('') }}/images/products/{{ $item->image }}"
                                                    alt="Image placeholder" class="img-fluid"></a>
                                        </figure>
                                        @if ($item->promotion_price > 0)
                                            <div class="box-sale position-absolute"
                                                style="top: 0; background: red; padding: 8px 12px; color: #fff">
                                                On Sale
                                            </div>
                                        @endif
                                        <div class="block-4-text p-4">
                                            <h3>
                                                <a
                                                    href="{{ route('product.detail', ['id' => $item->id]) }}">{{ $item->title }}</a>
                                            </h3>
                                            <p class="mb-0">{{ $item->description }}</p>
                                            @if ($item->promotion_price > 0)
                                                <div class="d-flex justify-content-around ">
                                                    <div class="d-flex">New price:
                                                        <p class="pl-2 text-primary font-weight-bold">$
                                                            {{ $item->promotion_price }}
                                                        </p>
                                                    </div>
                                                    <div class="d-flex">
                                                        <p class="text-primary font-weight-bold"
                                                            style="text-decoration: line-through ">$ {{ $item->price }}
                                                        </p>
                                                    </div>
                                                </div>
                                            @else
                                                <p class="text-primary font-weight-bold">Price: ${{ $item->price }}</p>
                                            @endif
                                            <form action="{{ route('wishlist.new') }}"
                                                class="d-flex justify-content-between" method="POST">
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
                                </div>
                            @endforeach
                        @else
                            <h2>Empty data</h2>
                        @endif
                    </div>
                </div>

                <div class="col-md-3 order-1 mb-5 mb-md-0">
                    <div class="border p-4 rounded mb-4">
                        <h3 class="mb-3 h6 text-uppercase text-black d-block">Categories</h3>
                        <ul class="list-unstyled mb-0">
                            @foreach ($categories as $item)
                                <li class="mb-1"><a href="" class="d-flex"><span
                                            style="text-transform: capitalize">{{ $item->title }}</span>
                                        <span class="text-black ml-auto">({{ $item->count_product }})</span></a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="border p-4 rounded mb-4">
                        <h3 class="mb-3 h6 text-uppercase text-black d-block">Type</h3>
                        <ul class="list-unstyled mb-0">
                            @foreach ($type as $item)
                                <li class="mb-1"><a href="{{ route('shop.search') }}?type={{ $item->title }}"
                                        class="d-flex"><span style="text-transform: capitalize">{{ $item->title }}</span>
                                        <span class="text-black ml-auto">({{ $item->count_product }})</span></a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="border p-4 rounded mb-4">
                        <div class="mb-4">
                            <form action="{{ route('shop.search') }}" method="GET">
                                @csrf
                                <h3 class="mb-3 h6 text-uppercase text-black d-block">Filter by Price</h3>
                                <div id="slider-range" class="border-primary"></div>
                                <input type="text" name="arrange_price" id="amount"
                                    class="form-control border-0 pl-0 bg-white" />
                                <button type="submit" class="btn btn-primary">Search</button>
                            </form>
                        </div>
                    </div>
                    <div class="border p-4 rounded mb-4">
                        <div class="mb-4">
                            <form action="" method="GET">
                                @csrf
                                <h3 class="mb-3 h6 text-uppercase text-black d-block">Search by Name</h3>
                                <div id="slider-range" class="border-primary"></div>
                                <input class="mb-4" type="text" name="title" placeholder="Name product">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="site-section site-blocks-2">
                        <div class="row justify-content-center text-center mb-5">
                            <div class="col-md-7 site-section-heading pt-4">
                                <h2>Categories</h2>
                            </div>
                        </div>
                        <div class="row">
                            @if (count($categories) > 0)
                                @foreach ($categories as $item)
                                    <div class="col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-0" data-aos="fade"
                                        data-aos-delay="">
                                        <a class="block-2-item" href="">
                                            <figure class="image">
                                                <img src="{{ url('') }}/images/categories/{{ $item->thumbnail }}"
                                                    alt="" class="img-fluid">
                                            </figure>
                                            <div class="text">
                                                <span class="text-uppercase">Collections</span>
                                                <h3 class="text-capitalize">{{ $item->title }}</h3>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            @else
                                <h2>Empty Data.</h2>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
