@extends('layouts.main')

@section('content')

<style>
    html {
        overflow-y: scroll;
    }
</style>
    <section class="background-new">
        <div class="container">
            @include('layouts.partials.side')
            <div class="container-small">
                <p style="text-align: left; padding-left: 2%; padding-right: 2%">{{ Auth::user()->optionDesc }}</p>
                <h1>GALERIJA ZA ZVANJA</h1>
                <div class="row">
                    @if($callGal->count()>0)
                        @foreach($callGal as $oneGal)
                            <div class="span4">
                                <div class="vesti-box">
                                    <div class="gallery-img">
                                        <a href="{{route('foton-klub.galerija-zvanja', $oneGal->id)}}">
                                            @if(isset($oneGal->userGalleryImage[0]->main_image))
                                            <img src="{{ Image::load('gallery/galerija_zvanja'.$oneGal->id.'/' . $oneGal->userGalleryImage[0]->main_image, ['h' => 10]) }}">
                                            @else
                                                <img src="http://skolafotografije.com/img/gallery/2016_04_01_Tomina_izlozba_2.jpg?h=10&s=5d75945cff11708b3c95cac6ea3d26bd">
                                            @endif
                                        </a>
                                    </div>
                                    <div class="vesti-info">
                                        <h2><a href="{{route('foton-klub.galerija-zvanja', $oneGal->id)}}"> {{$oneGal->galleryName}}</a></h2>
                                        <span class="vesti-datum">{{$oneGal->time}}</span>
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

                <hr>
                <h1>MOJA GALERIJA</h1>
                <div class="row" style="width: 70% !important; margin-left: 15%; margin-top: 5%">
                    <button  onclick="window.location.href='{{route('foton-klub.dodavanje-nove-galerije')}}'"
                             style="text-align: center; margin-bottom: 5%" class="btn btn-primary">Napravite novi album</button>
                </div>
                <div class="row">
                    @if($myGal->count()>0)
                        @foreach($myGal as $oneGal)
                            <div class="span4">
                                <div class="vesti-box">

                                    <div class="gallery-img">
                                        <a href="{{route('foton-klub.moja-galerija', $oneGal->id)}}">
                                            @if(isset($oneGal->userGalleryImage[0]->main_image))
                                            <img src="{{ Image::load('gallery/mygallery'.$oneGal->userId.'/' . $oneGal->userGalleryImage[0]->main_image, ['h' => 10]) }}">
                                            @else
                                                <img src="http://skolafotografije.com/img/gallery/2016_04_01_Tomina_izlozba_2.jpg?h=10&s=5d75945cff11708b3c95cac6ea3d26bd">
                                            @endif
                                        </a>
                                    </div>
                                    <div class="vesti-info">
                                        <h2><a href="{{route('foton-klub.moja-galerija', $oneGal->id)}}"> {{$oneGal->galleryName}}</a></h2>
                                        <span class="vesti-datum">{{$oneGal->time}}</span>
                                        <p>

                                        </p>
                                        <a onclick="return confirm('Da li sigurno zelite da obrisete album?');" href="{{route('foton-klub.album-brisanje', $oneGal->id)}}" style="color: red">OBRISI ALBUM &rarr;</a><br/>
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

    {{--<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet" type="text/css" />--}}
    <!-- Theme style -->
    <link href="{{ asset('assets/js/jquery-chat-master/templates/AdminLTE/dist/css/AdminLTE.css')}}" rel="stylesheet" type="text/css" />

    <link id='theme' rel='stylesheet' />
    <link rel='stylesheet' href={{ asset('assets/js/jquery-chat-master/css/tipsy.css')}} />
    <link rel='stylesheet' href={{ asset('assets/js/jquery-chat-master/css/chat.css')}} />

    <script src='{{ asset('assets/js/socket.io.js')}}'></script>
    <script src={{ asset('assets/js/jquery-chat-master/js/jquery-1.11.3.min.js')}}></script>
    <script src={{ asset('assets/js/jquery-chat-master/js/jquery-ui-1.10.4.custom.min.js')}}></script>
    <script src={{ asset('assets/js/jquery-chat-master/js/jquery.slimscroll.min.js')}}></script>
    <script src={{ asset('assets/js/jquery-chat-master/js/jquery.tipsy.js')}}></script>
    <script src={{ asset('assets/js/jquery-chat-master/js/jquery.main.js')}}></script>
    <script src={{ asset('assets/js/jquery-chat-master/config.js')}}></script>
    <script src={{ asset('assets/js/jquery-chat-master/i18n_en.js')}}></script>

@stop
