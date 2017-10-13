<!DOCTYPE html>

<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js"> <!--<![endif]-->

<head>

    <meta charset="utf-8">
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> -->

    <title>CMS</title>

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{!! csrf_token() !!}" />

    <link rel="stylesheet" href="{{ admin_asset('css/screen.css') }}">
    <link rel="stylesheet" href="{{ admin_asset('css/dev.css') }}">

    <link href='http://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic,700italic' rel='stylesheet'
          type='text/css'>
    <link
            href='http://fonts.googleapis.com/css?family=Roboto+Condensed:300italic,400italic,700italic,400,300,700&subset=latin,latin-ext'
            rel='stylesheet' type='text/css'>

    <script src="{{ asset('assets/admin/js/vendor/jquery/jquery-1.10.2.min.js')}}"></script>
    <script src="{{ asset('assets/admin/js/vendor/bootstrap/bootstrap.js')}}"></script>
    <script src="{{ asset('assets/admin/js/vendor/sticky-kit/jquery.sticky-kit.min.js')}}"></script>
    <script src="{{ asset('assets/admin/js/scripts.js')}}"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            // temp dummy links
            $('a[href$="#dummy"]').click(function () {
                alert('Not implemented yet');
                return false;
            });
            $('form[action="#dummy"]').submit(function () {
                alert('Not implemented yet');
                return false;
            });
        });
    </script>

</head>

<body>
<!--[if lt IE 7]>
<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to
    improve your experience.</p>
<![endif]-->

<div class="wrap">
    @include('admin.layouts.partials.header')
    <div class="container container-main container-main-has-sidebar">
        <div class="row row-main">
            <div class="col-md-12 col-lg-12">
                @yield('content')
            </div>
        </div>
        <!-- =row-main -->
    </div>
    <!-- =container-main -->
    <div class="push"></div>
</div>
<!-- =wrap -->
@include('admin.layouts.partials.footer')

@include('admin.layouts.crud.js_reorder')
</body>
</html>