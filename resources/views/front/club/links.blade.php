@extends('layouts.main')

@section('content')
    <script>

    </script>
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=zl2nfrilkbuswcy0bq3e2yn01ai2mye24ykyn9r2xse9kvcd"></script>
    <script>tinymce.init({ selector:'textarea',plugins: 'link code', convert_urls: false,
            'anchor_bottom': false,
            'anchor_top': false,
            content_css: [
                '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
                '//www.tinymce.com/css/codepen.min.css'
            ]});
        $(document).ready(function(){
            $(document).on('focusin', function(e) {
                if ($(e.target).closest(".mce-window").length) {
                    e.stopImmediatePropagation();
                }
            });
        });
    </script>

    <section class="background-new">
        <div class="container">
            @include('layouts.partials.side')
            <div class="container-small">
                <div class="row">
                    <div class="row" style="width: 70% !important; margin-left: 15%; margin-top: 5%">
                        <button
                                style="text-align: center; margin-bottom: 5%" class="btn btn-primary"><a href="">
                                <span data-toggle="modal" data-target="#myModalIz">Dodajte nove linkove</span></a></button>
                    </div>

                    @if($items->count()>0)
                        @foreach($items as $oneGal)
                            <div class="span4">
                                <div class="vesti-box">
                                    <div class="gallery-img">

                                    </div>
                                    <div class="vesti-info">
                                        <h2>{!! $oneGal->head !!}</h2>

                                        <span class="vesti-datum">{{ $oneGal->created_at }} - {{$oneGal->user->ime_prezime}}</span>
                                        <p>
                                            {!! $oneGal->desc !!}
                                        </p>
                                        <p>
                                           <a style="color: red" href="{!! $oneGal->url !!}" target="_blank">{!! $oneGal->url !!}</a>
                                        </p>
                                        <a href="#" data-toggle="modal" data-target="#myModalIzmena{{$oneGal->id}}"
                                           style="color: green">IZMENI &rarr;</a><br/>
                                        <a onclick="return confirm('Da li sigurno zelite da obrisete?');" href="{{route('foton-klub.links-brisanje', $oneGal->id)}}"
                                           style="color: red">OBRISI &rarr;</a><br/>

                                        <hr/>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else

                        <p class="alert alert-warning">There are no items.</p>
                    @endif
                </div>
                <div class="row">
                    <div class="paging">

                    </div>
                </div>

            </div>
        </div>
    </section>
    <div id="myModalIz" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        {!! Form::open(['route' => 'foton-klub.links']) !!}
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Dodajte nove linkove</h3>
        </div>
        <div class="modal-body">
            <p>Naslov:</p><input type="text" name="head" class="input-block-level" placeholder="Naslov...." required>
            <p>Opis:</p><textarea name="desc" class="input-block-level"></textarea>
            <p>Link (url) :</p><input type="url" name="url" class="input-block-level" placeholder="Link (url)...." required>
        </div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
            <button class="btn btn-primary">Submit</button>
        </div>
        {!! Form::close() !!}
    </div>

    @if($items->count()>0)
        @foreach($items as $oneGal)
            <div id="myModalIzmena{{$oneGal->id}}" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                {!! Form::open(['method' => 'PATCH','route' => ['foton-klub.links-izmena', $oneGal->id ]]) !!}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 id="myModalLabel">Izmeni link</h3>
                </div>
                <div class="modal-body">
                    <p>Naslov:</p><input value="{{$oneGal->head}}" type="text" name="head" class="input-block-level" placeholder="Naslov...." required>
                    <p>Opis:</p><textarea name="desc" class="input-block-level">{{$oneGal->desc}}</textarea>
                    <p>Link (url) :</p><input type="url" value="{{$oneGal->url}}" name="url" class="input-block-level" placeholder="Link (url)...." required>
                </div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                    <button class="btn btn-primary">Submit</button>
                </div>
                {!! Form::close() !!}
            </div>
        @endforeach
    @endif

@stop
