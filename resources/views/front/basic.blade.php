@extends('layouts.main')

@section('content')
    <style type="text/css">

        p {
            line-height: 20px !important;
        }
        .promos {
            padding-bottom: 20px !important;;
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
                            <img src="{{asset('assets/img/Foton Website-02-Pocetni modul_2018_slika.jpg')}}" alt="Big Foton">
                        </div>
                        <div class="span12">
                            <p>
                                {!! $basicText->Text1 !!}<br/><br/>
                            </p>
                        </div>
                        <div class="span12">
                            <div class="nivo-video">
                                <a href="{!! $basicText->Text7 !!}" target="_blank"></a>
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
                                <img src="{{ Image::load('gallery/' . $basicGallery[0]->main_image, ['h' => 10]) }}" alt="" />

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
                            <h3 style="font-weight: bold !important;">NASTAVNI PROGRAM</h3>
                            <p>{!! $basicText->Text2 !!}</p>
                        </div>
                        <div class="span12 pocetni-info">
                            <br/>
                            <h3 style="font-weight: bold !important;">DIPLOMA</h3>
                            <p>{!! $basicText->Text4 !!}</p>
                        </div>
                        <div class="span12 pocetni-info">
                            <br/>
                            <h3 style="font-weight: bold !important;">CENA</h3>
                            <p>{!! $basicText->Text5 !!}</p>


                        </div>
                        <div class="span12 pocetni-info">
                            <br/>
                            <h3 style="font-weight: bold !important;">ŠTA DALJE?</h3>
                            <p>{!! $basicText->Text8 !!}</p>

                            <hr style="margin-bottom: -1%">
                        </div>
                        <div class="span12 pocetni-info">
                            <p>{!! $basicText->Text3 !!}</p>
                            <div id="hid" style="display: none">{!! $basicText->Text6  !!}
                                <div class="nivo-info">
                                    <a href="/prijava"><img src="{{ Image::load('basicPage/' . $basicText->imageHiden, ['h' => 10]) }}" alt="" /></a>
                                </div>
                            </div>
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
        let data = [
                <?php foreach ($basicGallery as $image): ?>
            {
                thumb: '<?= 'img/gallery/' .$image->main_image ?>',
                image: '<?= 'img/gallery/' .$image->main_image ?>',

            },
            <?php endforeach ?>
        ];

        Galleria.run('#galleria',
            {

                preload: 0,
                dataSource: data,
                carousel: true,
                transition: 'fade',
                transitionSpeed: 1000,
            });


    </script>

@stop