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
            <div class="col-8 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Product</h4>
                        <div class="basic-form">
                            <form method="POST" action="{{ route('updateProduct', ['id' => $id]) }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <input type="text" name="title" class="form-control input-flat"
                                        value="{{ $title }}" placeholder="Title ">
                                </div>
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <div class="form-group">
                                    <label>Description:</label>
                                    <textarea class="form-control h-150px" value="{{ $description }}" name="description" rows="6" id="comment"></textarea>
                                </div>
                                @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <div class="form-group">
                                    <input type="file" name="image" class="form-control-file">
                                </div>
                                @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <div class="form-group">
                                    <input type="number" value="{{ $price }}" class="form-control" name="price"
                                        placeholder="Price ">
                                </div>
                                @error('price')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <div class="form-group">
                                    <label>Promotion Price:</label>
                                    <input type="number" value="{{ $promotion_price }}" class="form-control"
                                        name="promotion_price" placeholder="Price ">
                                </div>
                                @error('promotion_price')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <div class="form-group">
                                    <label for="">Categories: </label>
                                    <select name="category" class="form-control">
                                        @foreach ($categories as $cat)
                                            <option value="{{ $cat->id }}">{{ $cat->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="number" value="{{ $count }}" class="form-control" name="count"
                                        placeholder="Count ">
                                </div>
                                @error('count')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <button class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
