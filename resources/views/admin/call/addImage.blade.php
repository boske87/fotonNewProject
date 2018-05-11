@extends('admin.layouts.admin')

@section('content')

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

                        {!! Form::open(['route' => ['admin.user.gallery.call.add.image',$id], 'files' => true, 'class' => 'form-horizontal']) !!}

                        @include('admin.layouts.modules.file_input', [
                                         'label' => 'Image',
                                         'inputName' => 'main_image',
                                         'directory' => 'img/gallery/galerija_zvanja'.$id.'/',
                                         'hint'=>'Upload the highest resolution possible for optimal results'
                                       ])
                        <div class="row">
                            <div class="col-sm-offset-2 col-sm-6">
                                {!! Form::hidden('_token',csrf_token()) !!}
                                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                                <a href="{{route('admin.user.gallery.call.view', $id)}}" class="btn btn-link pull-right">Cancel</a>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </fieldset>
                </div>
            </div>
        </div></div>
@endsection
