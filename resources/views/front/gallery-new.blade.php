@extends('layouts.main')

@section('content')
    <style>
        .loader {
            border: 16px solid #f3f3f3;
            border-radius: 50%;
            border-top: 16px solid #3498db;
            width: 120px;
            height: 120px;
            -webkit-animation: spin 2s linear infinite; /* Safari */
            animation: spin 2s linear infinite;
        }

        /* Safari */
        @-webkit-keyframes spin {
            0% { -webkit-transform: rotate(0deg); }
            100% { -webkit-transform: rotate(360deg); }
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
    <!-- Content section -->
    <section class="main">

        <!-- Home content -->
        <section class="home">



            <section class="gallery">
                <div class="container">
                    <div class="row">
                        <div class="span12">
                            <div id="galleria">


                                    <img width="100%" class="asyncImage"
                                         data-src="{{ Image::load('gallery/' . $items[0]->main_image, ['h' => 10]) }}" src="{{ Image::load('gallery/' . $items[0]->main_image, ['h' => 10]) }}"  alt="" />

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


    <script>
        $(document).ready(function() {
            $('#galleria') .html('<div style="width: 100%; background-color: white"></div>');

        });
        Galleria.loadTheme("{{ asset('assets/js/galleria.classic.min.js')}}");
        let data = [
                <?php foreach ($items as $image): ?>
            {
                thumb: '<?= 'img/gallery/' .$image->main_image ?>',
                image: '<?= 'img/gallery/' .$image->main_image ?>',

            },
            <?php endforeach ?>
        ];


        Galleria.run('#galleria',
            {
                idleMode: 'false',
                preload: 1,
                wait: 0,
                dataSource: data,
                carousel: true,
                transition: 'fade',
                transitionSpeed: 5,
            });


    </script>




@stop