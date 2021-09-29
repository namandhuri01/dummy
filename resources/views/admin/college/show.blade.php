@extends('layouts.admin')

@section('content')

<section class="page-container">
    <div class="page-content-wrapper">
        <main>
            <div class="bg-white px-4 py-2 mt-4 shadow-sm">
                <div class="row">
                    <?php $profile = $user->collegeDetail;
                    ?>
                    <div id="profile-upper">
                        <div id="profile-banner-image" class="position-relative">
                            <img src="{{ ($profile)?$profile->banner:asset('images/banner/VIaL8H.jpg') }}" alt="Banner image">
                            <div id="profile-d" class="d-flex align-items-center">
                                <div id="profile-pic">
                                    <img src="{{ ($profile)?$profile->thumb_logo:asset('images/profile/profile.png') }}">
                                </div>
                                <div class="d-flex flex-column">
                                    <div id="u-name" class="ml-3">{{__($user->full_name)}}</div>
                                    <div class="text-white ml-3"><strong>{{ $user->email }}</strong></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-body food-order-tab px-0">
                            <ul class="nav nav-pills border-b-0">
                                <li class="nav-item">
                                    <a class="nav-link active ch-link-data" id="business-tab" href="#business_detail">{{__('College Detail')}}</a>
                                </li>
                            </ul>
                            <div class="tab-content mt-4" id="myTabContent">
                                <div class="tab-pane fade show active " id="business_detail">
                                    <div class="col-lg-12">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="details-info">
                                                    <h3> College Detail</h3>
                                                    <table class="table">
                                                        <tbody>
                                                            <tr>
                                                                <td>College Name</td>
                                                                <td>
                                                                    {{
                                                                        ($user->collegeDetail)
                                                                        ?
                                                                            $user->name
                                                                        :"N/A"
                                                                    }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Business Email</td>
                                                                <td>
                                                                    {{
                                                                        ($user->collegeDetail)
                                                                        ?
                                                                            $user->collegeDetail
                                                                        :"N/A"
                                                                    }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Phone no:</td>
                                                                <td>
                                                                    {{
                                                                        ($user->collegeDetail)
                                                                        ?
                                                                            $user->college_detail
                                                                        :"N/A"
                                                                    }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Address:</td>
                                                                <td>
                                                                    {{
                                                                        ($user->collegeDetail)
                                                                        ?
                                                                            $user->college_detail
                                                                        :"N/A"
                                                                    }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>State:</td>
                                                                <td>
                                                                    {{
                                                                        ($user->collegeDetail)
                                                                        ?
                                                                            $user->college_detail
                                                                        :"N/A"
                                                                    }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Country:</td>
                                                                <td>
                                                                    {{
                                                                        ($user->collegeDetail)
                                                                        ?
                                                                            $user->college_detail
                                                                        :"N/A"
                                                                    }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Zip:</td>
                                                                <td>
                                                                    {{
                                                                        ($user->collegeDetail)
                                                                        ?
                                                                            $user->college_detail
                                                                        :"N/A"
                                                                    }}
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="details-info">
                                                    <h3> Food Details</h3>

                                                    <table class="table">
                                                        <tbody>
                                                            <tr>
                                                                <td>Min Order:</td>
                                                                <td>
                                                                    {{
                                                                        ($user->collegeDetail)
                                                                        ?
                                                                            $user->college_detail
                                                                        :"N/A"
                                                                    }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Description:</td>
                                                                <td>
                                                                    {{
                                                                        ($user->collegeDetail)
                                                                        ?
                                                                            $user->college_detail
                                                                        :"N/A"
                                                                    }}
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="menu_item">
                                    <div class="row justify-content-md-center">
                                        <div class="col-12 pb-2" >
                                            <div class="col-6 float-left">
                                                <h3 class="pb-2">{{__('Food Item Menu')}}</h3>
                                            </div>
                                            <div class="col-6 float-left text-right">
                                                <a href="" class="btn btn-primary">{{__('Add Menu')}}</a>
                                            </div>
                                        </div>
                                        <section class="col-12 clearfix">
                                            <div class="card p-3 shadow-none mb-0">
                                                <div class="card-body p-0">
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>{{__('Image')}}</th>
                                                                    <th>
                                                                        {{__('Name')}}
                                                                    </th>
                                                                    <th>
                                                                            {{__('Price')}}
                                                                    </th>
                                                                    <th class="text-nowrap"> {{__('Category Name')}} </th>
                                                                    <th class="text-nowrap">{{ __('Diet Type Name') }}</th>
                                                                    <th>
                                                                        {{ __('Action') }}
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                            </tbody>
                                                        </table>
                                                        <div class="text-right">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="categories">
                                    <div class="row justify-content-md-center">
                                        <div class="col-12 pb-2" >
                                            <div class="col-6 float-left">
                                                <h3 class="pb-2">Food Category</h3>
                                            </div>
                                            <div class="col-6 float-left text-right">
                                                <a href="" class="btn btn-primary ">Add Category</a>
                                            </div>
                                        </div>
                                        <section class="col-12 clearfix">
                                            <div class="card p-3 shadow-none">
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>
                                                                        {{__('Name')}}
                                                                    </th>
                                                                    <th class="text-right">
                                                                        {{ __('Action') }}
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                            </tbody>
                                                        </table>
                                                        <div class="text-right">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="bg-white p-4 mt-4 shadow-sm">
            </div> -->
        </main>
    </div>
@endsection
@push('css')
<style>
.tags {
    font-size: 12px;
    font-weight: 400;
    color: #ffffff;
    font-family: 'Open Sans', sans-serif;
    border-radius: 25px;
    background-color: #19b0a2;
    padding: 0px 10px;
    display: inline-block;

}
.non-veg {
    font-size: 12px;
    font-weight: 400;
    color: #ffffff;
    font-family: 'Open Sans', sans-serif;
    border-radius: 25px;
    background-color: #f52323;
    padding: 0px 10px;
    display: inline-block;
}
#profile-banner-image {
    overflow: hidden;
    max-height: 300px;
}

#profile-banner-image img {
    width: 100%;
}

#profile-pic img {
    width: 150px;
    height: 150px;
    border-radius: 100%;
    border: 6px solid #fff;
}

#profile-d {
    /* margin-top: -100px;
    margin-left: 40px; */
    position: absolute;
    z-index: 1;
    top: 0;
    bottom: 0;
    left: 20px;
}

#u-name {
    font-size: 31px;
    font-weight: 600;
    color: #fff;
    /* margin-left: 30px; */
}
.switch {
    position: relative;
    display: inline-block;
    width: 43px;
    height: 20px;
}

.switch input {
opacity: 0;
width: 0;
height: 0;
}

.slider {
position: absolute;
cursor: pointer;
top: 0;
left: 0;
right: 0;
bottom: 0;
background-color: #ccc;
-webkit-transition: .4s;
transition: .4s;
}

.slider:before {
position: absolute;
content: "";
height: 16px;
width: 16px;
left: 0px;
bottom: 2px;
background-color: white;
-webkit-transition: .4s;
transition: .4s;
}

input:checked + .slider {
background-color: #2196F3;
}

input:focus + .slider {
box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
-webkit-transform: translateX(23px);
-ms-transform: translateX(23px);
transform: translateX(23px);
}

/* Rounded sliders */
.slider.round {
border-radius: 34px;
}

.slider.round:before {
    border-radius: 50%;
}
</style>
@endpush
