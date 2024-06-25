@extends('layouts.admin')
@section('content')
    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Category</a></li>
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
                            <h4>Table Categories</h4>
                        </div>
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('ShowFormAddCategory') }}" class="btn btn-primary">Add category</a>
                            <form action="{{ route('admin.categories.search') }}" class="d-flex" method="GET">
                                @csrf
                                <input type="text" class="form-control" value="{{ $title }}" name='title'
                                    placeholder="Enter name category">
                                <button class="btn btn-primary" type="submit">Search</button>
                            </form>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Image</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($categories) > 0)
                                        @foreach ($categories as $cat)
                                            <tr>
                                                <th>{{ $cat['id'] }}</th>
                                                <td>{{ $cat['title'] }}</td>
                                                <td><img style="width: 150px"
                                                        src="{{ url('') }}/images/categories/{{ $cat['thumbnail'] }}"
                                                        alt=""></td>
                                                <td>{{ $cat['created_at'] }}</td>
                                                <td>
                                                    <form action="{{ route('deleteCategory', ['id' => $cat['id']]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button
                                                            onclick="return confirm('Do you really want to delete this item?')"
                                                            type="submit" href="" class="btn btn-danger">Delete
                                                        </button>
                                                    </form>
                                                    <a href=" {{ route('ShowFormEditCategory', ['id' => $cat['id']]) }} "
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
