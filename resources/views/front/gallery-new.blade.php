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


                                    <img width="100%" class="asyncImage"
                                         data-src="{{ Image::load('gallery/' . $items[1]->main_image, ['h' => 10]) }}" src="{{ Image::load('gallery/' . $items[1]->main_image, ['h' => 10]) }}"  alt="" />

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
                dataSource: data
            });


    </script>




@stop