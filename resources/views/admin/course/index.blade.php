@extends('layouts.admin')
@section('title', 'Courses')
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
                            <li class="breadcrumb-item active">Courses</li>
                        </ol>
                    </div>
                    @can('create')
                        <div class="col-3 col-md-6 col-lg-4">
                            <a href="{{route('admin.courses.create')}}" class="btn btn-primary btn-round pull-right d-none d-md-block">Add New Course</a>
                        </div>
                    @endcan
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
                            <h4>{{__('Courses')}}</h4>
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
                                                <th>Type</th>
                                                <th>Fee</th>
                                                <th>Duration</th>
                                                <th>Detail</th>
                                                <th>Eligibility</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @can('index')
                                                @foreach ($courses as $course )
                                                    <tr>
                                                        <td>{{$loop->index+1}}</td>
                                                        <td class="name">{{$course->name}}</td>
                                                        <td class="name">{{$course->type}}</td>
                                                        <td class="name">Rs{{$course->fee}}</td>
                                                        <td class="name">{{$course->duration}}</td>
                                                        <td class="name">{!!$course->course_details!!}</td>
                                                        <td class="name">{!!$course->eligibility!!}</td>
                                                        <td>
                                                            @can('edit')
                                                                <a href="{{route('admin.courses.edit',$course->id)}}" id="edit-item"><i class="fa fa-edit"></i></a>
                                                            @endcan
                                                            @can('delete')
                                                                <a href="{{ route('admin.courses.destroy', $course->id)}}" data-method="delete" class="category-delete" ><i class="fa fa-trash"></i></a>
                                                            @endcan
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endcan
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
