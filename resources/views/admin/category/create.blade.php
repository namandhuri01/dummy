@extends('layouts.admin')
@section('title', 'Categories')
@section('content')
<section class="page-container">
    <div class="page-content-wrapper">
        <!--Header Fixed-->
        <div class="header fixed-header">
            <div class="container-fluid" style="padding: 10px 25px">
                <div class="row">
                    <div class="col-9 col-md-6 d-lg-none">
                        <a id="toggle-navigation" href="javascript:void(0);" class="icon-btn mr-3"><i class="fa fa-bars"></i></a>
                        <span class="logo">{{env('ADMIN_APP_NAME')}}</span>
                    </div>
                    <div class="col-lg-12 d-none d-lg-block">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Forms</li>
                            <li class="breadcrumb-item active">Validation</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content sm-gutter">
            <div class="container-fluid padding-25 sm-padding-10">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title">
                            <h4>Categories</h4>
                        </div>
                    </div>
                    <div class="col-12 col-lg-8">
                        <div class="block form-block mb-4">

                            <form id="needs-validation" action="{{ route('admin.categories.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Category Name:</label>
                                    <input type="text" name="name" class="form-control input-lg @error('name') is-invalid @enderror" placeholder="Enter Category Name"  required>
                                    @error('name')
                                        <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Category Type:</label>
                                    <input type="text" name="type" class="form-control input-lg @error('type') is-invalid @enderror" placeholder="Category Type"  required>
                                    @error('type')
                                        <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <a class="btn btn-primary" href="{{ route('admin.categories.index') }}">Back</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</section>
@endsection
