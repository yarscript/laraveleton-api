<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <title> @yield('title') | Lev</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('assets/images/favicon.png')}}">

@yield('css')
<!-- App css -->
{{--    <link href="{{ URL::asset('assets/css/bootstrap-dark.min.css')}}" id="bootstrap-dark" rel="stylesheet" type="text/css" />--}}
{{--    <link href="{{ URL::asset('assets/css/bootstrap.min.css')}}" id="bootstrap-light" rel="stylesheet" type="text/css" />--}}
{{--    <link href="{{ URL::asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />--}}
{{--    <link href="{{ URL::asset('assets/css/app-rtl.min.css')}}" id="app-rtl" rel="stylesheet" type="text/css" />--}}
{{--    <link href="{{ URL::asset('assets/css/app-dark.min.css')}}" id="app-dark" rel="stylesheet" type="text/css" />--}}
{{--    <link href="{{ URL::asset('assets/css/app.min.css')}}" id="app-light" rel="stylesheet" type="text/css" />--}}

    <!-- Summernote css -->
{{--    <link href="{{ URL::asset('assets/libs/summernote/summernote.min.css')}}" rel="stylesheet" type="text/css" />--}}

    <!-- Dropzone css -->
{{--    <link href="{{ URL::asset('assets/libs/dropzone/dropzone.min.css')}}" rel="stylesheet" type="text/css" />--}}
</head>

@section('body')
@show
<body data-sidebar="dark">
<div id="preloader">
    <div id="status">
        <div class="spinner-chase">
            <div class="chase-dot"></div>
            <div class="chase-dot"></div>
            <div class="chase-dot"></div>
            <div class="chase-dot"></div>
            <div class="chase-dot"></div>
            <div class="chase-dot"></div>
        </div>
    </div>
</div>
<!-- Begin page -->
<div id="layout-wrapper">
{{--@include('admin::theme.default.layouts.topbar')--}}
{{--@include('admin::theme.default.layouts.sidebar')--}}
<!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                @yield('content')
            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
{{--        @include('admin::theme.default.layouts.footer')--}}
    </div>
    <!-- end main content-->
</div>
<!-- END layout-wrapper -->

<!-- Right Sidebar -->
{{--@include('admin::theme.default.layouts.right-sidebar')--}}
<!-- /Right-bar -->

<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>

<!-- JAVASCRIPT -->
{{--<script src="{{ URL::asset('assets/libs/jquery/jquery.min.js')}}"></script>--}}
{{--<script src="{{ URL::asset('assets/libs/bootstrap/bootstrap.min.js')}}"></script>--}}
{{--<script src="{{ URL::asset('assets/libs/metismenu/metismenu.min.js')}}"></script>--}}
{{--<script src="{{ URL::asset('assets/libs/simplebar/simplebar.min.js')}}"></script>--}}
{{--<script src="{{ URL::asset('assets/libs/node-waves/node-waves.min.js')}}"></script>--}}

@yield('script')

<!-- Plugins js -->

<script src="{{ URL::asset('assets/libs/summernote/summernote.min.js')}}"></script>

<!-- Init js-->
<script src="{{ URL::asset('assets/js/pages/task-create.init.js')}}"></script>


<!-- App js -->
<script src="{{ URL::asset('assets/js/app.min.js')}}"></script>

@yield('script-bottom')
</body>
</html>
