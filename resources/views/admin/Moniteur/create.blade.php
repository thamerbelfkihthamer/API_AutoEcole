@extends('admin.index')
@section('title')
    Moniteur - Create
@stop
@section('body')
    <div class="form-groupp">
        <div class="row">
            <div class="col-lg-12" id="header">
                <header>
                    <p>Home | Moniteur | Create </p>
                </header>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12" id="header">
                <header>
                    <p class="text-center">New Moniteur </p>
                </header>
            </div><hr>
            <div class="col-lg-12 contenu">
                {!! Form::open(['url'=>'moniteur']) !!}
                <div class="form-group {!! $errors->has('nom') ? 'has-error' : '' !!}">
                <div class="row">
                <div class="col-lg-4 col-lg-offset-1">
                    <div class="row mar">
                        <div class="input-field">
                            {!! Form::label('First Name') !!}
                            {!! Form::text('name') !!}
                            {!! $errors->first('name', '<small>:message</small>') !!}
                        </div>
                    </div>
                    <div class="row mar">
                        <div class="input-field">
                            {!! Form::label('Last Name') !!}
                            {!! Form::text('prenom') !!}
                            {!! $errors->first('prenom', '<small>:message</small>') !!}
                        </div>
                    </div>
                    <div class="row mar">
                        <div class="input-field">
                            {!! Form::label('Email') !!}
                            {!! Form::email('email') !!}
                            {!! $errors->first('email', '<small>:message</small>') !!}
                        </div>
                    </div>
                    </div>
                    <div class="col-lg-4 col-lg-offset-1">
                    <div class="row mar">
                        <div class="input-field">
                            {!! Form::label('Telephone') !!}
                            {!! Form::text('telephone') !!}
                            {!! $errors->first('telephone', '<small>:message</small>') !!}
                        </div>
                    </div>
                    <div class="row mar">
                        <div class="input-field">
                            {!! Form::label('CIN') !!}
                            {!! Form::text('cin') !!}
                            {!! $errors->first('cin', '<small>:message</small>') !!}
                        </div>
                    </div>
                    {!! Form::submit('Save', ['class'=>'btn primary']) !!}
                    {!! Form::close() !!}
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
           $(".date :first-child").addClass('datepicker');
            $("select").addClass("selectpicker");
            $('.datepicker').pickadate({
                selectMonths: true, // Creates a dropdown to control month
                selectYears: 15, // Creates a dropdown of 15 years to control year
                format: 'yyyy-mm-dd'
            });

        });
    </script>
@stop


