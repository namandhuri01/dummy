<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta content="ie=edge" http-equiv="x-ua-compatible">
        <meta content="template language" name="keywords">
        <meta content="Design_Gurus" name="author">
        <meta content="WOW Admin dashboard html template" name="description">
        <meta content="width=device-width, initial-scale=1" name="viewport">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title') | Career Mantra</title>

        <!--favicon-->
        <link href="{{asset('admin-asset/images/favicon.ico" rel="shortcut icon') }}">

        <!--Preloader-CSS-->
        <link rel="stylesheet" href="{{asset('admin-asset/plugins/preloader/preloader.css') }}">

        <!--bootstrap-4-->
        <link rel="stylesheet" href="{{asset('admin-asset/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{asset('admin-asset/css/custom.css') }}">

        <!--Custom Scroll-->
        <link rel="stylesheet" href="{{asset('admin-asset/plugins/customScroll/jquery.mCustomScrollbar.min.css') }}">
        <!--Font Icons-->
        <link rel="stylesheet" href="{{asset('admin-asset/icons/simple-line/css/simple-line-icons.css') }}">
        <link rel="stylesheet" href="{{asset('admin-asset/icons/dripicons/dripicons.css') }}">
        <link rel="stylesheet" href="{{asset('admin-asset/icons/ionicons/css/ionicons.min.css') }}">
        <link rel="stylesheet" href="{{asset('admin-asset/icons/eightyshades/eightyshades.css') }}">
        <link rel="stylesheet" href="{{asset('admin-asset/icons/fontawesome/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{asset('admin-asset/icons/foundation/foundation-icons.css') }}">
        <link rel="stylesheet" href="{{asset('admin-asset/icons/metrize/metrize.css') }}">
        <link rel="stylesheet" href="{{asset('admin-asset/icons/typicons/typicons.min.css') }}">
        <link rel="stylesheet" href="{{asset('admin-asset/icons/weathericons/css/weather-icons.min.css') }}">

        <!--Date-range-->
        <link rel="stylesheet" href="{{asset('admin-asset/plugins/date-range/daterangepicker.css') }}">
        <!--Drop-Zone-->
        <link rel="stylesheet" href="{{asset('admin-asset/plugins/dropzone/dropzone.css') }}">
        <!--Full Calendar-->
        <link rel="stylesheet" href="{{asset('admin-asset/plugins/full-calendar/fullcalendar.min.css') }}">
        <!--Normalize Css-->
        <link rel="stylesheet" href="{{asset('admin-asset/css/normalize.css') }}">
        <!--Main Css-->
        <link rel="stylesheet" href="{{asset('admin-asset/css/main.css') }}">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

        {{-- dropdown live search --}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
        @stack('css')
        <!---Preloader Starts Here--->
        {{-- <div id="ip-container" class="ip-container">
            <header class="ip-header">
                <h1 class="ip-logo text-center"><img class="img-fluid" src="{{asset('admin-asset/images/logo-c.png')}}" alt="" class="ip-logo text-center"/></h1>
                <div class="ip-loader">
                    <svg class="ip-inner" width="60px" height="60px" viewBox="0 0 80 80">
                        <path class="ip-loader-circlebg" d="M40,10C57.351,10,71,23.649,71,40.5S57.351,71,40.5,71 S10,57.351,10,40.5S23.649,10,40.5,10z"/>
                        <path id="ip-loader-circle" class="ip-loader-circle" d="M40,10C57.351,10,71,23.649,71,40.5S57.351,71,40.5,71 S10,57.351,10,40.5S23.649,10,40.5,10z"/>
                    </svg>
                </div>
            </header>
        </div> --}}
        <!---Preloader Ends Here--->


        <!--Navigation-->


        <!--Page Container-->
    </head>
    <body>
       @include('admin.navs.sidebar')
        <div class="page">
                @yield('content')
        </div>
           <!--Jquery-->
        <script type="text/javascript" src="{{ asset('admin-asset/js/jquery-3.2.1.min.js') }}"></script>
        <!--Bootstrap Js-->
        <script type="text/javascript" src="{{ asset('admin-asset/js/popper.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('admin-asset/js/bootstrap.min.js') }}"></script>
        <!--Modernizr Js-->
        <script type="text/javascript" src="{{ asset('admin-asset/js/modernizr.custom.js') }}"></script>

        <!--Custom Scroll-->
        <script type="text/javascript" src="{{ asset('admin-asset/plugins/customScroll/jquery.mCustomScrollbar.min.js') }}"></script>
        <!--Sortable Js-->
        <script type="text/javascript" src="{{ asset('admin-asset/plugins/sortable2/sortable.min.js') }}"></script>
        <!--DropZone Js-->
        <script type="text/javascript" src="{{ asset('admin-asset/plugins/dropzone/dropzone.js') }}"></script>
        <!--Date Range JS-->
        <script type="text/javascript" src="{{ asset('admin-asset/plugins/date-range/moment.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('admin-asset/plugins/date-range/daterangepicker.js') }}"></script>
        <!--Data-Table JS-->
        <script type="text/javascript" src="{{ asset('admin-asset/plugins/data-tables/datatables.min.js') }}"></script>
        <!--Editable JS-->
        <script type="text/javascript" src="{{ asset('admin-asset/plugins/editable/editable.js') }}"></script>
        {{-- <script src="{{asset('js/jquery.min.js')}}"></script> --}}
        <!--- Main JS -->
        <script src="{{ asset('admin-asset/js/main.js') }}"></script>
        {{-- Toastr  --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        {{-- Custom JS --}}
        <script type="text/javascript" src="{{ asset('admin-asset/js/custom.js') }}"></script>
        {{-- live search --}}
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
        <script src="{{ asset('js/jquery-validation/jquery.validate.min.js') }}"></script>
        <!-- (Optional) Latest compiled and minified JavaScript translation files -->
        {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script> --}}
        <script>
        @if(Session::has('message'))
                var type = "{{ Session::get('alert-type', 'info') }}";
                switch(type){
                case 'info':
                    toastr.info("{{ Session::get('message') }}");
                    break;

                case 'warning':
                    toastr.warning("{{ Session::get('message') }}");
                    break;

                case 'success':
                    toastr.success("{{ Session::get('message') }}");
                    break;

                case 'error':
                    toastr.error("{{ Session::get('message') }}");
                    break;
                }
            @endif

        </script>
        <script>
            @if(count($errors) > 0)
                @foreach($errors->all() as $error)
                    toastr.error("{{ $error }}");
                @endforeach
            @endif
        </script>
        <script src="https://cdn.tiny.cloud/1/ox3x1vo8i4oqbgfu30fu8vs2b3wi3wkxy4smmlgelys5kpdc/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

        @stack('script')
    </body>
</html>
