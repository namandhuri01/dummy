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
                    <div class="col-lg-8 d-none d-lg-block">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard.index')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Categories</li>
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
                            <h4>Categories</h4>
                        </div>
                    </div>
                    @can('create')
                        <div class="col-6">
                            <a href="#" class="btn btn-primary btn-round pull-right"  data-toggle="modal" data-target="#exampleModalCenter">Add New Category</a>
                        </div>
                    @endcan

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
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @can('index')
                                            @foreach($categories as $category)
                                                <tr id="tr_{{$category->id}}">
                                                    <td>{{$loop->index+1}}</td>
                                                    <td class="name">{{$category->name}}</td>
                                                    <td class="name">{{$category->type}}</td>
                                                    <td>
                                                        @can('edit')
                                                            <a href="#" id="edit-item" data-item-id="{{$category->id}}" data-item-name="{{$category->name}}" data-item-type="{{$category->type}}"><i class="fa fa-edit"></i></a>
                                                        @endcan
                                                        @can('delete')
                                                            <a href="{{ route('admin.categories.destroy', $category->id)}}" data-method="delete" class="category-delete" ><i class="fa fa-trash"></i></a>
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
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.categories.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Category Name:</label>
                        <input type="text" name="name" class="form-control input-lg @error('name') is-invalid @enderror" placeholder="Category Name"  required>
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
                    <div class="form-group text-right">
                        <button class="btn btn-primary " type="submit">Submit</button>
                    </div>
                </form>
            </div>
          </div>
        </div>
    </div>
    <div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="edit-modal-label" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="edit-modal-label">Edit Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="attachment-body-content">
                    <form id="edit-form"  action="#" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label>Category Name</label>
                            <input type="hidden" name="id" id="category-id" >
                            <input type="text" name="name" id ="category-name" class="form-control input-lg @error('name') is-invalid @enderror" placeholder="Category Name"  required>
                            @error('name')
                                <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Category Type</label>
                            <input type="text" name="type" id ="category-type" class="form-control input-lg @error('type') is-invalid @enderror" placeholder="Category Type"  required>
                            @error('type')
                                <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group text-right">
                            <button class="btn btn-primary " type="submit">Submit</button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>

</section>
@endsection
@push('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-confirmation/1.0.5/bootstrap-confirmation.min.js"></script>
    <script>
        $(document).ready(function() {
            /**
             * for showing edit item popup
             */

            $(document).on('click', "#edit-item", function() {
                $(this).addClass('edit-item-trigger-clicked'); //useful for identifying which trigger was clicked and consequently grab data from the correct row and not the wrong one.

                var options = {
                'backdrop': 'static'
                };
                $('#edit-modal').modal(options)
            })

            // on modal show
            $('#edit-modal').on('show.bs.modal', function() {
                var el = $(".edit-item-trigger-clicked"); // See how its usefull right here?
                var row = el.closest(".data-row");

                // get the data
                var id = el.data('item-id');
                var name = el.data('item-name');
                var type = el.data('item-name');
                var formAction = "/admin/categories/" + id;
                $('#edit-form').attr('action', formAction);

                // fill the data in the input fields
                $("#category-id").val(id);
                $("#category-name").val(name);
                $("#category-type").val(type);

            })

            // on modal hide
            $('#edit-modal').on('hide.bs.modal', function() {
                $('.edit-item-trigger-clicked').removeClass('edit-item-trigger-clicked')
                $("#edit-form").trigger("reset");
            })
        })

    </script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).on('click', 'a.category-delete', function(e) {
                e.preventDefault(); // does not go through with the link.

                var $this = $(this);
                url = $this.attr('href');
                alert(url);
                $.post({
                    type: $this.data('method'),
                    url: $this.attr('href')
                }).done(function (data) {
                    if (data.success === true) {
						toastr.success(data.message);
						window.location.reload();
					} else {
						toastr.error(data.message);
					}
                });
        });
</script>
@endpush

