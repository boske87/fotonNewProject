@extends('layouts.main')

@section('content')
<!-- Content section -->
<section class="main">

    <!-- Home content -->
    <section class="home">

        <section>
            <div class="container">
                <div class="row">
                    <div class="span12">
                        <img src="{{ Image::load('gallery/' . $newsOne->main_image, ['h' => 10]) }}" alt="{{$newsOne->head}}"/>
                        <h1>{{$newsOne->head}}</h1>
                        <span class="vesti-datum">{{$newsOne->created_at}}</span>
                        <p>{!! $newsOne->desc !!}</p>
                    </div>
                </div>
            </div>
        </section>

    </section>
    <!-- End class="home" -->

</section>
<!-- End class="main" -->

@stop