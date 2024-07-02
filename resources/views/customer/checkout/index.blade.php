@extends('layouts.user')
@section('main')
    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0"><a href="{{ route('home') }}">Home</a> <span class="mx-2 mb-0">/</span> <a
                        href="{{ route('cart.index') }}">Cart</a> <span class="mx-2 mb-0">/</span> <strong
                        class="text-black">Checkout</strong>
                </div>
            </div>
        </div>
    </div>
    <div class="site-section">
        <div class="container">
            <form class="row" action="{{ route('pay') }}" method="POST">
                <div class="col-md-6 mb-5 mb-md-0">
                    <h2 class="h3 mb-3 text-black">Billing Details</h2>
                    <div class="p-3 p-lg-5 border">
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="c_fname" class="text-black">First Name <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="c_fname" value="{{ old('c_fname') }}"
                                    name="c_fname">
                            </div>
                            @error('c_fname')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <div class="col-md-6">
                                <label for="c_lname" class="text-black">Last Name <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="c_lname" name="c_lname"
                                    value="{{ old('c_lname') }}">
                            </div>
                            @error('c_lname')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="c_province" class="text-black">Province <span class="text-danger">*</span></label>
                            <select class="form-select" name="c_province" type="select" required="">
                                <option value="">Vui lòng chọn một tỉnh.</option>
                                <option value="Lào Cai">Lào Cai</option>
                                <option value="Hưng Yên">Hưng Yên</option>
                                <option value="Hòa Bình">Hòa Bình</option>
                                <option value="Sơn La">Sơn La</option>
                                <option value="Điện Biên">Điện Biên</option>
                                <option value="Lai Châu">Lai Châu</option>
                                <option value="Yên Bái">Yên Bái</option>
                                <option value="Bình Định">Bình Định</option>
                                <option value="Ninh Thuận">Ninh Thuận</option>
                                <option value="Phú Yên">Phú Yên</option>
                                <option value="Kon Tum">Kon Tum</option>
                                <option value="Bình Thuận">Bình Thuận</option>
                                <option value="Bạc Liêu">Bạc Liêu</option>
                                <option value="Cà Mau">Cà Mau</option>
                                <option value="Hậu Giang">Hậu Giang</option>
                                <option value="Bắc Ninh">Bắc Ninh</option>
                                <option value="Bắc Giang">Bắc Giang</option>
                                <option value="Lạng Sơn">Lạng Sơn</option>
                                <option value="Cao Bằng">Cao Bằng</option>
                                <option value="Bắc Kạn">Bắc Kạn</option>
                                <option value="Thái Nguyên">Thái Nguyên</option>
                                <option value="Quảng Nam">Quảng Nam</option>
                                <option value="Quảng Ngãi">Quảng Ngãi</option>
                                <option value="Đắk Nông">Đắk Nông</option>
                                <option value="Tây Ninh">Tây Ninh</option>
                                <option value="Bình Phước">Bình Phước</option>
                                <option value="Quảng Trị">Quảng Trị</option>
                                <option value="Quảng Bình">Quảng Bình</option>
                                <option value="Hà Tĩnh">Hà Tĩnh</option>
                                <option value="Nghệ An">Nghệ An</option>
                                <option value="Thanh Hóa">Thanh Hóa</option>
                                <option value="Ninh Bình">Ninh Bình</option>
                                <option value="Hà Nam">Hà Nam</option>
                                <option value="Nam Định">Nam Định</option>
                                <option value="Quảng Ninh">Quảng Ninh</option>
                                <option value="Phú Thọ">Phú Thọ</option>
                                <option value="Tuyên Quang">Tuyên Quang</option>
                                <option value="Hà Giang">Hà Giang</option>
                                <option value="Thái Bình">Thái Bình</option>
                                <option value="Hải Dương">Hải Dương</option>
                                <option value="Hải Phòng">Hải Phòng</option>
                                <option value="Thừa Thiên - Huế">Thừa Thiên - Huế</option>
                                <option value="Vĩnh Phúc">Vĩnh Phúc</option>
                                <option value="Cần Thơ">Cần Thơ</option>
                                <option value="Kiên Giang">Kiên Giang</option>
                                <option value="Sóc Trăng">Sóc Trăng</option>
                                <option value="An Giang">An Giang</option>
                                <option value="Đồng Tháp">Đồng Tháp</option>
                                <option value="Vĩnh Long">Vĩnh Long</option>
                                <option value="Trà Vinh">Trà Vinh</option>
                                <option value="Bến Tre">Bến Tre</option>
                                <option value="Tiền Giang">Tiền Giang</option>
                                <option value="Long An">Long An</option>
                                <option value="Đắk Lắk">Đắk Lắk</option>
                                <option value="Lâm Đồng">Lâm Đồng</option>
                                <option value="Khánh Hòa">Khánh Hòa</option>
                                <option value="Gia Lai">Gia Lai</option>
                                <option value="Bà Rịa - Vũng Tàu">Bà Rịa - Vũng Tàu</option>
                                <option value="Bình Dương">Bình Dương</option>
                                <option value="Đồng Nai">Đồng Nai</option>
                                <option value="Đà Nẵng">Đà Nẵng</option>
                                <option value="Hồ Chí Minh">Hồ Chí Minh</option>
                                <option value="Hà Nội">Hà Nội</option>
                            </select>
                        </div>
                        @error('c_province')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="c_district" class="text-black">District <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="c_district" name="c_district"
                                    value="{{ old('c_district') }}" placeholder="Street address">
                            </div>
                        </div>
                        @error('c_district')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="c_ward" class="text-black">Ward <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="c_ward" name="c_ward"
                                    value="{{ old('c_ward') }}" placeholder="Street address">
                            </div>
                        </div>
                        @error('c_ward')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div class="form-group row mb-5">
                            <div class="col-md-6">
                                <label for="c_email_address" class="text-black">Email Address <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="c_email_address" name="c_email_address"
                                    value="{{ old('c_email_address') }}">
                            </div>
                            @error('c_email_address')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <div class="col-md-6">
                                <label for="c_phone" class="text-black">Phone <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" id="c_phone" name="c_phone"
                                    value="{{ old('c_phone') }}" placeholder="Phone Number">
                            </div>
                            @error('c_phone')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <input type="hidden" name="redirect" value="true">
                        </div>
                        <div class="form-group">
                            <label for="c_order_notes" class="text-black">Order Notes</label>
                            <textarea name="c_order_notes" id="c_order_notes" cols="30" rows="5" class="form-control"
                                value="{{ old('c_order_notes') }}" placeholder="Write your notes here..."></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row mb-5">
                        <div class="col-md-12">
                            <h2 class="h3 mb-3 text-black">Your Order</h2>
                            <div class="p-3 p-lg-5 border">
                                <table class="table site-block-order-table mb-5">
                                    <thead>
                                        <th>Product</th>
                                        <th>Size</th>
                                        <th>Count</th>
                                        <th>Total</th>
                                    </thead>
                                    <tbody>
                                        @if (count($cart_item) > 0)
                                            @foreach ($cart_item as $item)
                                                <tr>
                                                    <td>{{ $item->title }}

                                                    </td>
                                                    <td><strong class="mx-2">{{ $item->size }}</strong></td>
                                                    <td>
                                                        {{ $item->count }}
                                                    </td>
                                                    <td>
                                                        @if ($item->promotion_price > 0)
                                                            {{ $item->promotion_price }}
                                                        @else
                                                            {{ $item->price }}
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <p class="text-black"></p>
                                        @endif
                                    </tbody>
                                    @if (count($coupon) > 0)
                                        <thead>
                                            <th>Coupon</th>
                                            <th>Total</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($coupon as $item)
                                                <tr>
                                                    <td class="text-black font-weight-bold">
                                                        <strong>{{ $item->content }}</strong>
                                                    </td>
                                                    <td class="text-black ">-{{ $item->value }}%
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    @endif
                                    <tbody>
                                        <tr>
                                            <td class="text-black font-weight-bold"><strong>Order Total</strong></td>
                                            <td></td>
                                            <td></td>
                                            <td class="text-black font-weight-bold"><strong>${{ $total_price }}</strong>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <h3>Method payment</h3>
                                <div class="border p-3 mb-3">
                                    <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#collapsecheque"
                                            role="button" aria-expanded="false"
                                            aria-controls="collapsecheque">Postpaid</a></h3>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="postpaid" name="payment"
                                            id="payment" required checked>
                                    </div>
                                    <div class="collapse" id="collapsecheque">
                                        <div class="py-2">
                                            <p class="mb-0">You will pay after recive order, you can check or test
                                                product.If you not satisfied with product, you can to return that product.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="border p-3 mb-5">
                                    <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#collapsepaypal"
                                            role="button" aria-expanded="false" aria-controls="collapsepaypal">Vnpay</a>
                                    </h3>
                                    <div class="form-check">
                                        <input class="form-check-input" value="vnpay" type="radio" name="payment"
                                            id="payment" checked>
                                    </div>
                                    <div class="collapse" id="collapsepaypal">
                                        <div class="py-2">
                                            <p class="mb-0">Make your payment directly into our bank account. Please use
                                                your Order ID as the payment reference. Your order won’t be shipped until
                                                the funds have cleared in our account.</p>
                                        </div>
                                    </div>
                                </div>
                                @error('invalid')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                @csrf
                                <div class="form-group">
                                    <button class="btn btn-primary btn-lg py-3 btn-block" type="submit">Place
                                        Order</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
