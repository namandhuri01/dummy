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
                                <li class="breadcrumb-item active">Course</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content sm-gutter">
                <div class="container-fluid padding-25 sm-padding-10">
                    <div class="row">
                        <div class="col-6">
                            <div class="section-title">
                                <h4>{{__('Course')}}</h4>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="block form-block mb-4">
                                <form id="college-create" action="{{route('admin.courses.store')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label>Name <span class="text-danger">*</span></label>
                                            <input class="form-control @error('name') is-invalid @enderror" placeholder="Name" name="name" type="text" required value="{{ old('name') }}">
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-6">
                                            <label>Type <span class="text-danger">*</span></label>
                                            <input class="form-control @error('type') is-invalid @enderror" name="type" type="type" required value="{{ old('type') }}">
                                            @error('type')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label>Fee <span class="text-danger">*</span></label>
                                            <input class="form-control @error('fee') is-invalid @enderror" name="fee" type="text" required value="{{ old('fee') }}">
                                            @error('fee')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-6">
                                            <label>Duration <span class="text-danger">*</span></label>
                                            <input class="form-control @error('duration') is-invalid @enderror" name="duration" type="text" required value="{{ old('duration') }}">
                                            @error('duration')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="collegeAbout">Course Details  <span class="text-danger">*</span></label>
                                            <textarea  class="form-control" id="collegeAbout" name="course_details"></textarea>
                                            @error('course_details')
                                                <label for="collegeAbout" id="collegeAbout-error" class="error" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </label>
                                            @enderror
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="collegeAchivment">Eligibility <span class="text-danger">*</span></label>
                                            <textarea class="form-control" id="collegeAchivment" name="eligibility" ></textarea>
                                            @error('eligibility')
                                                <label for="collegeAchivment" id="collegeAchivment-error" class="error" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </label>
                                            @enderror
                                        </div>

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
@push('script')
    <script src="{{asset('js/common/college/ckeditor-ini.js')}}"></script>
@endpush

