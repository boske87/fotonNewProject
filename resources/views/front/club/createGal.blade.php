@extends('layouts.main')

@section('content')

    <section class="vesti-content-new background-new">
        <div class="container">
            @include('layouts.partials.side')
            <div class="container-small">
                <div class="row">

                    <div class="row">
                        {!! Form::open(['route' => 'foton-klub.dodavanje-galerije', 'files' => false]) !!}
                            <h2>Napravite novi album</h2>
                            <div class="modal-body" style="width: 70% !important; margin-left: 15%">
                                <h5 style="text-align: center">Ime albuma</h5>
                                <input type="text" name="galleryName" class="form-control" placeholder="Unesite ime albuma" required>
                            </div>
                            <div class="modal-body" style="width: 70% !important; margin-left: 15%">
                                <h5 style="text-align: center">Opis albuma</h5>
                                <textarea  name="desc_gal" cols="50" rows="5" id="comment"></textarea>
                            </div>

                            <div id="fine-uploader-manual-trigger">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            </div>

                            <div class="row" style="width: 70% !important; margin-left: 15%; margin-top: 5%">
                                <button style="text-align: center" class="btn btn-primary">Sledeci korak</button>
                            </div>
                        {!! Form::close() !!}
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