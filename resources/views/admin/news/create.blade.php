@extends('admin.layouts.admin')


@section('content')

    @include('admin/news/js_edit')

    <h1>Dodavanje vesti</h1>

    <ol class="breadcrumb">
        <li><a href="">Dashboard</a></li>
    </ol>

    <div class="cms-options">
        <div class="cms-options-title-action">
            <p class="cms-options-title lead">Dodavanje vesti</p>
        </div>
    </div>
    @include('admin.layouts.crud.flash_message')

    <div class="panel panel-default">
        <div class="panel-body">
            <div class="tab-content">
                <div class="tab-pane fade in active" id="tab-1">

                    <fieldset>

                    {!! Form::open(['route' => 'admin.news.add', 'files' => true, 'class' => 'form-horizontal']) !!}


                    <!-- Image ALT Form Input -->
                        <div class="form-group{!! $errors ->has('head') ? ' has-error' : '' !!}">
                            {!! Form::label('name', 'Naslov', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="col-sm-10">
                                {!! Form::text('head', null, ['class' => 'form-control']) !!}
                                {!! $errors ->first('head', '<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group{!! $errors ->has('head') ? ' has-error' : '' !!}">
                            {!! Form::label('Link', 'Link', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="col-sm-10">
                                {!! Form::text('link', null, ['class' => 'form-control']) !!}
                                {!! $errors ->first('link', '<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group{!! $errors ->has('desc') ? ' has-error' : '' !!}">
                            {!! Form::label('opis', 'Opis*', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="col-sm-10">
                                {!! Form::textarea('desc', null, ['id'=>'desc', 'class' => 'form-control', 'rows' => 8]) !!}
                                {!! $errors ->first('desc', '<span class="help-block">:message</span>') !!}
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
                                <a href="{{route('admin.news')}}" class="btn btn-link pull-right">Cancel</a>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </fieldset>
                </div>
            </div>
        </div></div>
@endsection