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
                                        <th>Created At</th>
                                        <th>Price</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($products) > 0)
                                        @foreach ($products as $pro)
                                            <tr>
                                                <th>{{ $pro->id }}</th>
                                                <td>{{ $pro->title }}</td>
                                                <td>
                                                    <span class="badge badge-primary px-2">Sale</span>
                                                    <span class="badge badge-danger px-2">Tax</span>

                                                    <span class="badge badge-success px-2">Extended</span>
                                                </td>
                                                <td width=40>{{ $pro->description }}</td>
                                                <td><img style="width: 280px"
                                                        src="{{ url('') }}/images/products/{{ $pro->image }}"
                                                        alt=""></td>
                                                <td>{{ $pro->count }}</td>
                                                <td>{{ $pro->created_at }}</td>
                                                <td class="color-primary">{{ $pro->price }} vnd</td>
                                                <td>
                                                    <form action="{{ route('deleteProduct', ['id' => $pro->id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" href="" class="btn btn-danger">Delete
                                                        </button>
                                                    </form>
                                                    <a href=" {{ route('ShowFormEditProduct', ['id' => $pro->id]) }} "
                                                        class="btn btn-primary">Edit</a>
                                                </td>
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
