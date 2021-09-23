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
                </div>
            </div>
        </div>
        <div class="content sm-gutter">
            <div class="container-fluid padding-25 sm-padding-10">
                <div class="row">
                    <div class="col-12">
                        @if(Session::has('successMessage'))
                            <div class="alert alert-success">
                                {{session('successMessage')}}
                            </div>
                        @endif
                        @if(Session::has('errorMessage'))
                            <div class="alert alert-danger">
                                {{session('errorMessage')}}
                            </div>
                        @endif
                    </div>
                    <div class="col-6">
                        <div class="section-title">
                            <h4>{{__('Sub-Admins')}}</h4>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="block bg-trans table-block mb-4">
                            <div class="row">
                                <div class="table-responsive">
                                    <table id="dataTable1" class="display table table-striped" data-table="data-table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Role</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($subadmins as $user)
                                                <tr>
                                                    <td>{{$loop->index+1}}</td>
                                                    <td class="name">{{$user->name}}</td>
                                                    <td>{{$user->email}}</td>
                                                    <td>{{$user->role_id}}</td>
                                                    <td>
                                                    @if($user->status)
                                                        <input type="checkbox"  data-user-id="{{$user->hash_id}}" name="status" class="userStatus" data-off="Inactive" data-on="Active" checked  data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-style="ios"></td>
                                                    @else
                                                        <input type="checkbox"  data-user-id="{{$user->hash_id}}" name="status" class="userStatus" data-off="Inactive" data-on="Active"   data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-style="ios">
                                                    @endif
                                                    </td>
                                                </tr>
                                            @endforeach
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
</section>
@endsection
@push('script')
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<script>
$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
    }
});
$(".userStatus").change(function () {
    var mode = $(this).prop("checked");
    var userId = $(this).attr("data-user-id");
    $.ajax({
        type: "POST",
        dataType: "JSON",
        url: "/admin/update/status",
        data: {
            mode: mode,
            userId: userId
        },
        success: function (data) {
            var data = eval(data);
        }
    });
});
</script>
@endpush
@push('css')
    <style>
    .toggle.ios, .toggle-on.ios, .toggle-off.ios { border-radius: 20px; }
    .toggle.ios .toggle-handle { border-radius: 20px; }
    </style>
@endpush
