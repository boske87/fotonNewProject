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

    <title>{{ Config::get('project.site_name') }} CMS</title>

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ admin_asset('css/screen.css') }}">

    <link href='http://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:300italic,400italic,700italic,400,300,700&subset=latin,latin-ext'
          rel='stylesheet' type='text/css'>


</head>

<body class="cms-page-login">
<!--[if lt IE 7]>
<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a>
    or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
<![endif]-->

<div class="wrap">

    <div class="jumbotron">
        <div class="container">
            <h1>{{ Config::get('project.site_name') }} CMS</h1>
            @if (Session::has('flash_message'))
            <div class="alert alert-danger">
                <p>{{ Session::get('flash_message') }}</p>
            </div>
            @endif
            {!! Form::open(['route' => 'login']) !!}
            <!-- Username Form Input -->
            <div class="form-group{!! $errors ->has('login') ? ' has-error' : '' !!}">
                {!! Form::label('login', 'Username') !!}
                {!! Form::text('login', null, ['class' => 'form-control', 'placeholder' => 'Username']) !!}
                {!! $errors ->first('login', '<span class="help-block">:message</span>') !!}
            </div>

            <!-- Password Form Input -->
            <div class="form-group{!! $errors ->has('password') ? ' has-error' : '' !!}">
                {!! Form::label('password', 'Password') !!}
                {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) !!}
                {!! $errors ->first('password', '<span class="help-block">:message</span>') !!}
            </div>
            <div class="row-logo">
                <div class="checkbox"></div>
                {!! Form::submit('Login', ['class' => 'btn btn-primary btn-lg']) !!}
                <img class="logo" src="{{ admin_asset('images/layout/logo.svg') }}" alt="">
            </div>

            {!! Form::hidden('return', Input::get('return')) !!}
            {!! Form::close() !!}
        </div>
    </div>

</div>
<!-- =wrap -->

<div class="footer">
    <div class="container">
        <p>Made by <a href="http://skippaz.com" title="Visit Skippaz website" target="_blank">Skippaz</a>. All Rights Reserved &copy; {{ date('Y') }} [{{ gethostname() }}]</p>
    </div>
</div>
<!-- =footer -->
</body>
</html>

