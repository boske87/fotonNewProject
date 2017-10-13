@extends('layouts.main')

@section('content')

    <section class="background-new">
        <div class="container">
            @include('layouts.partials.side')
            <div class="container-small">
                <h3>{{$gallery->galleryName}}</h3>
                <div class="row">
                    @if($items->count()>0)

                        @foreach($items as $one)
                            <div class="spanx">
                                <div class="vesti-box">
                                    <div class="gallery-img">
                                        <a href="{{route('foton-klub.galerija.slika',[$id, $one->id])}}">
                                            <img src="http://skolafotografije.com/img/gallery/2016_04_01_Tomina_izlozba_2.jpg?h=10&s=5d75945cff11708b3c95cac6ea3d26bd">
                                        </a>
                                    </div>
                                    <div class="vesti-info single">
                                        <div class="single-comment-box">
                                            <img src="{{ asset('assets/img/message.png')}}">
                                            <span>7</span><span>Komentara</span>
                                        </div>
                                        <div class="single-comment-box comment-box">
                                            <div class="profile-img-wrap">
                                                <img src="http://skolafotografije.com/img/gallery/2016_04_01_Tomina_izlozba_2.jpg?h=10&amp;s=5d75945cff11708b3c95cac6ea3d26bd">
                                            </div>
                                            <input type="text" placeholder="Napišite komentar..." onfocus="this.placeholder = ''" onblur="this.placeholder = 'Napišite komentar...'">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else

                        <p style="width: 35%; margin-left: 15%" class="alert alert-warning">There are no items.</p>
                    @endif
                </div>


            </div>
        </div>
    </section>

@stop