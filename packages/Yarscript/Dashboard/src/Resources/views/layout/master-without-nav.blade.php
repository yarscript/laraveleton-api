<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title> @yield('title') | Lev</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- App favicon -->
{{--        <link rel="shortcut icon" href="{{ URL::asset('assets/images/favicon.ico')}}">--}}
    @yield('css')


        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

        <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
                crossorigin="anonymous"></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
                crossorigin="anonymous"></script>

    <!-- App css -->
{{--        <link href="{{ URL::asset('assets/css/bootstrap-dark.min.css')}}" id="bootstrap-dark" rel="stylesheet" type="text/css" />--}}
{{--        <link href="{{ URL::asset('assets/css/bootstrap.min.css')}}" id="bootstrap-light" rel="stylesheet" type="text/css" />--}}
{{--        <link href="{{ URL::asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />--}}
{{--        <link href="{{ URL::asset('assets/css/app-rtl.min.css')}}" id="app-rtl" rel="stylesheet" type="text/css" />--}}
{{--        <link href="{{ URL::asset('assets/css/app-dark.min.css')}}" id="app-dark" rel="stylesheet" type="text/css" />--}}
{{--        <link href="{{ URL::asset('assets/css/app.min.css')}}" id="app-light" rel="stylesheet" type="text/css" />--}}
  </head>

    @yield('body')
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
    @yield('content')

    <!-- JAVASCRIPT -->
{{--    <script src="{{ URL::asset('assets/libs/jquery/jquery.min.js')}}"></script>--}}
{{--    <script src="{{ URL::asset('assets/libs/bootstrap/bootstrap.min.js')}}"></script>--}}
{{--    <script src="{{ URL::asset('assets/libs/metismenu/metismenu.min.js')}}"></script>--}}
{{--    <script src="{{ URL::asset('assets/libs/simplebar/simplebar.min.js')}}"></script>--}}
{{--    <script src="{{ URL::asset('assets/libs/node-waves/node-waves.min.js')}}"></script>--}}

    @yield('script')

    <!-- App js -->

    </body>
</html>
