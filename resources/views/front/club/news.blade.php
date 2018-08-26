@extends('layouts.main')

@section('content')

    <script type="text/javascript">
        $(document).ready(function(){
            var CookieSet = jQuery.cookie('popup_1_2');
            console.log(CookieSet);
            console.log(CookieSet == "null");
            if (CookieSet == "null") {
                console.log('asdasds');
                $('#myModal').modal('show');
                $.cookie("popup_1_2", "2");
            }
        });
    </script>
    <div id="myModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Vesti</h4>
                </div>
                <div class="modal-body">
                    <p>{!! $popUp->text !!}</p>
                </div>
            </div>
        </div>
    </div>

    <section class="background-new">
        <div class="container">
            @include('layouts.partials.side')
            <div class="container-small">
                <div class="row">
                    <div class="row" style="width: 70% !important; margin-left: 15%; margin-top: 5%">
                        <button
                                 style="text-align: center; margin-bottom: 5%" class="btn btn-primary"><a href=""><span data-toggle="modal" data-target="#myModalNews">Dodajte novu vest</span></a></button>
                    </div>
                    @if($news->count()>0)
                        @foreach($news as $oneGal)
                            <div class="span4">
                                <div class="vesti-box">
                                    <div class="gallery-img">
                                        <a href="{{route('foton-klub.vest',$oneGal->slug)}}">
                                            <img src="{{ Image::load('gallery/club-news/' . $oneGal->main_image, ['h' => 10]) }}">
                                        </a>
                                    </div>
                                    <div class="vesti-info">
                                        <h2><a href="{{route('foton-klub.vest',$oneGal->slug)}}"> {!! $oneGal->head !!}</a></h2>
                                        <span class="vesti-datum">{{ $oneGal->created_at }} - {{$oneGal->user->ime_prezime}}</span>
                                        <p>
                                            {!! mb_substr($oneGal->desc,0,30, "utf-8") !!}...
                                        </p>
                                        <a href="#" data-toggle="modal" data-target="#myModalIzmena{{$oneGal->id}}"
                                           style="color: green">IZMENI &rarr;</a><br/>
                                            <a onclick="return confirm('Da li sigurno zelite da obrisete vest?');" href="{{route('foton-klub.vesti-brisanje', $oneGal->id)}}" style="color: red">OBRISI VEST &rarr;</a><br/>
                                        <a href="{{route('foton-klub.vest', $oneGal->slug)}}">SAZNAJ VIŠE &rarr;</a><br/>
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

    @if($news->count()>0)
        @foreach($news as $oneGal)
            <div id="myModalIzmena{{$oneGal->id}}" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                {!! Form::open(['method' => 'PATCH','route' => ['foton-klub.vesti-edit', $oneGal->id ]]) !!}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 id="myModalLabel">Izmeni vesti</h3>
                </div>
                <div class="modal-body">
                    <p>Naslov:</p><input value="{{$oneGal->head}}" type="text" name="head" class="input-block-level" placeholder="Naslov...." required>
                    <p>Opis:</p><textarea name="desc" class="input-block-level">{{$oneGal->desc}}</textarea>
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
