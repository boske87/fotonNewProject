@extends('layouts.main')

@section('content')

    <script type="text/javascript">
        $(document).ready(function(){
            $("#myModal").modal('show');
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
                                            {!! substr($oneGal->desc,0,30) !!}...
                                        </p>
                                            <a href="{{route('foton-klub.vesti-brisanje', $oneGal->id)}}" style="color: red">OBRISI VEST &rarr;</a><br/>
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

@stop
