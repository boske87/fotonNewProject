@extends('admin.layouts.admin')

@section('content')

    <h1></h1>

    <ol class="breadcrumb">
        <li><a href="">Dashboard</a></li>
    </ol>

    <div class="cms-options">
        <div class="cms-options-title-action">
            <p class="cms-options-title lead"> Klub foton</p>
        </div>
    </div>
    @include('admin.layouts.crud.flash_message')

    <div class="panel panel-default">
        <div class="panel-body">
            <div class="tab-content">
                <div class="tab-pane fade in active" id="tab-1">

                    <fieldset>

                    {!! Form::open(['route' => 'admin.club-gallery-add', 'files' => true, 'class' => 'form-horizontal']) !!}


                    <!-- Image ALT Form Input -->
                        <div class="form-group{!! $errors ->has('name') ? ' has-error' : '' !!}">
                            {!! Form::label('Name', 'Name', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="col-sm-10">
                                {!! Form::text('name', null, ['class' => 'form-control']) !!}
                                {!! $errors ->first('name', '<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                        @include('admin.layouts.modules.file_input', [
                                         'label' => 'Image',
                                         'inputName' => 'main_image',
                                         'directory' => 'img/gallery',
                                         'hint'=>'Upload the highest resolution possible for optimal results'
                                       ])

                        <div class="row">
                            <div class="col-sm-offset-2 col-sm-10">
                                {!! Form::hidden('_token',csrf_token()) !!}
                                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                                <a href="{{route('admin.club')}}" class="btn btn-link pull-right">Cancel</a>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </fieldset>
                </div>
            </div>
        </div></div>
@endsection
