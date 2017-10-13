@extends('layouts.main')

@section('content')
    <!-- Content section -->
    <section class="main">

        <!-- Home content -->
        <section class="home">



            <section class="gallery">
                <div class="container">
                    <div class="row">
                        <div class="span12">
                            <div id="galleria">

                                @foreach($items as $one)
                                    <img src="{{ Image::load('gallery/' . $one->main_image, ['h' => 10]) }}" alt="" />
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="featured ">
                <div class="container">
                    <div class="row">
                        <div class="span12 pocetni-info">
                            <br/><br/>
                            <p>{!! $text->Text1 !!}</p>
                        </div>
                    </div>
                </div>
            </section>

        </section>
        <!-- End class="home" -->

    </section>
    <!-- End class="main" -->

    <script>Galleria.loadTheme("{{ asset('assets/js/galleria.classic.min.js')}}");
        Galleria.run("#galleria");</script>

@stop