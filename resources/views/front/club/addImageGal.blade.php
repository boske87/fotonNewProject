@extends('layouts.main')

@section('content')

    <section class="vesti-content-new background-new">
        <div class="container">
            @include('layouts.partials.side')
            <div class="container-small">
                <div class="row">

                    <div class="row">
                        <h2>Napravite novu galeriju</h2>

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input id="gal_id" type="hidden" name="gal_id" value="{{ $gal->id }}">
                        <div id="fine-uploader-manual-trigger">


                        </div>

                        <div class="row" style="width: 70% !important; margin-left: 15%; margin-top: 5%">
                            <a href="{{route('foton-klub.moja-galerija', $gal->id)}}" style="text-align: center" class="btn btn-primary">Pogledajte Vasu galeriju</a>
                        </div>
                    </div>

                    <!-- Your code to create an instance of Fine Uploader and bind to the DOM/template
                    ====================================================================== -->
                    <script>
                        console.log($('meta[name="csrf-token"]').attr('content'));
                        $('#fine-uploader-manual-trigger').fineUploader({
                            template: 'qq-template-manual-trigger',
                            request: {
                                endpoint: 'http://185.183.182.52/foton-klub/dodavanje-slika-u-galeriju',
                                params: {
                                    '_token': $('meta[name="csrf-token"]').attr('content'),
                                    'gal_id': $('#gal_id').val()
                                }
                            },
                            thumbnails: {
                                placeholders: {
                                    waitingPath: '/source/placeholders/waiting-generic.png',
                                    notAvailablePath: '/source/placeholders/not_available-generic.png'
                                }
                            },
                            autoUpload: false
                        });

                        $('#trigger-upload').click(function() {
                            $('#fine-uploader-manual-trigger').fineUploader('uploadStoredFiles');
                        });
                    </script>
                </div>

                <div class="row">
                    <div class="paging">
                    </div>
                </div>

            </div>
        </div>
    </section>

@stop
