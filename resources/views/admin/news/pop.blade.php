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

                    {!! Form::open(['method' => 'PATCH','route' => ['admin.news-pop-up.update', $id], 'files' => true, 'class' => 'form-horizontal']) !!}


                        <div class="form-group{!! $errors ->has('desc') ? ' has-error' : '' !!}">
                            {!! Form::label('text', 'Text*', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="col-sm-10">
                                {!! Form::textarea('text', $item->text, ['id'=>'text', 'class' => 'form-control', 'rows' => 8]) !!}
                                {!! $errors ->first('text', '<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

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