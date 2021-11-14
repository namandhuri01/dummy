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
                    @can('create')
                        <div class="col-3 col-md-6 col-lg-4">
                            <a href="{{route('admin.sub-admins.create')}}" class="btn btn-primary btn-round pull-right d-none d-md-block">Add New Sub Admin</a>
                        </div>
                    @endcan
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
                                            @can('index')
                                                @foreach($subadmins as $user)
                                                    <tr>
                                                        <td>{{$loop->index+1}}</td>
                                                        <td class="name">{{$user->name}}</td>
                                                        <td>{{$user->email}}</td>
                                                        <td>{{$user->role_name}}</td>
                                                        <td class="d-flex">
                                                        @can('show')
                                                            <a class="ml-3" href="{{ route('admin.sub-admins.show', [ 'sub_admin'=> $user->id ]) }}" >
                                                                <i class="fa fa-eye"></i> View
                                                            </a>
                                                        @endcan
                                                        @can('edit')
                                                            <a class="ml-3" href="{{ route('admin.sub-admins.edit', [ 'sub_admin'=> $user->id ]) }}" >
                                                                <i class="fa fa-pencil"></i> Edit
                                                            </a>
                                                        @endcan
                                                        @can('delete')
                                                            @if(!$user->deleted_at)
                                                                <form action="{{ route('admin.sub-admins.destroy',['sub_admin' => $user->id ]) }}" method="POST">
                                                                    {{ csrf_field() }}
                                                                    {{ method_field('DELETE') }}
                                                                    <a href="#">
                                                                        <i class="fa fa-trash" data-message="delete">
                                                                            Delete
                                                                        </i>
                                                                    </a>
                                                                </form>
                                                            @else
                                                                <form action="{{ route('admin.sub-admins.destroy',[ 'sub_admin' => $user->id ]) }}" method="POST">
                                                                    {{ csrf_field() }}
                                                                    {{ method_field('DELETE') }}
                                                                    <a href="#">
                                                                        <i class="fa fa-undo text-danger" data-message="restore">
                                                                            Restore
                                                                        </i>
                                                                    </a>
                                                                </form>
                                                            @endif
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
@push('script')
	<script type="text/javascript">
		$('.fa-trash, .fa-undo').on('click', function(e){
			let msg = $(this).attr('data-message');
			let form = $(this).closest('form');
			if(confirm(`Are you sure want to ${msg} this client?`)) {
				form.submit();
			}
		});
	</script>
@endpush
