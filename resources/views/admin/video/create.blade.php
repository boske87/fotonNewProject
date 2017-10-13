@extends('admin.layouts.admin')


@section('content')


    <h1>{{ $template['section_name'] }}</h1>

    <ol class="breadcrumb">
        <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li><a href="{{ url('admin/videos') }}">{{ $template['title'] }}</a></li>
        <li class="active">Add</li>
    </ol>


    <div class="cms-options">
        <div class="cms-options-title-action">
            <p class="cms-options-title lead">{{ $template['title'] }} - Add</p>
        </div>
    </div>
    @include('admin.layouts.crud.flash_message')
    @include('admin.layouts.crud.validation_flash_error')
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="tab-content">
                <div class="tab-pane fade in active" id="tab-1">

                    <fieldset>
                        {!! Form::open(['route' => 'admin.videos.store', 'files' => true, 'class' => 'form-horizontal']) !!}

                                <!-- Token Form Input -->
                        <div class="form-group{!! $errors ->has('caption') ? ' has-error' : '' !!}">
                            {!! Form::label('token', 'Video ID*', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="col-sm-10">
                                {!! Form::text('token', null, ['class' => 'form-control']) !!}
                                {!! $errors ->first('token', '<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <!-- Caption Form Input -->
                        <div class="form-group{!! $errors ->has('caption') ? ' has-error' : '' !!}">
                            {!! Form::label('caption', 'Caption*', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="col-sm-10">
                                {!! Form::text('caption', null, ['class' => 'form-control']) !!}
                                {!! $errors ->first('caption', '<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                        <!-- Image ALT Form Input -->
                        <div class="form-group">
                            {!! Form::label('image_alt', 'Image Alt', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="col-sm-10">
                                {!! Form::text('image_alt', null, ['class' => 'form-control']) !!}

                            </div>
                        </div>
                        <!-- Type Video Form Input -->
                        <div class="form-group{!! $errors ->has('video_type') ? ' has-error' : '' !!}">
                            {!! Form::label('video_type', 'Video Type*', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="col-sm-10">
                                {!! Form::select('video_type', Config::get('project.video_type'), null, ['class' => 'form-control']) !!}
                                {!! $errors ->first('video_type', '<span class="help-block">:message</span>') !!}
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-sm-offset-2 col-sm-10">
                                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                                <a href="{{ url('admin/videos') }}" class="btn btn-link pull-right">Cancel</a>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </fieldset>
                </div>
            </div>
        </div>
    </div>
@endsection