@extends('admin.index')
@section('title')
    Client - Create
@stop
@section('body')
    <div class="form-groupp">
        <div class="row">
            <div class="col-lg-12" id="header">
                <header>
                    <p>Home | Condidat | Create </p>
                </header>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12" id="header">
                <header>
                    <p class="text-center">New Etudient </p>
                </header>
            </div><hr>
            <div class="col-lg-12 contenu">
                {!! Form::open(['url'=>'client']) !!}
                <div class="form-group {!! $errors->has('nom') ? 'has-error' : '' !!}">
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
                    <div class="row mar">
                        <div class="input-field">
                            {!! Form::label('Adresss') !!}
                            {!! Form::text('adresss') !!}
                            {!! $errors->first('adresss', '<small>:message</small>') !!}
                        </div>
                    </div>
                    <div class="row mar">
                        <div class="input-field">
                            {!! Form::label('Telephone') !!}
                            {!! Form::text('tel') !!}
                            {!! $errors->first('tel', '<small>:message</small>') !!}
                        </div>
                    </div>
                    <div class="row mar">
                        <div class="input-field date">
                            {!! Form::text('date_naisssance','YYYY-MM-DD')!!}
                            {!! $errors->first('date_naisssance', '<small>:message</small>') !!}
                        </div>
                    </div>
                    <div class="row mar">
                        <div class="input-field">
                            {!! Form::select('type_piece', ['CIN'=>'CIN', 'PASSPORT'=>'PASSPORT']) !!}
                            {!! $errors->first('type_piece', '<small>:message</small>') !!}
                        </div>
                    </div>
                    <div class="row mar">
                        <div class="input-field">
                            {!! Form::label('Numero piece') !!}
                            {!! Form::text('num_piece') !!}
                            {!! $errors->first('num_piece', '<small>:message</small>') !!}
                        </div>
                    </div>
                    {!! Form::submit('Save', ['class'=>'btn primary']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@stop

@section('header')@stop

@section('footer')
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


