@extends('admin.index')
@section('title', 'Home - Manager - Create')

@section('body')
    <div class="form-groupp">
        <div class="row">
            <div class="col-lg-12" id="header">
                <header>
                    <p>Home | Manager | Create </p>
                </header>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12" id="header">
                <header>
                    <p class="text-center">New Manager </p>
                </header>
            </div><br><hr>
            <div class="col-lg-12 contenu">
                <div class="row">
                    {!! Form::open(['url'=>'superadmin']) !!}
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
@stop
@section('header')
    <link href="{{asset('bower_components/Materialize/dist/css/materialize.css')}}" rel="stylesheet">
@stop

@section('footer')
    <script src="{{ asset('bower_components/Materialize/dist/js/materialize.js') }}" type="text/javascript"></script>
    <script>
        $(document).ready(function(){
            $(".date :first-child").addClass('datepicker');
            $("select").addClass("selectpicker");
            $('.datepicker').datepicker({
                format: 'yyyy-mm-dd',
                startDate: '-3555555d'
            });

        });
    </script>

@stop