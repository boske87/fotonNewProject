@extends('admin.layouts.admin')

@section('content')

    <h1></h1>

    <ol class="breadcrumb">
        <li><a href="">Dashboard</a></li>
    </ol>

    <div class="cms-options">
        <div class="cms-options-title-action">
            <p class="cms-options-title lead">Dodavanje dokumenta</p>
        </div>
    </div>
    @include('admin.layouts.crud.flash_message')

    <div class="panel panel-default">
        <div class="panel-body">
            <div class="tab-content">
                <div class="tab-pane fade in active" id="tab-1">

                    <fieldset>

                        {!! Form::open(['route' => 'admin.docs-add', 'files' => true, 'class' => 'form-horizontal']) !!}
                        <input type="hidden" name="front" value="{{isset($type) ? 1 : 0}}">
                        @include('admin.layouts.modules.file_input', [
                                         'label' => 'PDF',
                                         'inputName' => 'file',
                                         'directory' => 'img/docs'
                                       ])
                        <div class="form-group{!! $errors ->has('head') ? ' has-error' : '' !!}">
                            {!! Form::label('name', 'Naziv', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="col-sm-10">
                                {!! Form::text('name', null, ['class' => 'form-control']) !!}
                                {!! $errors ->first('name', '<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-offset-2 col-sm-10">
                                {!! Form::hidden('_token',csrf_token()) !!}
                                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                                <a href="{{route('admin.gallery')}}" class="btn btn-link pull-right">Cancel</a>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </fieldset>
                </div>
            </div>
        </div></div>
@endsection