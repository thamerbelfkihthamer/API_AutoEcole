@extends('admin.index')
@section('title', 'Index|Cars')

@section('body')
    <div class="form-groupp">
        <div class="row">
            <div class="col-lg-12" id="header">
                <header>
                    <p>Cars | Edit </p>
                </header>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12" id="header">
                <header>
                    <p class="text-center">Edit Car </p>
                </header>
            </div><br><hr>
            <div class="col-lg-12 contenu">
                <div class="row">
                    <div class="col-lg-12">
                        {!! Form::open(['route' => ['vehicules.destroy', $vehicule->id], 'method' => 'delete']) !!}
                        <button class="text-right"><span class="glyphicon glyphicon-trash" style="color:black; cursor: pointer" ></span></button>
                        {!!Form::close() !!}
                    </div>
                </div><hr>
                <div class="row">
                    {!! Form::model($vehicule ,['method'=>'PATCH','route'=>['vehicules.update',$vehicule->id]]) !!}
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
                                {!! Form::label('matricule') !!}
                                {!! Form::text('matricule') !!}
                                {!! $errors->first('matricule', '<small>:message</small>') !!}
                            </div>
                        </div>
                        <div class="row mar">
                            <div class="input-field date">
                                {!! Form::text('date_visite_technique')!!}
                                {!! $errors->first('date_visite_technique', '<small>:message</small>') !!}
                            </div>
                        </div>
                            </div>
                        <div class="col-lg-4 col-lg-offset-1">
                        <div class="row mar">
                            <div class="input-field date">
                                {!! Form::text('date_fin_assurence')!!}
                                {!! $errors->first('date_fin_assurence', '<small>:message</small>') !!}
                            </div>
                        </div>
                        <div class="row mar">
                            <div class="input-field">
                                {!! Form::label('vidange') !!}
                                {!! Form::text('vidange') !!}
                                {!! $errors->first('vidange', '<small>:message</small>') !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::submit('Edit', ['class'=>'btn primary']) !!}
                        </div>
                        {!! Form::close() !!}
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
                        $(".date :first-child").addClass('datepicker');
                        $("select").addClass("selectpicker");
                        $('.datepicker').datepicker({
                            format: 'yyyy-mm-dd',
                            startDate: '-3555555d'
                        });
                    });

                </script>
            @stop
</div>