@extends('layouts.college')
@section('title', 'Change Password')
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
                        <span class="logo">{{env('APP_NAME')}}</span>
                    </div>
                    <div class="col-lg-8 d-none d-lg-block">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('college.dashboard.index')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">{{ __(strtoupper('Change Password')) }}</li>
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
                            <h4>{{__('Change Password')}}</h4>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="block bg-trans table-block mb-4">
                            <div class="row">
                                <div class="col-md-4 mx-auto">
                                    <div class="card">
                                        <div class="card-body">
                                            <form method="POST" action="{{ route('college.change-password.store') }}" id="ChangePasswordForm">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="Password">{{ __('Current Password') }}</label>
                                                    <input type="password" name="current_password" class="form-control" id="Password" required>
                                                    @error('current_password')
                                                    <label class="">{{ $message }}</label>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="NewPassword">{{ __('New Password') }}</label>
                                                    <input type="password" name="new_password" class="form-control" id="NewPassword" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="ConfirmPassword">{{ __('Confirm New Password') }}</label>
                                                    <input type="password" name="new_confirm_password" class="form-control" id="ConfirmPassword" required>
                                                </div>
                                                <div class="form-group text-right">
                                                    <a href="{{route('college.dashboard.index')}}" class="btn btn-default">{{__('Cancel')}}</a>
                                                    <button type="submit" class="btn btn-primary1">{{__('Submit')}}</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
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

@push('scripts')
    <script type="text/javascript" src="{{ asset('js/common/change-password/change-password.js') }}"></script>
@endpush
