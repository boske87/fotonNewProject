@extends('layouts.main')

@section('content')



    <section class="vesti-content-new background-new">
        <div class="container">
            @include('layouts.partials.side')
            <div class="container-small">
                <div class="row">
                    @if($members->count()>0)
                        @foreach($members as $oneGal)
                            <div class="span4" style="
    width: 25%;
">
                                <div class="vesti-box">
                                    <div class="gallery-img">
                                        <a href="{{route('foton-klub.korisnik', $oneGal->id)}}">
                                            <img src="{{ Image::load('/gallery/users/'.$oneGal->fotografija_lica, ['h' => 10]) }}">
                                        </a>
                                    </div>
                                    <div class="vesti-info">
                                        <h2><a href="{{route('foton-klub.korisnik', $oneGal->id)}}"> {{$oneGal->ime_prezime}}</a></h2>
                                        <p>

                                        </p>
                                        <hr/>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else

                        <p style="width: 70% !important; margin-left: 15%" class="alert alert-warning">There are no items.</p>
                    @endif

                </div>


                <div class="row">
                    <div class="paging">
                    </div>
                </div>

            </div>
        </div>
    </section>

@stop
