@extends('layouts.user')
@section('main')
    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0"><a href="index.html">Home</a> <span class="mx-2 mb-0">/</span> <strong
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
                                <h2 class="text-black h5">Shop All</h2>
                            </div>
                            <div class="d-flex">
                                <div class="dropdown mr-1 ml-md-auto">
                                </div>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-secondary btn-sm dropdown-toggle"
                                        id="dropdownMenuReference" data-toggle="dropdown">Reference</button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuReference">
                                        <a class="dropdown-item"
                                            href="{{ route('shop.fillter.name', ['type' => 'ASC']) }}">Name, A to Z</a>
                                        <a class="dropdown-item"
                                            href="{{ route('shop.fillter.name', ['type' => 'DESC']) }}">Name, Z to A</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item"
                                            href="{{ route('shop.fillter.price', ['type' => 'ASC']) }}">Price, low to
                                            high</a>
                                        <a class="dropdown-item"
                                            href="{{ route('shop.fillter.price', ['type' => 'DESC']) }}">Price, high to
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
                                        <div class="block-4-text p-4">
                                            <h3><a
                                                    href="{{ route('product.detail', ['id' => $item->id]) }}">{{ $item->title }}</a>
                                            </h3>
                                            <p class="mb-0">{{ $item->description }}</p>
                                            <p class="text-primary font-weight-bold">${{ $item->price }}</p>
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
                                <li class="mb-1"><a href="{{ route('shop.category', ['title' => $item->title]) }}"
                                        class="d-flex"><span>{{ $item->title }}</span> <span
                                            class="text-black ml-auto">({{ $item->count_product }})</span></a></li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="border p-4 rounded mb-4">
                        <div class="mb-4">
                            <form action="{{ route('shop.price.range') }}">
                                <h3 class="mb-3 h6 text-uppercase text-black d-block">Filter by Price</h3>
                                <div id="slider-range" class="border-primary"></div>
                                <input type="text" name="text" id="amount"
                                    class="form-control border-0 pl-0 bg-white" />
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
                                    <div class="col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-0" data-aos="fade" data-aos-delay="">
                                        <a class="block-2-item"
                                            href="{{ route('shop.category', ['title' => $item->title]) }}">
                                            <figure class="image">
                                                <img src="{{ url('') }}/images/categories/{{ $item->thumbnail }}"
                                                    alt="" class="img-fluid">
                                            </figure>
                                            <div class="text">
                                                <span class="text-uppercase">Collections</span>
                                                <h3>{{ $item->title }}</h3>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            @else
                            @endif
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
