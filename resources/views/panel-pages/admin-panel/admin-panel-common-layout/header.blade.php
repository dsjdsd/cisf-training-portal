<!doctype html>
<html class="no-js " lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>ICAR-CIFE’s:: Panel</title>
        <!-- Favicon-->
        <link rel="icon" href="{{ asset('all-view-assets/images/favicon/logo1.jpg') }}" type="image/x-icon">    
        <link rel="stylesheet" href="{{ asset('all-view-assets/plugins/bootstrap/css/bootstrap.min.css') }}">
        <!-- JQuery DataTable Css -->
        <link rel="stylesheet" href="{{ asset('all-view-assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('all-view-assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.css') }}"/>
        <link rel="stylesheet" href="{{ asset('all-view-assets/plugins/charts-c3/plugin.css') }}"/>
        <link rel="stylesheet" href="{{ asset('all-view-assets/plugins/morrisjs/morris.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('all-view-assets/css/style.min.css') }}">
        <script src="https://kit.fontawesome.com/699e0176ee.js" crossorigin="anonymous"></script>
        <!-- Custom Css --> 
            <!-- Toastr CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
        <!-- jQuery -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

        <!-- Toastr JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

        <link rel="stylesheet" href="{{ asset('all-view-assets/custom/css/custom-css.css') }}" />
    </head>
    <body class="theme-blush">
        <!-- Page Loader -->
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
        @include('panel-pages.admin-panel.admin-panel-common-layout.sidebar')