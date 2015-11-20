@extends('admin.index')
@section('title')
Moniteur - Edit
@stop
@section('body')
    <div class="form-groupp">
        <div class="row">
            <div class="col-lg-12" id="header">
                <header>
                    <p>Home | Moniteur | Edit </p>
                </header>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12" id="header">
                <header>
                    <p class="text-center">Edit Moniteur </p>
                </header>
            </div><hr>
            <div class="col-lg-12 contenu">
                <div class="row">
                    <div class="col-lg-12">
                        {!! Form::open(['route' => ['moniteur.destroy', $moniteur->id], 'method' => 'delete']) !!}
                        <button class="text-right"><span class="glyphicon glyphicon-trash" style="color:black; cursor: pointer" ></span></button>
                        {!!Form::close() !!}
                    </div>
                </div><hr>
                <div class="row">
                    {!! Form::model($moniteur ,['method'=>'PATCH','route'=>['moniteur.update',$moniteur->id]]) !!}
                    <div class="form-group {!! $errors->has('nom') ? 'has-error' : '' !!}">
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
    </div>



            @stop

            @section('header')

            @stop

            @section('footer')
                <script>
                    $(document).ready(function(){
                      $("select").addClass("selectpicker");
                    });
                </script>

            @stop