@extends('layouts.main')

@section('content')

    <section class="background-new">
        <meta name="csrf-token" content="{!! csrf_token() !!}" />
        <div class="container">
            @if(app('request')->has('userId'))
                @include('front.club.otherView.side')
            @else
                @include('layouts.partials.side')
            @endif
            <div class="container-small">
                <h3 style="font-size: 33px !important;">{{$gallery->galleryName}}</h3>
                <button  onclick="window.location.href='{{route('foton-klub.dodavanje-nove-slike-album', $gallery->id)}}'"
                         style="text-align: center; margin-bottom: 5%" class="btn btn-primary">Dodajte novu sliku u album</button>
                <div class="row">
                    @if($items->count()>0)

                        @foreach($items as $key=>$one)
                            <div class="spanx">

                            <div class="vesti-box">
                                @if($key==0)
                                    <div style="background-color: white; text-align: left; overflow-wrap: break-word;">
                                        <p style="font-size: 23px !important;" id="alDesc" contenteditable="true" id="album_desc" style="margin-left: 5px">{!! $gallery->desc_gal !!}</p>
                                    </div>
                                @endif
                                <div class="gallery-img">
                                    @if(app('request')->has('userId'))
                                    <a href="{{route('foton-klub.galerija.slika',[$id, $one->id, 'userId='.app('request')->input('userId')])}}">
                                        @else
                                            <a href="{{route('foton-klub.galerija.slika',[$id, $one->id])}}">
                                                @endif
                                        <img src="{{ Image::load('gallery/mygallery'.$user_id.'/' . $one->main_image, ['h' => 10]) }}">
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

                                            @endif </div>

                                        <input type="text" onClick="window.location.href='{{route('foton-klub.galerija.slika',[$id, $one->id])}}'" placeholder="Napišite komentar..." onfocus="this.placeholder = ''" onblur="this.placeholder = 'Napišite komentar...'">


                                    </div>

                                </div>
                                    <div style="margin-top: 2%">
                                        <a onclick="return confirm('Da li sigurno zelite da obrisete sliku?');" href="{{route('foton-klub.slika-brisanje', $one->id)}}" style="color: red">OBRISI SLIKU &rarr;</a><br/>
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
    <script>

        $(document).ready(function(){
            $('p[contenteditable]').keydown(function(e) {
                // trap the return key being pressed
                if (e.keyCode === 13) {
                    // insert 2 br tags (if only one br tag is inserted the cursor won't go to the next line)
                    document.execCommand('insertHTML', false, '<br><br>');
                    // prevent the default behaviour of return key pressed
                    return false;
                }
            });

            var contents = $('#alDesc').html();
            $( "#alDesc" ).blur(function() {
                if (contents!=$(this).html()){
                    console.log($(this).html());
                    $.ajax({
                        type: 'POST',
                        url: '/foton-klub/updateGallAjaxText/moja/' + '{{$gallery->id}}',
                        data: {
                            '_token': $('meta[name="csrf-token"]').attr('content'),
                            'text': $(this).html()
                        }

                    });
                    contents = $(this).html();
                }

            });
        });
    </script>
@stop
