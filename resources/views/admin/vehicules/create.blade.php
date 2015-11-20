@extends('admin.index')
@section('title', 'Home - Car - Create')

@section('body')
    <div class="form-groupp">
        <div class="row">
            <div class="col-lg-12" id="header">
                <header>
                    <p>Home | Cars | Create </p>
                </header>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12" id="header">
                <header>
                    <p class="text-center">New Car </p>
                </header>
            </div><br><hr>
            <div class="col-lg-12 contenu">
                <div class="row">
                    {!! Form::open(['url'=>'vehicules']) !!}
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
                                {!! Form::text('date_visite_technique','Visite technique')!!}
                                {!! $errors->first('date_visite_technique', '<small>:message</small>') !!}
                            </div>
                        </div>
                            </div>
                        <div class="col-lg-4 col-lg-offset-1">
                        <div class="row mar">
                            <div class="input-field date">
                                {!! Form::text('date_fin_assurence','Expiration assurence')!!}
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
            @stop
            @section('header')
            @stop

            @section('footer')
                <script>
                    $("select").addClass("selectpicker");
                    $(".date :first-child").addClass('datepicker');
                    $("select").addClass("selectpicker");
                    $('.datepicker').datepicker({
                        format: 'yyyy-mm-dd',
                        startDate: '-3555555d'
                    });
                </script>

            @stop
</div>