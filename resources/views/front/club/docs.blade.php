@extends('layouts.main')

@section('content')



    <section class="vesti-content-new background-new">
        <div class="container">
            @include('layouts.partials.side')
            <div class="container-small">
                <div class="row">
                    @if($members->count()>0)
                        @foreach($members as $oneGal)
                            <div class="span4" style="width: 25%;">
                                <div class="vesti-box">
                                    <div class="gallery-img">
                                        <a href="/img/docs/{{$oneGal->file}}" target="_blank"><img width="50px" src="{{asset('assets/img/PDFNN.jpg')}}"> </a>
                                    </div>
                                    <div class="vesti-info" style="margin-top: 10%">
                                        <h2><a href="/img/docs/{{$oneGal->file}}"> {{$oneGal->name}}</a></h2>
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
