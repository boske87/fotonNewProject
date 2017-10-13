@extends('layouts.main')

@section('content')
<!-- Content section -->
<section class="main">

    <!-- Home content -->
    <section class="home">

        <!-- Promos -->
        <section class="galerija-top">
            <div class="container">
                <div class="row">
                    <div class="span12">
                        <img src="{{ asset('assets/img/linkovi-big.png')}}" alt="Linkovi">
                    </div>
                </div>
            </div>
        </section>
        <!-- End class="promos" -->

        <!-- Promos -->
        <section class="galerija-content">
            <div class="container">
                <div class="row">
                    @if($items)
                        @foreach($items as $one)
                            <div class="span3">
                                <div class="gallery-box">
                                    <div class="gallery-img">
                                        <a href="#">
                                            <img src="{{ Image::load('gallery/' . $one->main_image, ['h' => 10]) }}">
                                        </a>
                                    </div>
                                    <div class="linkovi-info">
                                        <h2><a href="#">{{$one->name}}</a></h2>
                                        <p>
                                            {{$one->opis}}
                                        </p>
                                        <a href="http://{{$one->link}}">{{$one->link}} &rarr;</a><br/>
                                        <hr/>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </section>
        <!-- End class="promos" -->

    </section>
    <!-- End class="home" -->

</section>
<!-- End class="main" -->

@stop