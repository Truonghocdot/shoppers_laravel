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
                        <h4 class="card-title">Create New Product</h4>
                        <div class="basic-form">
                            <form method="POST" action="{{ route('StoreNewProduct') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <input type="text" name="title" class="form-control input-flat"
                                        placeholder="Title ">
                                </div>
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <div class="form-group">
                                    <label>Description:</label>
                                    <textarea class="form-control h-150px" name="description" rows="6" id="comment"></textarea>
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
                                    <input type="number" class="form-control" name="price" placeholder="Price ">
                                </div>
                                @error('price')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <div class="form-group">
                                    <label>Promotion Price:</label>
                                    <input type="number" value="0" class="form-control" name="Price promotion"
                                        placeholder="Price ">
                                </div>
                                <div class="form-group">
                                    <label for="">Categories: </label>
                                    <select class="form-control">
                                        <option>Children</option>
                                        <option>Men</option>
                                        <option>Women</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="number" class="form-control" name="count" placeholder="Count ">
                                </div>
                                @error('count')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <button class="btn btn-primary">Create</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
