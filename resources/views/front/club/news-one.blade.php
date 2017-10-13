@extends('layouts.main')

@section('content')

    <section class="background-new">
        <div class="container">
            @include('layouts.partials.side')
            <div class="container-small">
                <h1>Vesti</h1>
                <div class="row">
                    <div class="span12">
                        <img src="{{ Image::load('gallery/club-news/' . $newsOne->main_image, ['h' => 10]) }}" alt="{{$newsOne->head}}"/>
                        <h1>{{$newsOne->head}}</h1>
                        <span class="vesti-datum">{{$newsOne->created_at}}</span>
                        <p>{!! $newsOne->desc !!}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="paging">

                    </div>
                </div>

            </div>
        </div>
    </section>

@stop