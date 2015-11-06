@extends('admin.index')
        @section('title')
            Driving school - Create
        @stop
        @section('body')
            <div class="form-groupp">
                <div class="row">
                    <div class="col-lg-12" id="header">
                        <header>
                            <p>Home | Driving school | Create </p>
                        </header>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12" id="header">
                        <header>
                            <p class="text-center">New Driving school </p>
                        </header>
                    </div><hr>
                    <div class="col-lg-12 contenu">
                        <div class="col-lg-10 col-lg-offset-1"><hr>
                            {!! Form::open(['url'=>'autoecole']) !!}
                            <div class="form-group {!! $errors->has('nom') ? 'has-error' : '' !!}">
                                <div class="input-field">
                                    {!! Form::label('name') !!}
                                    {!! Form::text('name') !!}
                                    {!! $errors->first('name', '<small class="help-block">:message</small>') !!}
                                </div>

                                <div class="input-field">
                                    {!! Form::label('adress') !!}
                                    {!! Form::text('adress') !!}
                                    {!! $errors->first('adress', '<small class="help-block">:message</small>') !!}
                                </div>
                                <div class="input-field">
                                    {!! Form::label('telephone') !!}
                                    {!! Form::text('tel') !!}
                                    {!! $errors->first('tel', '<small class="help-block">:message</small>') !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::submit('Save', ['class'=>'btn primary']) !!}
                                </div>
                                {!! Form::close() !!}
                            </div>
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


