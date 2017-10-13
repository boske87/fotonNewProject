@extends('admin.layouts.admin')

@section('content')

<h1>Hi. This is your control room.<a class="js-aside-toggle js-aside-toggle-on pull-right" href="#d"><span class="entypo entypo-layout"></span></a></h1>

<p class="lead">Make yourself comfortable.</p>

<div class="row js-masonry" data-masonry-options='{ "transitionDuration": "0.3s" }'>

</div>

<script src="{{ asset('assets/admin/js/vendor/masonry/masonry.pkgd.min.js')}}"></script>
@stop