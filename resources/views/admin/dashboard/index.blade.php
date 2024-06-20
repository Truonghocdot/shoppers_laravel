@extends('layouts.admin')
@section('content')
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-1">
                    <div class="card-body">
                        <h3 class="card-title text-white">Products</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">{{ $countProducts }}</h2>
                            <p class="text-white mb-0">{{ date('Y-m-d-h') }}</p>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-shopping-cart"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-2">
                    <div class="card-body">
                        <h3 class="card-title text-white">Categories</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">{{ $countCategories }}</h2>
                            <p class="text-white mb-0">{{ date('Y-m-d-h') }}</p>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-list"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-3">
                    <div class="card-body">
                        <h3 class="card-title text-white"> Blogs</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">{{ $countBlogs }}</h2>
                            <p class="text-white mb-0">{{ date('Y-m-d-h') }}</p>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-newspaper"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-4">
                    <div class="card-body">
                        <h3 class="card-title text-white">Accounts </h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">{{ $countUsers }}</h2>
                            <p class="text-white mb-0">{{ date('Y-m-d-h') }}</p>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-4">
                    <div class="card-body">
                        <h3 class="card-title text-white">Orders </h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">{{ $countOrders }}</h2>
                            <p class="text-white mb-0">{{ date('Y-m-d-h') }}</p>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa-solid fa-truck"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card card-widget">
                    <div class="card-body">
                        <h5 class="text-muted">Order Overview </h5>
                        <h2 class="mt-4">5680</h2>
                        <span>Total Revenue</span>
                        <div class="mt-4">
                            <h4>30</h4>
                            <h6>Online Order <span class="pull-right">30%</span></h6>
                            <div class="progress mb-3" style="height: 7px">
                                <div class="progress-bar bg-primary" style="width: 30%;" role="progressbar"><span
                                        class="sr-only">30% Order</span>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4">
                            <h4>50</h4>
                            <h6 class="m-t-10 text-muted">Offline Order <span class="pull-right">50%</span></h6>
                            <div class="progress mb-3" style="height: 7px">
                                <div class="progress-bar bg-success" style="width: 50%;" role="progressbar"><span
                                        class="sr-only">50% Order</span>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4">
                            <h4>20</h4>
                            <h6 class="m-t-10 text-muted">Cash On Develery <span class="pull-right">20%</span></h6>
                            <div class="progress mb-3" style="height: 7px">
                                <div class="progress-bar bg-warning" style="width: 20%;" role="progressbar"><span
                                        class="sr-only">20% Order</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-12 col-sm-12 col-xxl-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-0">Store Location</h4>
                        <div id="world-map" style="height: 470px;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
