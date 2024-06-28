@extends('layouts.admin')

@section('content')
    <div class="col-lg-12 mt-5">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div class="card-title">
                        <h4>Wait For Confirm</h4>
                    </div>
                    <form action="{{ route('admin.order') }}" class="d-flex" method="GET">
                        @csrf
                        <input type="text" class="form-control" value="" name='search'
                            placeholder="Enter name user">
                        <button class="btn btn-primary" type="submit">Search</button>
                    </form>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Time created</th>
                                <th>Price</th>
                                <th>User</th>
                                <th>Full Name </th>
                                <th>Address</th>
                                <th>Email</th>
                                <th>Payment</th>
                                <th>Notes</th>
                                <th>Phone</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($wait) > 0)
                                @foreach ($wait as $item)
                                    <tr>
                                        <th>{{ $item->id }}</th>
                                        <td>{{ $item->created_at }}</td>
                                        <td>{{ $item->total_money }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->full_name }}</td>
                                        <td>{{ $item->address }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->payment }}</td>
                                        <td>{{ $item->notes }}</td>
                                        <td>{{ $item->userphone }}</td>
                                        <td>
                                            <a href="{{ route('admin.order.detail', ['id' => $item->id]) }}"
                                                class="btn btn-primary">Detail</a>
                                            <a href="{{ route('admin.order.confirm', ['id' => $item->id]) }}"
                                                class="btn btn-primary">Confirm</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <p class="text-danger fz-4">Have not any order at present!</p>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12 mt-5">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h4>Preparing!</h4>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Time created</th>
                                <th>Price</th>
                                <th>User</th>
                                <th>Full Name </th>
                                <th>Address</th>
                                <th>Email</th>
                                <th>Payment</th>
                                <th>Notes</th>
                                <th>Phone</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($prepare) > 0)
                                @foreach ($prepare as $item)
                                    <tr>
                                        <th>{{ $item->id }}</th>
                                        <td>{{ $item->created_at }}</td>
                                        <td>{{ $item->total_money }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->full_name }}</td>
                                        <td>{{ $item->address }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->payment }}</td>
                                        <td>{{ $item->notes }}</td>
                                        <td>{{ $item->userphone }}</td>
                                        <td>
                                            <a href="{{ route('admin.order.detail', ['id' => $item->id]) }}"
                                                class="btn btn-primary">Detail</a>
                                            <a href="{{ route('admin.order.confirm', ['id' => $item->id]) }}"
                                                class="btn btn-primary">Confirm</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <p class="text-danger fz-4">Have not any order at present!</p>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12 mt-5">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h4>Being Transport!</h4>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Time created</th>
                                <th>Price</th>
                                <th>User</th>
                                <th>Full Name </th>
                                <th>Address</th>
                                <th>Email</th>
                                <th>Payment</th>
                                <th>Notes</th>
                                <th>Phone</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($transport) > 0)
                                @foreach ($transport as $item)
                                    <tr>
                                        <th>{{ $item->id }}</th>
                                        <td>{{ $item->created_at }}</td>
                                        <td>{{ $item->total_money }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->full_name }}</td>
                                        <td>{{ $item->address }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->payment }}</td>
                                        <td>{{ $item->notes }}</td>
                                        <td>{{ $item->userphone }}</td>
                                        <td><a href="{{ route('admin.order.detail', ['id' => $item->id]) }}"
                                                class="btn btn-primary">Detail</a>
                                            <a href="{{ route('admin.order.confirm', ['id' => $item->id]) }}"
                                                class="btn btn-primary">Confirm</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <p class="text-danger fz-4">Have not any order at present!</p>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12 mt-5">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h4>Completed!</h4>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Time created</th>
                                <th>Price</th>
                                <th>User</th>
                                <th>Full Name </th>
                                <th>Address</th>
                                <th>Email</th>
                                <th>Payment</th>
                                <th>Notes</th>
                                <th>Phone</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($completed) > 0)
                                @foreach ($completed as $item)
                                    <tr>
                                        <th>{{ $item->id }}</th>
                                        <td>{{ $item->created_at }}</td>
                                        <td>{{ $item->total_money }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->full_name }}</td>
                                        <td>{{ $item->address }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->payment }}</td>
                                        <td>{{ $item->notes }}</td>
                                        <td>{{ $item->userphone }}</td>

                                    </tr>
                                @endforeach
                            @else
                                <p class="text-danger fz-4">Have not any order at present!</p>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
