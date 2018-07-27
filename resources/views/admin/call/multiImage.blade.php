@extends('admin.layouts.admin')
@section('content')
    @include('layouts.partials.upload')
    <h1></h1>

    <ol class="breadcrumb">
        <li><a href="">Dashboard</a></li>
    </ol>

    <div class="cms-options">
        <div class="cms-options-title-action">
            <p class="cms-options-title lead"> Dodavanje slika u album zvanja</p>
        </div>
    </div>
    @include('admin.layouts.crud.flash_message')

    <div class="panel panel-default">
        <div class="panel-body">
            <div class="tab-content">
                <div class="tab-pane fade in active" id="tab-1">

                    <fieldset>
                        <meta name="csrf-token" content="{!! csrf_token() !!}" />
                        <input id="gal_id" type="hidden" name="gal_id" value="{{ $id }}">
                        <div id="fine-uploader-manual-trigger">


                        </div>
                    </fieldset>
                    <a href="{{route('admin.user.gallery.call.view', $id)}}" class="btn btn-link pull-right">Zavrseno</a>
                </div>
            </div>
        </div></div>

    <script>
        console.log($('meta[name="csrf-token"]').attr('content'));
        $('#fine-uploader-manual-trigger').fineUploader({
            template: 'qq-template-manual-trigger',
            request: {
                endpoint: '/admin/user/gallery/call/add/imageMulti/{{$id}}',
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
@endsection
