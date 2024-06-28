@extends('layouts.admin')

@section('content')
    <div class="col-lg-12 mt-5">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div class="card-title">
                        <h4>Products Of Order</h4>
                    </div>
                    <a href="{{ route('admin.order') }}" class="btn btn-primary">Back To Order</a>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Time created</th>
                                <th>Price</th>
                                <th>Title</th>
                                <th>Image </th>
                                <th>Size</th>
                                <th>Count</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orderItems as $item)
                                <tr>
                                    <th>{{ $item->id }}</th>
                                    <td>{{ $item->created_at }}</td>
                                    <td>
                                        @if ($item->promotion_price > 0)
                                            {{ $item->promotion_price }}
                                        @else
                                            {{ $item->price }}
                                        @endif
                                    </td>
                                    <td>{{ $item->title }}</td>
                                    <td><img style="max-width: 120px;" src="/images/products/{{ $item->image }}"
                                            alt=""></td>
                                    <td>{{ $item->size }}</td>
                                    <td>{{ $item->count }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
