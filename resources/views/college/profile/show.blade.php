@extends('layouts.college')
@section('title', 'Profile')
@section('content')
    <!--Page Container-->
    <section class="page-container">
        <?php
            $collegeDetail = $user->collegeDetail ? $user->collegeDetail : [];
        ?>
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
                                <li class="breadcrumb-item"><a href="{{route('college.dashboard.index')}}">Dashboard</a></li>
                                <li class="breadcrumb-item active">College</li>
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
                                <h4>{{__('College')}}</h4>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="block form-block mb-4">
                                <form id="college-edit" action="{{route('college.profile.update',$user->id)}}" method="post" enctype="multipart/form-data">
                                    @method('put')
                                    @csrf

                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label>User Name <span class="text-danger">*</span></label>
                                            <input class="form-control @error('name') is-invalid @enderror" placeholder="Name" name="name" type="text" required value="{{ old('name', $user->name) }}" readonly>
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-6">
                                            <label>User Email <span class="text-danger">*</span></label>
                                            <input class="form-control @error('email') is-invalid @enderror" placeholder="Email Address" name="email" type="email" required value="{{ old('email', $user->email) }}" readonly>
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
                                            <?php $college_name = $collegeDetail->college_name ?? '';?>
                                            <input class="form-control @error('college_detail.college_name') is-invalid @enderror" placeholder="College Name" name="college_detail[college_name]" type="text" required value="{{ old('college_detail.college_name',$college_name) }}">
                                            @error('college_detail.college_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-6">
                                            <label>Select College Type <span class="text-danger">*</span></label>
                                            <?php $type_id = $collegeDetail->college_type_id ?? '';?>
                                            <select class="custom-select form-control @error('college_detail.college_type_id') is-invalid @enderror" name="college_detail[college_type_id]" required>
                                                <option value="">Select Type</option>
                                                @foreach ($collegeType as $type )
                                                    <option value="{{$type->id}}" {{$type_id == $type->id ? 'selected': ''}} {{$type->id}}{{$type_id}}>{{$type->name}}</option>
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
                                            <?php $contact_person_name = $collegeDetail->contact_person_name ?? '';?>
                                            <input type="text" name="college_detail[contact_person_name]" class="form-control" id="contactPersonName"  value="{{ old('college_detail.contact_person_name',$contact_person_name) }}">
                                            @error('college_detail.contact_person_name'),
                                                <label for="contactPersonName" id="contactPersonName-error" class="error" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </label>
                                            @enderror
                                        </div>
                                        <div class="form-group col-6">
                                            <label class="tw-font-semibold" for="contactPersonEmail">Contact Person Email Address <span class="text-danger">*</span></label>
                                            <?php $email = $collegeDetail->email ?? '';?>
                                            <input type="email" name="college_detail[email]" class="form-control" id="contactPersonEmail" value="{{ old('college_detail.email',$email) }}">
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
                                            <?php $contact_number = $collegeDetail->contact_number ?? '';?>
                                            <input type="tel" name="college_detail[contact_number]" class="form-control" id="phone"   value="{{ old('college_detail.contact_number',$contact_number) }}">
                                            @error('ollege_detail.contact_number')
                                                <label for="phone" id="phone-error" class="error" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </label>
                                            @enderror
                                        </div>
                                        <div class="form-group col-6">
                                            <label class="tw-font-semibold" for="AlternateNumber">Alternate Contact Number <span class="text-danger">*</span></label>
                                            <?php $alternate_number = $collegeDetail->alternate_number ?? '';?>
                                            <input type="tel" name="college_detail[alternate_number]" class="form-control" id="AlternateNumber"   value="{{ old('college_detail.alternate_number',$alternate_number) }}">
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
                                            <?php $fax_number = $collegeDetail->fax_number ?? '';?>
                                            <input type="tel" name="college_detail[fax_number]" class="form-control" id="fexNumber"   value="{{ old('college_detail.fax_number',$fax_number) }}">
                                            @error('college_detail.fax_number')
                                                <label for="faxNumber" id="phone-error" class="error" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </label>
                                            @enderror
                                        </div>
                                        <div class="form-group col-6">
                                            <label class="tw-font-semibold" for="streetAddress">Address <span class="text-danger">*</span></label>
                                            <?php $address = $collegeDetail->address ?? '';?>
                                            <input type="text" name="college_detail[address]" class="form-control" id="streetAddress"  value="{{ old('college_detail.address',$address) }}">
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
                                            <label class="tw-font-semibold" for="State">State <span class="text-danger">*</span></label>
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
                                            <?php $city = $collegeDetail->city ?? '';?>
                                            <input type="text" name="college_detail[city]" class="form-control" id="city"  value="{{ old('college_detail.city',$city) }}">
                                            @error('college_detail.city')
                                                <label for="city" id="city-error" class="error" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </label>
                                            @enderror
                                        </div>
                                        <div class="form-group col-6">
                                            <label class="tw-font-semibold" for="website">WebSite <span class="text-danger">*</span></label>
                                            <?php $website = $collegeDetail->website ?? '';?>
                                            <input type="text" name="college_detail[website]" class="form-control" id="website"  value="{{ old('college_detail.website',$website) }}">
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
                                            <?php $affilated_by = $collegeDetail->affilated_by ?? '';?>
                                            <input type="text" name="college_detail[affilated_by]" class="form-control" id="affilated_by"  value="{{ old('college_detail.affilated_by',$affilated_by) }}">
                                            @error('college_detail.affilated_by')
                                                <label for="affilated_by" id="affilated_by-error" class="error" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </label>
                                            @enderror
                                        </div>
                                        <div class="form-group col-6">
                                            <label class="tw-font-semibold" for="year_of_establishment">Year Of Establishmenty <span class="text-danger">*</span></label>
                                            <?php $year_of_establishment = $collegeDetail->year_of_establishment ?? '';?>
                                            <input type="text" name="college_detail[year_of_establishment]" class="form-control" id="year_of_establishment"  value="{{ old('college_detail.year_of_establishment',$year_of_establishment) }}">
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
                                            <?php $dte_code = $collegeDetail->dte_code ?? '';?>
                                            <input type="text" class="form-control" id="dte_code" name="college_detail[dte_code]" placeholder="Dte Code"  value="{{ old('college_detail.dte_code',$dte_code) }}" >
                                            @error('college_detail.dte_code')
                                                <label for="dte_code" id="dte_code-error" class="error" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </label>
                                            @enderror
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="facilites">College Facilites  <span class="text-danger">*</span></label>
                                            <?php $facilites = $collegeDetail->facilites ?? '';?>
                                            <input type="text" class="form-control" id="facilites" name="college_detail[facilites]" placeholder="College Facilites" value="{{ old('college_detail.facilites',$facilites) }}">
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
                                            <?php $about = $collegeDetail->about ?? '';?>
                                            <textarea  class="form-control" id="collegeAbout" name="college_detail[about]" placeholder="About College">{!! $about!!}</textarea>
                                            @error('college_detail.about')
                                                <label for="collegeAbout" id="collegeAbout-error" class="error" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </label>
                                            @enderror
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="collegeAchivment">Collge Achivements  <span class="text-danger">*</span></label>
                                            <?php $achivment = $collegeDetail->achivment ?? '';?>
                                            <textarea class="form-control" id="collegeAchivment" name="college_detail[achivment]" placeholder="College Achivements">{!!$achivment!!}</textarea>
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
                                            <?php $authorize_body = $collegeDetail->authorize_body ?? '';?>
                                            <textarea   class="form-control" id="authorize_body" name="college_detail[authorize_body]" placeholder="College ISO Details">{!!$authorize_body!!}</textarea>
                                            @error('college_detail.authorize_body')
                                                <label for="authorize_body" id="authorize_body-error" class="error" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </label>
                                            @enderror
                                        </div>
                                        <div class="form-group  col-6">
                                            <label for="collegeISO">College ISO Details  <span class="text-danger">*</span></label>
                                            <?php $iso_detail = $collegeDetail->iso_detail ?? '';?>
                                            <textarea   class="form-control" id="collegeISO" name="college_detail[iso_detail]" placeholder="College ISO Details">{!! $iso_detail !!}</textarea>
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
                                            <?php $added_for =unserialize($collegeDetail->added_for) ?? ''; ?>
                                            <div>
                                                <div class="form-check form-check-inline1">
                                                    <input class="form-check-input" type="checkbox" id="Management"   name="added_for[]"  value="management" {{in_array_r("management", $added_for) ? 'checked' : ''}}>
                                                    <label class="form-check-label" for="Management">Management</label>
                                                </div>
                                                <div class="form-check form-check-inline1">
                                                    <input class="form-check-input" type="checkbox" id="Engineering"   name="added_for[]"  value="engineering" {{in_array_r("engineering", $added_for) ? 'checked' : ''}}>
                                                    <label class="form-check-label" for="Engineering">Engineering</label>
                                                </div>
                                                <div class="form-check form-check-inline1">
                                                    <input class="form-check-input"  type="checkbox" id="Medical" name="added_for[]" value="medical" {{in_array_r("medical", $added_for) ? 'checked' : ''}}>
                                                    <label class="form-check-label"  for="Medical">Medical</label>
                                                </div>
                                                <div class="form-check form-check-inline1">
                                                    <input class="form-check-input" type="checkbox" name="added_for[]" value="law" id="law" {{in_array_r("law", $added_for) ? 'checked' : ''}}>
                                                    <label class="form-check-label" for="Law">Law</label>
                                                </div>
                                                <div class="form-check form-check-inline1">
                                                    <input class="form-check-input"  type="checkbox" name="added_for" value="arts" id="Arts" {{in_array_r("arts", $added_for) ? 'checked' : ''}}>
                                                    <label class="form-check-label" for="Arts">Arts & Science</label>
                                                </div>
                                                <div class="form-check form-check-inline1">
                                                    <input class="form-check-input" type="checkbox" name="added_for[]" value="commerece" id="Commerece" {{in_array_r("commerece", $added_for) ? 'checked' : ''}}>
                                                    <label class="form-check-label" for="Commerece">Commerce</label>
                                                </div>
                                                <div class="form-check form-check-inline1">
                                                    <input class="form-check-input"   type="checkbox" name="added_for[]" value="education"  id="Education" {{in_array_r("education", $added_for) ? 'checked' : ''}}>
                                                    <label class="form-check-label" for="Education">Education </label>
                                                </div>
                                                <div class="form-check form-check-inline1">
                                                    <input class="form-check-input"  type="checkbox" name="added_for[]" value="design" id="Design" {{in_array_r("design", $added_for) ? 'checked' : ''}}>
                                                    <label class="form-check-label" for="Design">Design </label>
                                                </div>
                                                <div class="form-check form-check-inline1">
                                                    <input class="form-check-input"  type="checkbox" name="added_for[]" value="paramedical" id="Paramedical" {{in_array_r("paramedical", $added_for) ? 'checked' : ''}}>
                                                    <label class="form-check-label" for="Paramedical">Paramedical</label>
                                                </div>
                                                <div class="form-check form-check-inline1">
                                                    <input class="form-check-input"   type="checkbox" name="added_for[]" value="hotel-management"  id="Hotel Management" {{in_array_r("hotel-management", $added_for) ? 'checked' : ''}}>
                                                    <label class="form-check-label" for="Hotel Management">Hotel Management</label>
                                                </div>
                                                <div class="form-check form-check-inline1">
                                                    <input class="form-check-input"  type="checkbox" name="added_for[]" value="computer-application"  id="Computer Application" {{in_array_r("computer-application", $added_for) ? 'checked' : ''}}>
                                                    <label class="form-check-label" for="Computer Application">Computer Application</label>
                                                </div>
                                                <div class="form-check form-check-inline1">
                                                    <input class="form-check-input" type="checkbox"   name="added_for[]"  value="agriculture" id="Agriculture" {{in_array_r("agriculture", $added_for) ? 'checked' : ''}}>

                                                    <label class="form-check-label" for="Agriculture">Agriculture</label>
                                                </div>
                                                <div class="form-check form-check-inline1">
                                                    <input class="form-check-input" type="checkbox"   name="added_for[]"  value="pharmacy" id="Pharmacy" {{in_array_r("pharmacy", $added_for) ? 'checked' : ''}}>
                                                    <label class="form-check-label" for="Pharmacy">Pharmacy</label>
                                                </div>
                                                <div class="form-check form-check-inline1">
                                                    <input class="form-check-input" type="checkbox" name="added_for[]" value="vocational-course" id="Vocational Course" {{in_array_r("vocational-course", $added_for) ? 'checked' : ''}}>
                                                    <label class="form-check-label" for="Vocational Course">Vocational Course</label>
                                                </div>
                                                <div class="form-check form-check-inline1">
                                                    <input class="form-check-input"  type="checkbox" name="added_for[]" value="mass-communication" id="Mass Communication" {{in_array_r("mass-communication", $added_for) ? 'checked' : ''}}>
                                                    <label class="form-check-label" for="Mass Communication">Mass Communication</label>
                                                </div>
                                                <div class="form-check form-check-inline1">
                                                    <input class="form-check-input" type="checkbox" name="added_for[]" value="veterinary-science" id="Veterinary Science" {{in_array_r("veterinary-science", $added_for) ? 'checked' : ''}}>
                                                    <label class="form-check-label" for="Veterinary Science">Veterinary Science</label>
                                                </div>
                                                <div class="form-check form-check-inline1">
                                                    <input class="form-check-input"   type="checkbox" name="added_for[]" value="architecture"  id="Architecture" {{in_array_r("architecture", $added_for) ? 'checked' : ''}}>
                                                    <label class="form-check-label" for="Architecture">Architecture</label>
                                                </div>
                                                <div class="form-check form-check-inline1">
                                                    <input class="form-check-input"  type="checkbox" name="added_for[]" value="aviation" id="Dental" {{in_array_r("aviation", $added_for) ? 'checked' : ''}}>
                                                    <label class="form-check-label" for="Dental">Dental</label>
                                                </div>
                                                <div class="form-check form-check-inline1">
                                                    <input class="form-check-input"  type="checkbox" name="added_for[]" value="aviation" id="Aviation" {{in_array_r("aviation", $added_for) ? 'checked' : ''}}>
                                                    <label class="form-check-label" for="Aviation">Aviation</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3 form-group">
                                            <label for="broucher">Broucher  <span class="text-danger">*</span></label><br>
                                             <input type="file" name="broucher"/>
                                             @error('broucher')
                                                <label for="broucher" id="broucher-error" class="error" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </label>
                                            @enderror
                                        </div>
                                        <div class="form-group col-3">
                                            <label for="logo">College Logo (25x25)  <span class="text-danger">*</span></label>
                                            <div class="col-md-8">
                                                <input type="file"  name="logo" />
                                            </div>
                                            @error('logo')
                                                <label for="logo" id="logo-error" class="error" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </label>
                                            @enderror
                                        </div>
                                        <div class="form-group col-3">
                                            <label for="cover_image">Cover Photo (1400x200)  <span class="text-danger">*</span></label>
                                            <input type="file" name="cover_image" />
                                            @error('cover_image')
                                                <label for="cover_image" id="cover_image-error" class="error" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </label>
                                            @enderror
                                        </div>
                                        <div class="form-group col-3">
                                            <label for="card_image">College Card Photo  <span class="text-danger">*</span></label>
                                            <input type="file" name="card_image" />
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
            var token = $('#college-edit input[name="_token"]').val();
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
    <script src="{{asset('js/common/college/ckeditor-ini.js')}}"></script>
    <script src="{{asset('js/common/college/college-edit.js')}}"></script>

@endpush

