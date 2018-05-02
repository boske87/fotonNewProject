@extends('admin.layouts.admin')

@section('content')
    <style>
        select.color-list option.option2
        {
            background-color: #007700;
        }
    </style>
    <h1>User Page</h1>

    <ol class="breadcrumb">
        <li>User Page</li>
        <li class="active">Edit User</li>
    </ol>

    <div class="cms-options">
        <div class="cms-options-title-action">
            <p class="cms-options-title lead">User Page</p>
        </div>
    </div>
    @include('admin.layouts.crud.validation_flash_error')
    <ul id="forms-tabs" class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#tab-1">Basic</a></li>
        <li><a data-toggle="tab" href="#tab-2">Info</a></li>
    </ul>
    {!! Form::open(['route' => 'admin.users.add', 'files' => true, 'class' => 'form-horizontal']) !!}
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="tab-content">
                <div class="tab-pane fade in active" id="tab-1">
                    <fieldset>

                        <!-- Username Form Input -->
                        <div class="form-group{!! $errors ->has('email') ? ' has-error' : '' !!}">
                            {!! Form::label('email', 'Email Adresa', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="col-sm-10">
                                {!! Form::text('email', null, ['class' => 'form-control']) !!}
                                {!! $errors ->first('email', '<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <!-- Password Form Input -->
                        <div class="form-group{!! $errors ->has('ime_prezime') ? ' has-error' : '' !!}">
                            {!! Form::label('ime_prezime', 'Ime i prezime', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="col-sm-10">
                                {!! Form::text('ime_prezime', null, ['class' => 'form-control']) !!}
                                {!! $errors ->first('ime_prezime', '<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                        @include('admin.layouts.modules.file_input', [
                         'label' => 'Slika',
                         'inputName' => 'main_image',
                         'directory' => 'img/gallery',
                         'hint'=>'Fotografija lica'
                       ])
                        <div class="form-group{!! $errors ->has('datum_rodjenja') ? ' has-error' : '' !!}">
                            {!! Form::label('datum_rodjenja', 'Datum rodjenja', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="col-sm-10">
                                {!! Form::text('datum_rodjenja', null, ['class' => 'form-control']) !!}
                                {!! $errors ->first('datum_rodjenja', '<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group{!! $errors ->has('mesto_rodjenja') ? ' has-error' : '' !!}">
                            {!! Form::label('mesto_rodjenja', 'Mesto rodjenja', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="col-sm-10">
                                {!! Form::text('mesto_rodjenja', null, ['class' => 'form-control']) !!}
                                {!! $errors ->first('mesto_rodjenja', '<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                        <div class="form-group{!! $errors ->has('tel') ? ' has-error' : '' !!}">
                            {!! Form::label('tel', 'Kontakt telefon', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="col-sm-10">
                                {!! Form::text('tel', null, ['class' => 'form-control']) !!}
                                {!! $errors ->first('tel', '<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <!-- User Type Form Input -->
                        <div class="form-group{!! $errors ->has('user_type') ? ' has-error' : '' !!}">
                            {!! Form::label('paketKategorija', 'Kategorija paketa', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="col-sm-10">
                                {!! Form::select('paketKategorija', $cat, 0,['class' => 'form-control']) !!}
                                {!! $errors ->first('paketKategorija', '<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <!-- User Type Form Input -->
                        <div class="form-group{!! $errors ->has('status') ? ' has-error' : '' !!}">
                            {!! Form::label('status', 'Status naloga', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="col-sm-10">
                                {!! Form::select('status', $userStatus, 0,['class' => 'form-control']) !!}
                                {!! $errors ->first('status', '<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group{!! $errors ->has('titula') ? ' has-error' : '' !!}">
                            {!! Form::label('titula', 'Titula', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="col-sm-10">
                                {!! Form::text('titula', null, ['class' => 'form-control']) !!}
                                {!! $errors ->first('titula', '<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <!-- User Type Form Input -->
                        <div class="form-group{!! $errors ->has('status') ? ' has-error' : '' !!}">
                            {!! Form::label('color', 'Boja titule', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="col-sm-10">

                                <input name="color" type="color" value="red" class="form-control" style="width: 25% !important;">
                                {!! $errors ->first('color', '<span class="help-block">:message</span>') !!}
                            </div>
                        </div>


                    </fieldset>
                </div>
                <!-- =tab-1-->
                <div class="tab-pane fade in" id="tab-2">
                    <fieldset>
                        <!-- First Name Form Input -->
                        <div class="form-group{!! $errors ->has('zavrseno_obrazovanje') ? ' has-error' : '' !!}">
                            {!! Form::label('zavrseno_obrazovanje', 'Zavrseno obrazovanje', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="col-sm-10">
                                {!! Form::textarea('zavrseno_obrazovanje', null, ['class' => 'form-control']) !!}
                                {!! $errors ->first('zavrseno_obrazovanje', '<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <!-- Last Name Form Input -->
                        <div class="form-group{!! $errors ->has('trenutno_zaposlenje') ? ' has-error' : '' !!}">
                            {!! Form::label('trenutno_zaposlenje', 'Trenutno zaposlenje', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="col-sm-10">
                                {!! Form::textarea('trenutno_zaposlenje', null, ['class' => 'form-control']) !!}
                                {!! $errors ->first('trenutno_zaposlenje', '<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <!-- Email Form Input -->
                        <div class="form-group{!! $errors ->has('zavrsena_skola_fotografije') ? ' has-error' : '' !!}">
                            {!! Form::label('zavrsena_skola_fotografije', 'Zavrsena skola fotografije', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="col-sm-10">
                                {!! Form::textarea('zavrsena_skola_fotografije', null, ['class' => 'form-control']) !!}
                                {!! $errors ->first('email', '<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                        <!-- Description Form Input -->
                        <div class="form-group{!! $errors ->has('fotografske_titule_zvanja_diplome') ? ' has-error' : '' !!}">
                            {!! Form::label('fotografske_titule_zvanja_diplome', 'Fotografske titule zvanja diplome', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="col-sm-10">
                                {!! Form::textarea('fotografske_titule_zvanja_diplome', null, ['class' => 'form-control']) !!}
                                {!! $errors ->first('description', '<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group{!! $errors ->has('umetnicke_aktivnosti') ? ' has-error' : '' !!}">
                            {!! Form::label('umetnicke_aktivnosti', 'Umetnicke aktivnosti', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="col-sm-10">
                                {!! Form::textarea('umetnicke_aktivnosti', null, ['class' => 'form-control']) !!}
                                {!! $errors ->first('description', '<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group{!! $errors ->has('desc') ? ' has-error' : '' !!}">
                            {!! Form::label('desc', 'O sebi', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="col-sm-10">
                                {!! Form::textarea('desc', null, ['class' => 'form-control']) !!}
                                {!! $errors ->first('desc', '<span class="help-block">:message</span>') !!}
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
                </div>
            </div>
        </div>

    </div>
    {!! Form::close() !!}
@stop
