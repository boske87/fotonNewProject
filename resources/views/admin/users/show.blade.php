@extends('admin.layouts.admin')

@section('content')

<h1>{{ $template['section_name'] }}</h1>

<ol class="breadcrumb">
    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
    <li><a href="{{ url('admin/users') }}">{{ $template['title'] }}</a></li>
    <li class="active">{{ $item->username }}</li>
</ol>

@if (Session::has('flash_message'))
<div class="alert alert-{{ Session::has('flash_type') ? Session::get('flash_type') : 'warning' }} alert-dismissable fade in">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <p>{{ Session::get('flash_message') }}</p>
</div>
@endif

<div class="form-horizontal">

    <div class="cms-options">
        <div class="cms-options-title-action">
            <p class="cms-options-title lead">{{ $template['title'] }} - {{ $item->username }}</p>
            <a class="cms-options-action btn btn-info btn-sm" href="{{ route('admin.users.index') }}">Go Back</a>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-body">

            <div class="tab-content">

                <div id="tab-1" class="tab-pane fade in active">
                    <fieldset>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"></label>
                            <div class="col-sm-10">
                                <h3 class="pull-left"><span class="label label-{{ $item->deleted_at ? 'danger' : 'success' }}">{{ $item->deleted_at ? 'Suspended' : 'Active' }} User</span></h3>

                                @if($item->deleted_at)
                                    {!! Form::open(['method' => 'PATCH', 'route' => ['admin.users.update', $item->id], 'onsubmit' => "return confirm('Are you sure you want to ACTIVATE this user?')"]) !!}
                                    {!! Form::hidden('restore', true) !!}
                                    <button type="submit" class="btn btn-success pull-right"><span class="entypo entypo-user"></span></span> Activate User</button>
                                @else
                                    {!! Form::open(['method' => 'DELETE', 'route' => ['admin.users.destroy', $item->id], 'onsubmit' => "return confirm('Are you sure you want to SUSPEND this user?')"]) !!}
                                    <button type="submit" class="btn btn-warning pull-right"><span class="entypo entypo-user"></span> Suspend User</button>
                                @endif
                                {!! Form::close() !!}

                            </div>
                        </div>


                        @if($item->avatar)
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Avatar</label>
                            <div class="col-sm-10"><p class="form-control-static"><img src="{{ asset(Image::path(Config::get('project.uploads_folder') . 'users/' . $item->avatar, 'resizeCrop', 200, 200)) }}" alt=""/> </p></div>
                        </div>
                        @endif

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Username</label>
                            <div class="col-sm-10"><p class="form-control-static">{{ $item->username }}</p></div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">User Type</label>
                            <div class="col-sm-10"><p class="form-control-static">{{ userTypeName($item->user_type) }}</p></div>
                        </div>
                        @if($item->first_name or $item->last_name)
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Full Name</label>
                            <div class="col-sm-10"><p class="form-control-static">{{ $item->full_name }}</p></div>
                        </div>
                        @endif
                        @if($item->email)
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-10"><p class="form-control-static">{{ $item->email }}</p></div>
                        </div>
                        @endif
                        @if($item->user_type!=50)
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Description</label>
                            <div class="col-sm-10"><p class="form-control-static">{{ $item->description }} </p></div>
                        </div>
                        @else
                            @if($childrens->count() >0 )
                                <div calss="form-group">
                                    {!! Form::label('childrens', "Children", ['class' => 'col-sm-2 control-label']) !!}
                                    <div class="col-sm-10">
                                        <table id="sortable-table" class="table">
                                            @foreach($childrens as $row)
                                                <tr>
                                                    <td>{{$row->first_name}} {{$row->last_name}}</td>
                                                    <td>{{$row->birthday}}</td>
                                                    <td>{{$row->gender}}</td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                            @endif
                        @endif

                    </fieldset>

                </div>

                <div class="row">
                    <div class="fnc-button-holder col-sm-offset-2 col-sm-10">
                        <a href="{{ route('admin.users.index') }}" class="btn btn-primary fnc-save">OK</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@stop