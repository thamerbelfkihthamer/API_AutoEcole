@extends('admin.index')
@section('title')
    Super Admin - Edit
@stop
@section('body')
    <div class="form-groupp">
        <div class="row">
            <div class="col-lg-12" id="header">
                <header>
                    <p>Home | Super Admin | Edit </p>
                </header>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12" id="header">
                <header>
                    <p class="text-center">Edit User </p>
                </header>
            </div><hr>
            <div class="col-lg-12 contenu">
                <div class="row">
                    <div class="col-lg-12">
                        {!! Form::open(['route' => ['superadmin.destroy', $user->id], 'method' => 'delete']) !!}
                        <button class="text-right"><span class="glyphicon glyphicon-trash" style="color:black; cursor: pointer" ></span></button>
                        {!!Form::close() !!}
                    </div>
                </div><hr>
                <div class="row">
                    {!! Form::model($user ,['method'=>'PATCH','route'=>['superadmin.update',$user->id]]) !!}
                    <div class="form-group {!! $errors->has('nom') ? 'has-error' : '' !!}">
                        <div class="col-lg-4 col-lg-offset-1">
                            <div class="row mar">
                                <div class="input-field">
                                    {!! Form::label('name') !!}
                                    {!! Form::text('name') !!}
                                    {!! $errors->first('name', '<small>:message</small>') !!}
                                </div>
                            </div>
                            <div class="row mar">
                                <div class="input-field">
                                    {!! Form::label('email') !!}
                                    {!! Form::text('email') !!}
                                    {!! $errors->first('email', '<small>:message</small>') !!}
                                </div>
                            </div>
                            <div class="row mar">
                                <div class="input-field">
                                    {!! Form::label('password') !!}
                                    {!! Form::password('password')!!}
                                    {!! $errors->first('password', '<small>:message</small>') !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-lg-offset-1">
                            <div class="row mar">
                                <div class="input-field">
                                    {!! Form::select('roles_id', ['1'=>'owner', '2'=>'manager','3'=>'employe']) !!}
                                    {!! $errors->first('roles_id', '<small>:message</small>') !!}
                                </div>
                            </div>
                            <div class="row mar">
                                <div class="input-field">
                                    {!! Form::submit('Save', ['class'=>'btn primary']) !!}
                                </div>
                            </div>
                            {!! Form::close() !!}

                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>



@stop

@section('header')
    <link href="{{asset('bower_components/Materialize/dist/css/materialize.css')}}" rel="stylesheet">
@stop

@section('footer')
    <script src="{{ asset('bower_components/Materialize/dist/js/materialize.js') }}" type="text/javascript"></script>
    <script>
        $(document).ready(function(){
            $("select").addClass("selectpicker");
        });
    </script>

@stop