@extends('layouts.admin')
@section('content')
    <div class="content-body">

        <div class="row page-titles mx-0">
            <div class="col p-md-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="media align-items-center mb-4">
                                <img class="mr-3" src="images/avatar/11.png" width="80" height="80" alt="">
                                <div class="media-body">
                                    <h3 class="mb-0">{{ $user->name }}</h3>
                                    <p class="text-muted mb-0">Canada</p>
                                </div>
                            </div>
                            <h4>About Me</h4>
                            <p class="text-muted">{{ $user->description }}</p>
                            <ul class="card-profile__info">
                                <li class="mb-1"><strong class="text-dark mr-4">Mobile</strong>
                                    <span>{{ $user->phone }}</span>
                                </li>
                                <li><strong class="text-dark mr-4">Email</strong> <span>{{ $user->email }}</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #/ container -->
    </div>
@endsection
