@extends('layouts.admin')
@section('content')
    <div class="content-body">
        <div class="container-fluid mt-3">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="active-member">
                                <div class="table-responsive">
                                    <table class="table table-xs mb-0">
                                        <thead>
                                            <tr>
                                                <th>Customer</th>
                                                <th>Phone</th>
                                                <th>Email</th>
                                                <th>Role</th>
                                                <th>Created At</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (count($customer) > 0)
                                                @foreach ($customer as $item)
                                                    <tr>
                                                        <td><img src="{{ url('') }}images/account/{{ $item->avatar }}"
                                                                class=" rounded-circle mr-3"
                                                                alt="">{{ $item->name }}</td>
                                                        <td>{{ $item->phone }}</td>
                                                        <td>
                                                            {{ $item->email }}
                                                        </td>
                                                        <td>
                                                            {{ $item->role }}
                                                        </td>
                                                        <td>
                                                            {{ $item->created_at }}
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('admin.account.ban', ['id' => $item->id]) }}"
                                                                class="btn btn-danger">Ban</a>
                                                            <form
                                                                action=" {{ route('admin.account.delete', ['id' => $item->id]) }} "
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button class="btn btn-danger">Delete</button>
                                                            </form>
                                                            <a href="{{ route('admin.account.profile', ['id' => $item->id]) }}"
                                                                class="btn btn-primary">See profile</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <h2>Empty data</h2>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="active-member">
                                <div class="table-responsive">
                                    <table class="table table-xs mb-0">
                                        <thead>
                                            <tr>
                                                <th>Admin</th>
                                                <th>Phone</th>
                                                <th>Email</th>
                                                <th>Role</th>
                                                <th>Created At</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (count($admin) > 0)
                                                @foreach ($admin as $item)
                                                    <tr>
                                                        <td><img src="{{ url('') }}/images//{{ $item->avatar }}"
                                                                class=" rounded-circle mr-3"
                                                                alt="">{{ $item->name }}</td>
                                                        <td>{{ $item->phone }}</td>
                                                        <td>
                                                            {{ $item->email }}
                                                        </td>
                                                        <td>
                                                            {{ $item->role }}
                                                        </td>
                                                        <td>
                                                            {{ $item->created_at }}
                                                        </td>
                                                        <td>
                                                            <form
                                                                action="{{ route('admin.account.delete', ['id' => $item->id]) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button class="btn btn-danger">Delete</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <h2>Empty data</h2>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="active-member">
                                <div class="table-responsive">
                                    <table class="table table-xs mb-0">
                                        <thead>
                                            <tr>
                                                <th>Banned</th>
                                                <th>Phone</th>
                                                <th>Email</th>
                                                <th>Role</th>
                                                <th>Created At</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (count($ban) > 0)
                                                @foreach ($ban as $item)
                                                    <tr>
                                                        <td><img src="{{ url('') }}/images/{{ $item->avatar }}"
                                                                class=" rounded-circle mr-3"
                                                                alt="">{{ $item->name }}</td>
                                                        <td>{{ $item->phone }}</td>
                                                        <td>
                                                            {{ $item->email }}
                                                        </td>
                                                        <td>
                                                            {{ $item->role }}
                                                        </td>
                                                        <td>
                                                            {{ $item->created_at }}
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('admin.account.removeban', ['id' => $item->id]) }}"
                                                                class="btn btn-primary">Remove Ban</a>
                                                            <form
                                                                action="{{ route('admin.account.delete', ['id' => $item->id]) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button class="btn btn-danger">Delete</button>
                                                            </form>
                                                            <a href="{{ route('admin.account.profile', ['id' => $item->id]) }}"
                                                                class="btn btn-primary">See profile</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <h4>Empty data</h4>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
