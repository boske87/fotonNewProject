<!DOCTYPE html>
<html dir="ltr" lang="en" class="no-js">

<head>
    {{--<base href="http://skolafotografije.com/">--}}
    {{--<base href="http://foton.app/">--}}
    <meta charset="UTF-8">

    <meta name="description" content="Skola Fotografije Foton" />
    <meta name="keywords" content="skola,fotografije,fotografija,graficki,dizajn" />
    <meta name="author" content="La Boutique HTML v4" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    {{--<base href="http://foton.app/">--}}

    <title>Skola Fotografije | Foton</title>

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap-responsive.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/fonts/font-awesome.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/flexslider.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/js/tfingi-megamenu/tfingi-megamenu-frontend.css')}}" />
    <script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>

    @if(Request::path() == 'foton-klub/dodavanje-galerije')

        @include('layouts.partials.upload')
        @elseif(Request::path() == 'foton-klub/my-profile')

        @else

        <script type="text/javascript" src="{{ asset('assets/js/jquery-1.10.2.min.js')}}"></script>
    @endif


    <script src="{{ asset('assets/js/galleria-1.4.2.js')}}"></script>
    <!-- Comment following two lines to use LESS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/color-schemes/turquoise.css')}}" id="color_scheme" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/color-schemes/custom.css')}}" id="color_scheme" />
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Oswald:700' rel='stylesheet' type='text/css'>
    {{--<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.css" rel="stylesheet" id="bootstrap-css">--}}

    <!-- Uncomment following three lines to use LESS -->
    <!--<link rel="stylesheet/less" type="text/css" href="css/less/core.less">
    <script src="js/less.js" type="text/javascript"></script>-->

    <!--<meta http-equiv="X-UA-Compatible" content="IE=7; IE=8" />-->
    <link rel="icon" href="favicon.ico" type="image/x-icon" />
    <link href="http://fonts.googleapis.com/css?family=Lato:300,300italic,400,400italic,700,700italic|Shadows+Into+Light" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Roboto,Regular' rel='stylesheet' type='text/css'>
    <!-- bxSlider CSS file -->
    <link href="{{ asset('assets/css/jquery.bxslider.css')}}" rel="stylesheet" />

    <script>

        function hide(){
            $("#hid").hide();
            $("#more").show();
            $("#less").hide();
        }
        function show(){
            $("#hid").show();
            $("#more").hide();
            $("#less").show();
            return false;
        }

        function hide2(){
            $("#hid2").hide();
            $("#more2").show();
            $("#less2").hide();
        }
        function show2(){
            $("#hid2").show();
            $("#more2").hide();
            $("#less2").show();
            return false;
        }
    </script>
</head>