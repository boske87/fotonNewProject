@extends('admin.layouts.admin')

@section('content')
    @include('admin/basic/js_edit')


    <h1></h1>

    <ol class="breadcrumb">
        <li><a href="">Dashboard</a></li>
    </ol>

    <div class="cms-options">
        <div class="cms-options-title-action">
            <p class="cms-options-title lead">Klub foton</p>
        </div>
    </div>
    @include('admin.layouts.crud.flash_message')
    <ul id="forms-tabs" class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#tab-1">Text Block</a></li>

    </ul>
    {!! Form::open(['method' => 'PATCH', 'route' => ['admin.club.text.update', $id], 'class' => 'form-horizontal']) !!}
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="tab-content">
                <div class="tab-pane fade in active" id="tab-1">
                    <fieldset>
                        <!-- Body Form Input -->
                        <div class="form-group{!! $errors ->has('body') ? ' has-error' : '' !!}">
                            {!! Form::label('body', 'Tekst 1*', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="col-sm-10">
                                {!! Form::textarea('Text1', isset($homeText->Text1) ? $homeText->Text1 : null, ['id'=>'text', 'class' => 'form-control', 'rows' => 4]) !!}
                                {!! $errors ->first('body', '<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group{!! $errors ->has('body') ? ' has-error' : '' !!}">
                            {!! Form::label('body2', 'Tekst 2*', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="col-sm-10">
                                {!! Form::textarea('Text2', isset($homeText->Text2) ? $homeText->Text2 : null, ['id'=>'text2', 'class' => 'form-control', 'rows' => 4]) !!}
                                {!! $errors ->first('body2', '<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                    </fieldset>
                </div>
                <!-- =tab-1 -->

            </div>
            <!-- =tab-content -->
            <div class="row">
                <div class="col-sm-offset-2 col-sm-10">
                    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                </div>
            </div>
        </div>
    </div>

    {!! Form::close() !!}
@stop
