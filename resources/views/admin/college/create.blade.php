@extends('layouts.admin')
@section('title', 'College')
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
                                <li class="breadcrumb-item active">College</li>
                            </ol>
                        </div>
                        <div class="col-3 col-md-6 col-lg-4">
                            <a href="{{route('admin.colleges.create')}}" class="btn btn-primary btn-round pull-right d-none d-md-block">Add New Sub Admin</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content sm-gutter">
                <div class="container-fluid padding-25 sm-padding-10">
                    <div class="row">
                        <div class="col-6">
                            <div class="section-title">
                                <h4>{{__('College')}}</h4>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="block form-block mb-4">
                                <form id="college-create" action="{{route('admin.colleges.store')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label>User Name <span class="text-danger">*</span></label>
                                            <input class="form-control @error('name') is-invalid @enderror" placeholder="Name" name="name" type="text" required value="{{ old('name') }}">
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-6">
                                            <label>User Email <span class="text-danger">*</span></label>
                                            <input class="form-control @error('email') is-invalid @enderror" placeholder="Email Address" name="email" type="email" required value="{{ old('email') }}">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label>College Name <span class="text-danger">*</span></label>
                                            <input class="form-control @error('college_detail.college_name') is-invalid @enderror" placeholder="College Name" name="college_detail[college_name]" type="text" required value="{{ old('college_detail.college_name') }}">
                                            @error('college_detail.college_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-6">
                                            <label>Select College Type <span class="text-danger">*</span></label>
                                            <select class="custom-select form-control @error('college_detail.college_type_id') is-invalid @enderror" name="college_detail[college_type_id]" required>
                                                <option value="">Select Type</option>
                                                @foreach ($collegeType as $type )
                                                    <option value="{{$type->id}}">{{$type->name}}</option>
                                               @endforeach
                                            </select>
                                            @error('college_detail.college_type_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label class="tw-font-semibold" for="contactPersonName">Contact Person Name <span class="text-danger">*</span></label>
                                            <input type="text" name="college_detail[contact_person_name]" class="form-control" id="contactPersonName"  value="{{ old('college_detail.contact_person_name') }}">
                                            @error('college_detail.contact_person_name')
                                                <label for="contactPersonName" id="contactPersonName-error" class="error" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </label>
                                            @enderror
                                        </div>
                                        <div class="form-group col-6">
                                            <label class="tw-font-semibold" for="contactPersonEmail">Contact Person Email Address <span class="text-danger">*</span></label>
                                            <input type="email" name="college_detail[email]" class="form-control" id="contactPersonEmail" value="{{ old('college_detail.email') }}">
                                            @error('college_detail.email')
                                            <label for="contactPersonEmail" id="contactPersonEmail-error" class="error" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </label>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label class="tw-font-semibold" for="phone">Contact Number <span class="text-danger">*</span></label>
                                            <input type="tel" name="college_detail[contact_number]" class="form-control" id="phone"   value="{{ old('college_detail.contact_number') }}">
                                            @error('ollege_detail.contact_number')
                                                <label for="phone" id="phone-error" class="error" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </label>
                                            @enderror
                                        </div>
                                        <div class="form-group col-6">
                                            <label class="tw-font-semibold" for="AlternateNumber">Alternate Contact Number <span class="text-danger">*</span></label>
                                            <input type="tel" name="college_detail[alternate_number]" class="form-control" id="AlternateNumber"   value="{{ old('college_detail.alternate_number') }}">
                                            @error('college_detail.alternate_number')
                                                <label for="AlternateNumber" id="phone-error" class="error" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </label>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label class="tw-font-semibold" for="faxNumber">Fax Number <span class="text-danger">*</span></label>
                                            <input type="tel" name="college_detail[fax_number]" class="form-control" id="fexNumber"   value="{{ old('college_detail.fex_number') }}">
                                            @error('college_detail.fax_number')
                                                <label for="faxNumber" id="phone-error" class="error" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </label>
                                            @enderror
                                        </div>
                                        <div class="form-group col-6">
                                            <label class="tw-font-semibold" for="streetAddress">Address <span class="text-danger">*</span></label>
                                            <input type="text" name="college_detail[address]" class="form-control" id="streetAddress"  value="{{ old('college_detail.address') }}">
                                            @error('college_detail.address')
                                                <label for="streetAddress" id="streetAddress-error" class="error" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </label>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label>Select Country <span class="text-danger">*</span></label>
                                            <select class="custom-select form-control @error('college_detail.country_id') is-invalid @enderror" id="Country" name="college_detail[country_id]" required>
                                                <option value="">Select Country</option>
                                                @foreach ($countries as $country )
                                                    <option value="{{$country->id}}">{{$country->name}}</option>
                                               @endforeach
                                            </select>
                                            @error('college_detail.country_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-6">
                                            <label class="tw-font-semibold" for="zip">State <span class="text-danger">*</span></label>
                                            <select name="college_detail[state_id]" class="form-control" id="State">
                                            </select>
                                            @error('college_detail.state_id')
                                                <label for="zip" id="zip-error" class="error" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </label>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label class="tw-font-semibold" for="city">City <span class="text-danger">*</span></label>
                                            <input type="text" name="college_detail[city]" class="form-control" id="city"  value="{{ old('college_detail.city') }}">
                                            @error('college_detail.city')
                                                <label for="city" id="city-error" class="error" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </label>
                                            @enderror
                                        </div>
                                        <div class="form-group col-6">
                                            <label class="tw-font-semibold" for="website">WebSite <span class="text-danger">*</span></label>
                                            <input type="text" name="college_detail[website]" class="form-control" id="website"  value="{{ old('college_detail.website') }}">
                                            @error('college_detail.website')
                                                <label for="website" id="website-error" class="error" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </label>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label class="tw-font-semibold" for="affilated_by">Affilated By <span class="text-danger">*</span></label>
                                            <input type="text" name="college_detail[affilated_by]" class="form-control" id="affilated_by"  value="{{ old('college_detail.affilated_by') }}">
                                            @error('college_detail.affilated_by')
                                                <label for="affilated_by" id="affilated_by-error" class="error" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </label>
                                            @enderror
                                        </div>
                                        <div class="form-group col-6">
                                            <label class="tw-font-semibold" for="year_of_establishment">Year Of Establishmenty <span class="text-danger">*</span></label>
                                            <input type="text" name="college_detail[year_of_establishment]" class="form-control" id="year_of_establishment"  value="{{ old('college_detail.year_of_establishment') }}">
                                            @error('college_detail.year_of_establishment')
                                                <label for="year_of_establishment" id="year_of_establishment-error" class="error" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </label>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="dte_code">Dte Code  <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="dte_code" name="college_detail[dte_code]" placeholder="Dte Code"  value="{{ old('college_detail.dte_code') }}" >
                                            @error('college_detail.dte_code')
                                                <label for="dte_code" id="dte_code-error" class="error" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </label>
                                            @enderror
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="facilites">College Facilites  <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="facilites" name="college_detail[facilites]" placeholder="College Facilites" rows="8">
                                            @error('college_detail.facilites')
                                                <label for="facilites" id="facilites-error" class="error" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </label>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="collegeAbout">About College  <span class="text-danger">*</span></label>
                                            <textarea  class="form-control" id="collegeAbout" name="college_detail[about]" placeholder="About College"></textarea>
                                            @error('college_detail.about')
                                                <label for="collegeAbout" id="collegeAbout-error" class="error" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </label>
                                            @enderror
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="collegeAchivment">Collge Achivements  <span class="text-danger">*</span></label>
                                            <textarea class="form-control" id="collegeAchivment" name="college_detail[achivment]" placeholder="College Achivements"></textarea>
                                            @error('college_detail.achivment')
                                                <label for="collegeAchivment" id="collegeAchivment-error" class="error" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </label>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="authorize_body">Authorize Body  <span class="text-danger">*</span></label>
                                            <textarea   class="form-control" id="authorize_body" name="college_detail[authorize_body]" placeholder="College ISO Details"></textarea>
                                            @error('college_detail.authorize_body')
                                                <label for="authorize_body" id="authorize_body-error" class="error" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </label>
                                            @enderror
                                        </div>
                                        <div class="form-group  col-6">
                                            <label for="collegeISO">College ISO Details  <span class="text-danger">*</span></label>
                                            <textarea   class="form-control" id="collegeISO" name="college_detail[iso_detail]" placeholder="College ISO Details"></textarea>
                                            @error('college_detail.iso_detail')
                                                <label for="collegeISO" id="collegeISO-error" class="error" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </label>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group border-bottom py-4 mb-0">
                                            <label for="">College Added For</label><span class="required">*</span>
                                            <div>
                                                <div class="form-check form-check-inline1">
                                                    <input class="form-check-input" type="checkbox" id="Management"   name="added_for[]"  value="management">
                                                    <label class="form-check-label" for="Management">Management</label>
                                                </div>
                                                <div class="form-check form-check-inline1">
                                                    <input class="form-check-input" type="checkbox" id="Engineering"   name="added_for[]"  value="engineering">
                                                    <label class="form-check-label" for="Engineering">Engineering</label>
                                                </div>
                                                <div class="form-check form-check-inline1">
                                                    <input class="form-check-input"  type="checkbox" id="Medical" name="added_for[]" value="medical">
                                                    <label class="form-check-label"  for="Medical">Medical</label>
                                                </div>
                                                <div class="form-check form-check-inline1">
                                                    <input class="form-check-input" type="checkbox" name="added_for[]" value="Law" id="law">
                                                    <label class="form-check-label" for="Law">Law</label>
                                                </div>
                                                <div class="form-check form-check-inline1">
                                                    <input class="form-check-input"  type="checkbox" name="added_for" value="arts" id="Arts">
                                                    <label class="form-check-label" for="Arts">Arts & Science</label>
                                                </div>
                                                <div class="form-check form-check-inline1">
                                                    <input class="form-check-input" type="checkbox" name="added_for[]" value="commerece" id="Commerece">
                                                    <label class="form-check-label" for="Commerece">Commerce</label>
                                                </div>
                                                <div class="form-check form-check-inline1">
                                                    <input class="form-check-input"   type="checkbox" name="added_for[]" value="education"  id="Education" >
                                                    <label class="form-check-label" for="Education">Education </label>
                                                </div>
                                                <div class="form-check form-check-inline1">
                                                    <input class="form-check-input"  type="checkbox" name="added_for[]" value="design" id="Design">
                                                    <label class="form-check-label" for="Design">Design </label>
                                                </div>
                                                <div class="form-check form-check-inline1">
                                                    <input class="form-check-input"  type="checkbox" name="added_for[]" value="paramedical" id="Paramedical">
                                                    <label class="form-check-label" for="Paramedical">Paramedical</label>
                                                </div>
                                                <div class="form-check form-check-inline1">
                                                    <input class="form-check-input"   type="checkbox" name="added_for[]" value="hotel-management"  id="Hotel Management" >
                                                    <label class="form-check-label" for="Hotel Management">Hotel Management</label>
                                                </div>
                                                <div class="form-check form-check-inline1">
                                                    <input class="form-check-input"  type="checkbox" name="added_for[]" value="computer-application"  id="Computer Application" >
                                                    <label class="form-check-label" for="Computer Application">Computer Application</label>
                                                </div>
                                                <div class="form-check form-check-inline1">
                                                    <input class="form-check-input" type="checkbox"   name="added_for[]"  value="agriculture" id="Agriculture">

                                                    <label class="form-check-label" for="Agriculture">Agriculture</label>
                                                </div>
                                                <div class="form-check form-check-inline1">
                                                    <input class="form-check-input" type="checkbox"   name="added_for[]"  value="pharmacy" id="Pharmacy">
                                                    <label class="form-check-label" for="Pharmacy">Pharmacy</label>
                                                </div>
                                                <div class="form-check form-check-inline1">
                                                    <input class="form-check-input" type="checkbox" name="added_for[]" value="vocational-course" id="Vocational Course">
                                                    <label class="form-check-label" for="Vocational Course">Vocational Course</label>
                                                </div>
                                                <div class="form-check form-check-inline1">
                                                    <input class="form-check-input"  type="checkbox" name="added_for[]" value="mass-communication" id="Mass Communication">
                                                    <label class="form-check-label" for="Mass Communication">Mass Communication</label>
                                                </div>
                                                <div class="form-check form-check-inline1">
                                                    <input class="form-check-input" type="checkbox" name="added_for[]" value="veterinary-science" id="Veterinary Science">
                                                    <label class="form-check-label" for="Veterinary Science">Veterinary Science</label>
                                                </div>
                                                <div class="form-check form-check-inline1">
                                                    <input class="form-check-input"   type="checkbox" name="added_for[]" value="architecture"  id="Architecture">
                                                    <label class="form-check-label" for="Architecture">Architecture</label>
                                                </div>
                                                <div class="form-check form-check-inline1">
                                                    <input class="form-check-input"  type="checkbox" name="added_for[]" value="dental" id="Dental">
                                                    <label class="form-check-label" for="Dental">Dental</label>
                                                </div>
                                                <div class="form-check form-check-inline1">
                                                    <input class="form-check-input"  type="checkbox" name="added_for[]" value="aviation" id="Aviation">
                                                    <label class="form-check-label" for="Aviation">Aviation</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3 form-group">
                                            <label for="broucher">Broucher  <span class="text-danger">*</span></label><br>
                                             <input type="file" name="broucher" required/>
                                             @error('broucher')
                                                <label for="broucher" id="broucher-error" class="error" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </label>
                                            @enderror
                                        </div>
                                        <div class="form-group col-3">
                                            <label for="logo">College Logo (25x25)  <span class="text-danger">*</span></label>
                                            <div class="col-md-8">
                                                <input type="file"  name="logo" required />
                                            </div>
                                            @error('logo')
                                                <label for="logo" id="logo-error" class="error" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </label>
                                            @enderror
                                        </div>
                                        <div class="form-group col-3">
                                            <label for="cover_image">Cover Photo (1400x200)  <span class="text-danger">*</span></label>
                                            <input type="file" name="cover_image" required />
                                            @error('cover_image')
                                                <label for="cover_image" id="cover_image-error" class="error" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </label>
                                            @enderror
                                        </div>
                                        <div class="form-group col-3">
                                            <label for="card_image">College Card Photo  <span class="text-danger">*</span></label>
                                            <input type="file" name="card_image" required />
                                            @error('card_image')
                                                <label for="card_image" id="card_image-error" class="error" role="alert">
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
@push('css')
<style>
    .ck-editor__editable {
        min-height: 200px;
    }
</style>
@endpush
@push('script')
<script>
    $(function() {

        var country_identifier = {{!empty($user->collegeDetail->country_id) ? $user->collegeDetail->country_id : (int) false }};
        var state_identifier = {{!empty($user->collegeDetail->state_id) ? $user->collegeDetail->state_id : (int) false }};

        if (country_identifier) {
            setTimeout(function() {
                $('#Country')
                    .val(country_identifier)
                    .trigger('change');
            }, 100);

        }
        $('#Country').on('change', function() {
            var country_id = $(this).val();
            var token = $('#college-create input[name="_token"]').val();
            $.ajax({
                type:"post",
                url : '{{route("get.state")}}',
                data : {'country_id':country_id,'_token':token},
                success : function(response) {
                    $('#State').empty();
                    $('#State').append('<option>Select State</option>');
                    $.each(response.data, function(key, state) {
                        $('#State').append('<option value="' + state.id + '">' + state.name + '</option>');
                    });
                    if (state_identifier) {

                        $('#State')
                        .val(state_identifier)
                        .trigger('change');
                    }
                },
                error: function() {
                    alert('Error occured');
                }
            });

        });
    });
</script>
    <script src="https://cdn.ckeditor.com/ckeditor5/29.2.0/classic/ckeditor.js"></script>
    <script src="{{asset('js/common/college/ckeditor-ini.js')}}"></script>
    <script src="{{asset('js/common/college/college-create.js')}}"></script>

@endpush

