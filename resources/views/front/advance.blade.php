@extends('layouts.main')

@section('content')
    <style type="text/css">
        .vrh ul {
            text-align: center;
            font-family: "RobotoRegular";
            font-size: 17px !important;
            color: white;
        }

        .vrh li {
            font-family: "RobotoRegular";
            font-size: 17px !important;
            color: white;
        }

        .pocetni-info ul {
            font-family: "RobotoRegular";
            font-size: 17px !important;

        }

        .pocetni-info li {
            font-family: "RobotoRegular";
            font-size: 17px !important;

        }
    </style>
    <!-- Content section -->
    <section class="main">

        <!-- Home content -->
        <section class="home">


            <!-- Promos -->
            <section class="promos pocetni">
                <div class="container">
                    <div class="row">
                        <div class="span12">
                            <img src="{{asset('assets/img/big-napredni-nivo.png')}}" alt="Big Foton">
                        </div>
                        <div class="span12 vrh">
                            <p>
                                {!! $advanceText->Text1 !!}<br/><br/>
                            </p>
                        </div>
                        <div class="span12">
                            <div class="nivo-video">
                                <a href="{!! $advanceText->Text7 !!}" target="_blank"><img style="height:270px; width:440px !important;"  src="{{asset('assets/img/Naprednivideo.jpg')}}"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End class="promos" -->

            <section class="gallery">
                <div class="container">
                    <div class="row">
                        <div class="span12">
                            <div id="galleria">
                                @foreach($advanceGallery as $one)
                                    <img src="{{ Image::load('gallery/' . $one->main_image, ['h' => 10]) }}" alt="" />
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <sectio class="featured ">
                <div class="container">
                    <div class="row">
                        <div class="span12 pocetni-info">
                            <br/><br/>
                            <h3 style="font-weight: bold !important;">OVAJ KURS SE PREPORUČUJE</h3>
                            <p>{!! $advanceText->Text2 !!}</p>
                        </div>
                        <div class="span12 pocetni-info">
                            <br/>
                            <h3 style="font-weight: bold !important;">CILJ OVOG KURSA</h3>
                            <p>{!! $advanceText->Text3!!}</p>
                        </div>

                        <div class="span12 pocetni-info">
                            <br/>
                            <h3 style="font-weight: bold !important;">NASTAVNI PROGRAM</h3>
                            <p>{!! $advanceText->Text4!!}</p>

                            <hr>
                        </div>
                        <div class="span12 pocetni-info">
                            <p>{!! $advanceText->Text5 !!}</p>
                            <div id="hid" style="display: none">{!! $advanceText->Text6 !!}</div>
                            <div class="nivo-info">
                                <a href="#" onclick="show();return false;">
                                    <span id="more">SAZNAJ VIŠE</span>

                                </a>
                                <a href="#" onclick="hide();return false;">
                                    <span id="less" style="display: none">Manje</span>
                                </a>
                            </div>
                        </div>
                        <div class="span12 pocetni-info">
                            <div class="nivo-info">
                                <a href="/prijava"><img src="{{asset('assets/img/prijavise.png')}}" alt="" /></a>
                            </div>
                        </div>
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