@extends('admin.layouts.admin')

@section('content')

    <h1></h1>

    <ol class="breadcrumb">
        <li><a href="">Dashboard</a></li>
    </ol>

    <div class="cms-options">
        <div class="cms-options-title-action">
            <p class="cms-options-title lead">Pravljenje albuma zvanja</p>
        </div>
    </div>
    @include('admin.layouts.crud.flash_message')

    <div class="panel panel-default">
        <div class="panel-body">
            <div class="tab-content">
                <div class="tab-pane fade in active" id="tab-1">

                    <fieldset>

                    {!! Form::open(['route' => ['admin.user.gallery.call.add',$id], 'files' => true, 'class' => 'form-horizontal']) !!}

                    <!-- Username Form Input -->
                        <div class="form-group{!! $errors ->has('galleryName') ? ' has-error' : '' !!}">
                            {!! Form::label('galleryName', 'Ime album zvanja', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="col-sm-6">
                                {!! Form::text('galleryName', null, ['class' => 'form-control', 'reqired']) !!}
                                {!! $errors ->first('galleryName', '<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group{!! $errors ->has('desc_gal') ? ' has-error' : '' !!}">
                            {!! Form::label('desc_gal', 'Opis galerije', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="col-sm-6">
                                {!! Form::textarea('desc_gal',null, ['id'=>'text', 'class' => 'form-control', 'rows' => 4]) !!}
                                {!! $errors ->first('desc_gal', '<span class="help-block">:message</span>') !!}
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-sm-offset-2 col-sm-6">
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
