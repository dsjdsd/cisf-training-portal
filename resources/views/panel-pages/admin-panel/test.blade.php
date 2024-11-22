<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>ICAR-CIFE’s:: Panel</title>
    <link rel="icon" href="{{ asset('all-view-assets/images/favicon/logo1.jpg') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('all-view-assets/plugins/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('all-view-assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('all-view-assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('all-view-assets/plugins/charts-c3/plugin.css') }}"/>
    <link rel="stylesheet" href="{{ asset('all-view-assets/plugins/morrisjs/morris.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('all-view-assets/css/style.min.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    <script src="https://kit.fontawesome.com/699e0176ee.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('all-view-assets/custom/css/custom-css.css') }}" />
</head>
<body class="theme-blush">
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="m-t-30"><img class="zmdi-hc-spin" src="{{ asset('all-view-assets/images/loader.svg') }}" width="48" height="48" alt="Aero"></div>
            <p>Please wait...</p>
        </div>
    </div>

    <div class="overlay"></div>
    <div class="navbar-right">
        <ul class="navbar-nav">
            <li><a href="javascript:void(0);" class="js-right-sidebar" title="Setting"><i class="zmdi zmdi-settings zmdi-hc-spin"></i></a></li>
            <li><a href="sign-in.html" class="mega-menu" title="Sign Out"><i class="zmdi zmdi-power"></i></a></li>
        </ul>
    </div>
    @include('panel-pages.admin-panel.admin-panel-common-layout.header')
    <section class="content">
        <div class="">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-7 col-md-6 col-sm-12">
                        <h2>Training Programmes</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('adminDashboard')}}"><i class="zmdi zmdi-home"></i> Dashboard</a></li>
                            <li class="breadcrumb-item active">Training Programmes Add</li>
                        </ul>
                        <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                    </div>
                    <div class="col-lg-5 col-md-6 col-sm-12">                
                        <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <!-- Your form and content go here -->
            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="{{ asset('all-view-assets/bundles/libscripts.bundle.js') }}"></script>
    <script src="{{ asset('all-view-assets/bundles/vendorscripts.bundle.js') }}"></script>
    <script src="{{ asset('all-view-assets/bundles/datatablescripts.bundle.js')}}"></script>
    <script src="{{ asset('all-view-assets/plugins/jquery-datatable/buttons/dataTables.buttons.min.js')}}"></script>
    <script src="{{ asset('all-view-assets/plugins/jquery-datatable/buttons/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('all-view-assets/plugins/jquery-datatable/buttons/buttons.colVis.min.js')}}"></script>
    <script src="{{ asset('all-view-assets/plugins/jquery-datatable/buttons/buttons.flash.min.js')}}"></script>
    <script src="{{ asset('all-view-assets/plugins/jquery-datatable/buttons/buttons.html5.min.js')}}"></script>
    <script src="{{ asset('all-view-assets/plugins/jquery-datatable/buttons/buttons.print.min.js')}}"></script>
    <script src="{{ asset('all-view-assets/bundles/jvectormap.bundle.js') }}"></script>
    <script src="{{ asset('all-view-assets/bundles/sparkline.bundle.js') }}"></script>
    <script src="{{ asset('all-view-assets/bundles/c3.bundle.js') }}"></script>
    <script src="{{ asset('all-view-assets/bundles/mainscripts.bundle.js') }}"></script>
    <script src="{{ asset('all-view-assets/js/pages/tables/jquery-datatable.js')}}"></script>
    <script src="{{ asset('all-view-assets/js/pages/index.js') }}"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    
    <script>
        $(document).ready(function() {
            @if(Session::has('message'))
                var type = "{{ Session::get('alert-type', 'info') }}";
                var message = "{{ Session::get('message') }}";
                toastr.options = {
                    "closeButton": true,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "timeOut": "5000"
                };

                // Debugging alerts
                alert("Message Type: " + type + "\nMessage: " + message);

                switch (type) {
                    case 'info':
                        toastr.info(message);
                        break;
                    case 'success':
                        toastr.success(message);
                        break;
                    case 'warning':
                        toastr.warning(message);
                        break;
                    case 'error':
                        toastr.error(message);
                        break;
                    default:
                        toastr.info("Default message: " + message);
                }
            @endif
        });
    </script>
</body>
</html>
