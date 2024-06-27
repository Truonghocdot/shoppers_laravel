@extends('layouts.user')
@section('main')
    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0"><a href="{{ route('home') }}">Home</a> <span class="mx-2 mb-0">/</span> <strong
                        class="text-black">{{ $category->title }}</strong></div>
            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="/images/products/{{ $product->image }}" alt="Image" class="img-fluid">
                </div>
                <form action="{{ route('cart.add.item') }}" method="POST" class="col-md-6">
                    <h2 class="text-black">{{ $product->title }}</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur, vitae, explicabo? Incidunt
                        facere, natus soluta dolores iusto! Molestiae expedita veritatis nesciunt doloremque sint asperiores
                        fuga voluptas, distinctio, aperiam, ratione dolore.</p>
                    <p class="mb-4">{{ $product->description }}</p>
                    @if ($product->promotion_price > 0)
                        <div class="d-flex justify-content-around w-75">
                            <div class="d-flex">Promotion Price: <strong
                                    class="text-primary h4 ml-1">${{ $product->promotion_price }}.00</strong>
                            </div>

                            <div class="d-flex">Old Price: <strong class="text-primary h4 ml-1 "
                                    style="text-decoration: line-through">${{ $product->price }}.00</strong></div>

                        </div>
                    @else
                        <p><strong class="text-primary h4">${{ $product->price }}.00</strong></p>
                    @endif
                    <div class="mb-1 d-flex">
                        @csrf
                        <input type="hidden" name="pro_id" value="{{ $product->id }}">
                        <label for="option-sm" class="d-flex mr-3 mb-3">
                            <span class="d-inline-block mr-2" style="top:-2px; position: relative;"><input type="radio"
                                    id="option-sm" value="S" required name="shop-sizes"></span> <span
                                class="d-inline-block text-black">Small</span>
                        </label>
                        <label for="option-md" class="d-flex mr-3 mb-3">
                            <span class="d-inline-block mr-2" style="top:-2px; position: relative;"><input type="radio"
                                    id="option-md" value="M" name="shop-sizes"></span> <span
                                class="d-inline-block text-black">Medium</span>
                        </label>
                        <label for="option-lg" class="d-flex mr-3 mb-3">
                            <span class="d-inline-block mr-2" style="top:-2px; position: relative;"><input type="radio"
                                    id="option-lg" value="L" name="shop-sizes"></span> <span
                                class="d-inline-block text-black">Large</span>
                        </label>
                        <label for="option-xl" class="d-flex mr-3 mb-3">
                            <span class="d-inline-block mr-2" style="top:-2px; position: relative;"><input type="radio"
                                    id="option-xl" value='XL' name="shop-sizes"></span> <span
                                class="d-inline-block text-black"> Extra
                                Large</span>
                        </label>
                    </div>
                    <div class="mb-5">
                        <div class="input-group mb-3" style="max-width: 120px;">
                            <div class="input-group-prepend">
                                <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                            </div>
                            <input type="text" value="1" id="count_product" class="form-control text-center"
                                placeholder="" aria-label="Example text with button addon" name="count"
                                aria-describedby="button-addon1">
                            <div class="input-group-append">
                                <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                            </div>
                        </div>
                    </div>
                    <div class=''><button id='button-submit' type="submit" class="buy-now btn btn-sm btn-primary">Add
                            To Cart</button>
                    </div>
                </form>
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
                                    <div class="block-4 text-center">
                                        <figure class="block-4-image">
                                            <img src="{{ url('') }}/images/products/{{ $item->image }}"
                                                alt="Image placeholder" class="img-fluid">
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
            </div>
        </div>
    </div>
    <script></script>
@endsection
