@extends('layouts.main')

@section('content')
<!-- Content section -->
<section class="main">

    <!-- Home content -->
    <section class="home">

        <section class="profesor-top">
            <div class="container">
                <div class="row">
                    <div class="span12">
                        <div class="row">
                            <div class="span3">
                                <div class="prof-img2">
                                    <img src="{{ Image::load('gallery/' . $profOne->main_image, ['h' => 10]) }}">
                                </div>
                            </div>
                            <div class="span8">
                                <div class="prof-info2">
                                    <h4>{!! $profOne->name !!}</h4>
                                    <p>
                                        {!! $profOne->desc !!}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="gallery">
            <div class="container">
                <div class="row">
                    <div class="span12">
                        <div id="galleria">

                            @foreach($profOne->gallery as $one)
                            <img src="{{ Image::load('gallery/' . $one->main_image, ['h' => 10]) }}" alt="" />
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <sectio class="featured ostali-profesori">
            <div class="container">
                <div class="row">
                    <div class="span12 pocetni-info">
                        <br/>
                        <h3>OSTALI PROFESORI</h3>
                        <hr>
                    </div>
                    @foreach($prof as $one)
                    <div class="span4">
                        <div class="profesori-box">
                            <img src="{{ Image::load('gallery/' . $one->main_image, ['h' => 10]) }}">
                            <h2>{{$one->name}}</h2>
                            <hr/>
                            <a href="{{route('profesor',$one->slug)}}">&rsaquo; {{$one->name}}</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </sectio>

    </section>
    <!-- End class="home" -->

</section>
<!-- End class="main" -->

<script>Galleria.loadTheme("{{ asset('assets/js/galleria.classic.min.js')}}");
    Galleria.run("#galleria");</script>

@stop