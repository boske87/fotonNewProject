@extends('layouts.main')

@section('content')
<!-- Content section -->
<section class="main silver-bg" style="background-color: white !important;">

    <!-- Home content -->
    <section class="home">

        <!-- Promos -->
        <section class="promos galerija-top">
            <img src="{{asset('assets/img/PROFESORI-heder.jpg')}}" alt="Profesori">
        </section>
        <!-- End class="promos" -->

        <section class="featured profesori">
            <div class="container">
                <div class="row">
                    <div class="span12">
                        <div class="prof-title" style="color: white" >
                            <h3>NASTAVNI KADAR</h3>
                            <p class="white-text" style="color: white" >
                                {!! $profText->Text1 !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Promos -->
        <section class="profesori-content" style="background-color: white">
            <div class="container">
                <div class="row">
                    @foreach($prof as $one)
                    <div class="span6">
                        <div class="profesori-box">
                            <img src="{{ Image::load('gallery/' . $one->main_image, ['h' => 10]) }}">
                            <h2 style="font-size: 25px !important;">{{ $one->name }}</h2>
                            <hr/>
                            <a href="{{route('profesor',$one->slug)}}">&rsaquo; Saznaj više</a>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </section>
        <!-- End class="promos" -->

    </section>
    <!-- End class="home" -->

</section>
<!-- End class="main" -->

@stop