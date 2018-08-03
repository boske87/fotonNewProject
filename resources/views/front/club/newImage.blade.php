@extends('layouts.main')

@section('content')

    <section class="background-new">
        <div class="container">
            @include('layouts.partials.side')
            <div class="container-small">
                <h3>Nove fotografije</h3>
                <div class="row">
                    @if($items->count()>0 || $itemsCall->count()>0)

                        @foreach($items as $one)
                            @if(isset($one->userGalleryImage->userId))
                            <div class="spanx">
                                <div class="vesti-box">
                                    <div class="gallery-img">
                                        <a href="{{route('foton-klub.galerija.slika',[$one->galleryId, $one->id, 'userId='.$gallUser[$one->galleryId]])}}">
                                            <img src="{{ Image::load('gallery/mygallery'.$one->userGalleryImage->userId.'/' . $one->main_image, ['h' => 10]) }}">
                                        </a>
                                    </div>
                                    <div class="vesti-info single">
                                        <div class="single-comment-box">
                                            <img src="{{ asset('assets/img/message.png')}}">
                                            <span>{{isset($new_com[$one->id]) ? $new_com[$one->id] : '0'}}</span><span>Komentara</span>
                                        </div>
                                        <div class="single-comment-box comment-box">
                                            <div class="profile-img-wrap">
                                                @if(Auth::user()->fotografija_lica !== NULL)
                                                    <img src="{{ Image::load('/gallery/users/'.Auth::user()->fotografija_lica, ['h' => 10]) }}">
                                                @else
                                                    <img src="http://skolafotografije.com/img/gallery/2016_04_01_Tomina_izlozba_2.jpg?h=10&amp;s=5d75945cff11708b3c95cac6ea3d26bd">

                                                @endif
                                            </div>
                                            <input type="text" onClick="window.location.href='{{route('foton-klub.galerija.slika',[$one->galleryId, $one->id, 'userId='.$gallUser[$one->galleryId]])}}'" placeholder="Napišite komentar..." onfocus="this.placeholder = ''" onblur="this.placeholder = 'Napišite komentar...'">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        @endforeach
                    @else

                        <p style="width: 35%; margin-left: 15%" class="alert alert-warning">Nema novih fotografija</p>
                    @endif
                        @if($itemsCall->count()>0 || $items->count()>0)

                            @foreach($itemsCall as $one)

                                <div class="spanx">
                                    <div class="vesti-box">
                                        <div class="gallery-img">
                                            <a href="{{route('foton-klub.galerija-zvanja.slika',[$one->galleryId, $one->id, 'userId='.$galleCallUser[$one->galleryId]])}}">
                                                <img src="{{ Image::load('gallery/galerija_zvanja'.$one->galleryId.'/' . $one->main_image, ['h' => 10]) }}">
                                            </a>
                                        </div>
                                        <div class="vesti-info single">
                                            <div class="single-comment-box">
                                                <img src="{{ asset('assets/img/message.png')}}">
                                                <span>{{isset($new_comCall[$one->id]) ? $new_comCall[$one->id] : '0'}}</span><span>Komentara</span>
                                            </div>
                                            <div class="single-comment-box comment-box">
                                                <div class="profile-img-wrap">
                                                    @if(Auth::user()->fotografija_lica !== NULL)
                                                        <img src="{{ Image::load('/gallery/users/'.Auth::user()->fotografija_lica, ['h' => 10]) }}">
                                                    @else
                                                        <img src="http://skolafotografije.com/img/gallery/2016_04_01_Tomina_izlozba_2.jpg?h=10&amp;s=5d75945cff11708b3c95cac6ea3d26bd">

                                                    @endif
                                                </div>
                                                <input type="text" onClick="window.location.href='{{route('foton-klub.galerija-zvanja.slika',[$one->galleryId, $one->id, 'userId='.$galleCallUser[$one->galleryId]])}}'" placeholder="Napišite komentar..." onfocus="this.placeholder = ''" onblur="this.placeholder = 'Napišite komentar...'">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else

                        @endif
                </div>


            </div>
        </div>
    </section>

@stop