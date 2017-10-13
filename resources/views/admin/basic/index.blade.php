@extends('admin.layouts.admin')

@section('content')
    @include('admin/basic/js_edit')


    <h1></h1>

    <ol class="breadcrumb">
        <li><a href="">Dashboard</a></li>
    </ol>

    <div class="cms-options">
        <div class="cms-options-title-action">
            <p class="cms-options-title lead"> Pocetni nivo</p>
        </div>
    </div>
    @include('admin.layouts.crud.flash_message')
    <ul id="forms-tabs" class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#tab-1">Text Block</a></li>

    </ul>
    {!! Form::open(['method' => 'PATCH', 'route' => ['admin.basic.update', $id], 'class' => 'form-horizontal']) !!}
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="tab-content">
                <div class="tab-pane fade in active" id="tab-1">
                    <fieldset>
                        <!-- Body Form Input -->
                        <div class="form-group{!! $errors ->has('body') ? ' has-error' : '' !!}">
                            {!! Form::label('body', 'Tekst 1*', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="col-sm-10">
                                {!! Form::textarea('Text1', $homeText->Text1, ['id'=>'text', 'class' => 'form-control', 'rows' => 4]) !!}
                                {!! $errors ->first('body', '<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group{!! $errors ->has('body') ? ' has-error' : '' !!}">
                            {!! Form::label('body2', 'Tekst 2*', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="col-sm-10">
                                {!! Form::textarea('Text2', $homeText->Text2, ['id'=>'text2', 'class' => 'form-control', 'rows' => 4]) !!}
                                {!! $errors ->first('body2', '<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group{!! $errors ->has('body3') ? ' has-error' : '' !!}">
                            {!! Form::label('body3', 'Tekst 3*', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="col-sm-10">
                                {!! Form::textarea('Text4', $homeText->Text4, ['id'=>'text3', 'class' => 'form-control', 'rows' => 4]) !!}
                                {!! $errors ->first('body3', '<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group{!! $errors ->has('body4') ? ' has-error' : '' !!}">
                            {!! Form::label('body4', 'Tekst 4*', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="col-sm-10">
                                {!! Form::textarea('Text5', $homeText->Text5, ['id'=>'text4', 'class' => 'form-control', 'rows' => 4]) !!}
                                {!! $errors ->first('body4', '<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group{!! $errors ->has('body5') ? ' has-error' : '' !!}">
                            {!! Form::label('body5', 'Tekst 5*', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="col-sm-10">
                                {!! Form::textarea('Text3', $homeText->Text3, ['id'=>'text5', 'class' => 'form-control', 'rows' => 4]) !!}
                                {!! $errors ->first('body5', '<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group{!! $errors ->has('body6') ? ' has-error' : '' !!}">
                            {!! Form::label('body6', 'Tekst 6*', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="col-sm-10">
                                {!! Form::textarea('Text6', $homeText->Text6, ['id'=>'text6', 'class' => 'form-control', 'rows' => 4]) !!}
                                {!! $errors ->first('body6', '<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group{!! $errors ->has('body7') ? ' has-error' : '' !!}">
                            {!! Form::label('body7', 'Link youtube*', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="col-sm-10">
                                {!! Form::textarea('Text7', $homeText->Text7, ['id'=>'text7', 'class' => 'form-control', 'rows' => 4]) !!}
                                {!! $errors ->first('body7', '<span class="help-block">:message</span>') !!}
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