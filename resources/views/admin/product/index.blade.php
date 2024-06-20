@extends('layouts.admin')
@section('content')
    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Product</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
            </ol>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h4>Table Products</h4>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Status</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th>Count</th>
                                        <th>Date</th>
                                        <th>Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($products != [])
                                        @foreach ($products as $pro)
                                            <tr>
                                                <th>{{ $pro->id }}</th>
                                                <td>{{ $pro->title }}</td>
                                                <td>
                                                    <span class="badge badge-primary px-2">Sale</span>
                                                    <span class="badge badge-danger px-2">Tax</span>
                                                    <span class="badge badge-success px-2">Extended</span>
                                                </td>
                                                <td>January 22</td>
                                                <td class="color-primary">$21.56</td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <h2>Emty data</h2>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
