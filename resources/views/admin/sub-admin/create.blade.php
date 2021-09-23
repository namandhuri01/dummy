@extends('layouts.admin')
@section('title', 'Users')
@section('content')
    <!--Page Container-->
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
                        <div class="col-lg-8 d-none d-lg-block">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard.index')}}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Sub-Admins</li>
                            </ol>
                        </div>
                        <div class="col-3 col-md-6 col-lg-4">
                            <a href="{{route('admin.sub-admins.create')}}" class="btn btn-primary btn-round pull-right d-none d-md-block">Add New Sub Admin</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content sm-gutter">
                <div class="container-fluid padding-25 sm-padding-10">
                    <div class="row">
                        <div class="col-6">
                            <div class="section-title">
                                <h4>{{__('Sub-Admins')}}</h4>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="block form-block mb-4">
                                <form id="sub-admin-create" action="{{route('admin.sub-admins.store')}}" novalidate="" method="post">
                                    @csrf
                                    <div class="form-group ">
                                        <label>Name</label>
                                        <input class="form-control @error('name') is-invalid @enderror" placeholder="Name" name="name" type="text" required>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input class="form-control @error('email') is-invalid @enderror" placeholder="Email Address" name="email" type="email" required>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Password</label>
                                            <input class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" type="password" required>
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Confirm Password</label>
                                            <input class="form-control" placeholder="Confirm password" name="password_confirmation" type="password" required autocomplete="new-password">
                                            <div class="invalid-feedback">This field is requires</div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Select Role</label>
                                        <select class="custom-select form-control @error('role_id') is-invalid @enderror" name="role_id" required>
                                            <option value="">Select State</option>
                                            <option value="2">Editor</option>
                                            <option value="3">Manager</option>
                                        </select>
                                        @error('role_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <hr>
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

