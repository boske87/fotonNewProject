@extends('admin.layouts.admin')

@section('content')
@include('admin/sample_module/js_edit')


<h1>{{ $template['section_name'] }}</h1>

<ol class="breadcrumb">
    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
    <li><a href="{{ url('admin/sample_module') }}">{{ $template['title'] }}</a></li>
    <li class="active">Edit</li>
</ol>

<div class="cms-options">
    <div class="cms-options-title-action">
        <p class="cms-options-title lead">{{ $template['title'] }} - Edit</p>
    </div>
</div>
@include('admin.layouts.crud.validation_flash_error')
<ul id="forms-tabs" class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#tab-1">Page</a></li>
    <li><a data-toggle="tab" href="#tab-2">Meta Data</a></li>
</ul>
{!! Form::model($item, ['method' => 'PATCH', 'route' => ['admin.sample_module.update', $item->id], 'class' => 'form-horizontal']) !!}
<div class="panel panel-default">
    <div class="panel-body">
        <div class="tab-content">
            <div class="tab-pane fade in active" id="tab-1">
                <fieldset>

                    {!! Form::hidden('user_id', Auth::user()->id) !!}

                    <!-- Title Form Input -->
                    <div class="form-group{!! $errors ->has('title') ? ' has-error' : '' !!}">
                        {!! Form::label('title', 'Title*', ['class' => 'col-sm-2 control-label']) !!}
                        <div class="col-sm-10">
                            {!! Form::text('title', null, ['class' => 'form-control']) !!}
                            {!! $errors ->first('title', '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>

                    <!-- Description Body Form Input -->
                    <div class="form-group{!! $errors ->has('description') ? ' has-error' : '' !!}">
                        {!! Form::label('description', 'Description*', ['class' => 'col-sm-2 control-label']) !!}
                        <div class="col-sm-10">
                            {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
                            {!! $errors ->first('description', '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>

                </fieldset>
            </div>
            <!-- =tab-1 -->

            <div class="tab-pane fade in" id="tab-2">
                <fieldset>

                    <!-- Meta Title Form Input -->
                    <div class="form-group{!! $errors ->has('meta_title') ? ' has-error' : '' !!}">
                        {!! Form::label('meta_title', 'Meta Title', ['class' => 'col-sm-2 control-label']) !!}
                        <div class="col-sm-10">
                            {!! Form::text('meta_title', null, ['class' => 'form-control']) !!}
                            {!! $errors ->first('meta_title', '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>

                    <!-- Meta Description Form Input -->
                    <div class="form-group{!! $errors ->has('meta_desc') ? ' has-error' : '' !!}">
                        {!! Form::label('meta_desc', 'Meta Description', ['class' => 'col-sm-2 control-label']) !!}
                        <div class="col-sm-10">
                            {!! Form::textarea('meta_desc', null, ['class' => 'form-control', 'rows' => 3]) !!}
                            {!! $errors ->first('meta_desc', '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>


                    <!-- Meta Keywords Form Input -->
                    <div class="form-group{!! $errors ->has('meta_keys') ? ' has-error' : '' !!}">
                        {!! Form::label('meta_keys', 'Meta Keywords', ['class' => 'col-sm-2 control-label']) !!}
                        <div class="col-sm-10">
                            {!! Form::textarea('meta_keys', null, ['class' => 'form-control', 'rows' => 2]) !!}
                            {!! $errors ->first('meta_keys', '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>


                </fieldset>
            </div>
        </div>
        <!-- =tab-content -->
        <div class="row">
            <div class="col-sm-offset-2 col-sm-10">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                {!! link_to_route('admin.sample_module.index', 'Cancel', null, ['class' => 'btn btn-link pull-right']) !!}
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}
@stop