@extends('admin.layouts.admin')

@section('content')

<h1>{{ $item->full_name}}</h1>

<ol class="breadcrumb">
    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
    <li class="active">My Account</li>
</ol>

<div class="cms-options">
    <div class="cms-options-title-action">
        <p class="cms-options-title lead">My Account</p>
    </div>
</div>
@include('admin.layouts.crud.flash_message')
<ul id="forms-tabs" class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#tab-1">Basic</a></li>
    <li><a data-toggle="tab" href="#tab-2">Info</a></li>
</ul>
{!! Form::model($item, ['method' => 'PATCH', 'route' => ['admin.my_account', $item->id], 'files' => true, 'class' => 'form-horizontal']) !!}
<div class="panel panel-default">
    <div class="panel-body">
        <div class="tab-content">
            <div class="tab-pane fade in active" id="tab-1">
                <fieldset>

                    {!! Form::hidden('return_url', $return_url, ['class' => 'form-control'] )!!}

                    <!-- Username Form Input -->
                    <div class="form-group{!! $errors ->has('username') ? ' has-error' : '' !!}">
                        {!! Form::label('username', 'Username', ['class' => 'col-sm-2 control-label']) !!}
                        <div class="col-sm-10">
                            {!! Form::text('username', null, ['class' => 'form-control']) !!}
                            {!! $errors ->first('username', '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>

                    <!-- Password Form Input -->
                    <div class="form-group{!! $errors ->has('password') ? ' has-error' : '' !!}">
                        {!! Form::label('password', 'Password', ['class' => 'col-sm-2 control-label']) !!}
                        <div class="col-sm-10">
                            {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password - Leave empty for no changes']) !!}
                            {!! $errors ->first('password', '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>

                    @if(Auth::user()->isAdmin())
                    <!-- User Type Form Input -->
                    <div class="form-group{!! $errors ->has('user_type') ? ' has-error' : '' !!}">
                        {!! Form::label('user_type', 'User Type', ['class' => 'col-sm-2 control-label']) !!}
                        <div class="col-sm-10">
                            {!! Form::select('user_type', $userTypes, null,['class' => 'form-control']) !!}
                            {!! $errors ->first('user_type', '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>
                    @endif


                </fieldset>
            </div>
            <!-- =tab-1-->
            <div class="tab-pane fade in" id="tab-2">
                <fieldset>
                    <!-- First Name Form Input -->
                    <div class="form-group{!! $errors ->has('first_name') ? ' has-error' : '' !!}">
                        {!! Form::label('first_name', 'First Name', ['class' => 'col-sm-2 control-label']) !!}
                        <div class="col-sm-10">
                            {!! Form::text('first_name', null, ['class' => 'form-control']) !!}
                            {!! $errors ->first('first_name', '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>

                    <!-- Last Name Form Input -->
                    <div class="form-group{!! $errors ->has('last_name') ? ' has-error' : '' !!}">
                        {!! Form::label('last_name', 'Last Name', ['class' => 'col-sm-2 control-label']) !!}
                        <div class="col-sm-10">
                            {!! Form::text('last_name', null, ['class' => 'form-control']) !!}
                            {!! $errors ->first('last_name', '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>

                    <!-- Email Form Input -->
                    <div class="form-group{!! $errors ->has('email') ? ' has-error' : '' !!}">
                        {!! Form::label('email', 'Email', ['class' => 'col-sm-2 control-label']) !!}
                        <div class="col-sm-10">
                            {!! Form::text('email', null, ['class' => 'form-control']) !!}
                            {!! $errors ->first('email', '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>
                    <!-- Description Form Input -->
                    <div class="form-group{!! $errors ->has('description') ? ' has-error' : '' !!}">
                        {!! Form::label('description', 'Description', ['class' => 'col-sm-2 control-label']) !!}
                        <div class="col-sm-10">
                            {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
                            {!! $errors ->first('description', '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>
                    


                    <!-- Avatar Form Input -->
                    <div class="form-group{!! $errors ->has('avatar') ? ' has-error' : '' !!}">
                        {!! Form::label('avatar', 'Avatar', ['class' => 'col-sm-2 control-label']) !!}
                        <div class="col-sm-10">
                            {!! Form::file('avatar') !!}
                            {!! $errors ->first('avatar', '<span class="help-block">:message</span>') !!}
                            @if ($item->avatar)
                                <p class="help-block">
                                    <a href="{{ asset('uploads/users/' . $item->avatar) }}"><img src="{{ asset(Image::path(Config::get('project.uploads_folder') . 'users/' . $item->avatar, 'resize', null, 100)) }}" alt=""/></a>
                                </p>
                            @endif
                        </div>
                    </div>
                </fieldset>

            </div>
            <!-- =tab-2-->
        </div>
        <!-- =tab-content -->
        <div class="row">
            <div class="col-sm-offset-2 col-sm-10">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                {!! link_to_route('admin.users.index', 'Cancel', null, ['class' => 'btn btn-link pull-right']) !!}
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}
@stop