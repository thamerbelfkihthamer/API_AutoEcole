@extends('admin.index')
@section('title', 'Index|Client')

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
            </div><hr>
            <div class="col-lg-12 contenu">
                <div class="col-lg-10 col-lg-offset-1"><hr>
                    {!! Form::model($vehicule ,['method'=>'PATCH','route'=>['vehicules.update',$vehicule->id]]) !!}
                    <div class="form-group {!! $errors->has('nom') ? 'has-error' : '' !!}">
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
                                {!! Form::text('date_visite_technique','YYYY-MM-DD')!!}
                                {!! $errors->first('date_visite_technique', '<small>:message</small>') !!}
                            </div>
                        </div>
                        <div class="row mar">
                            <div class="input-field date">
                                {!! Form::text('date_fin_assurence','YYYY-MM-DD')!!}
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
                            <select name="autoecoletable_id">
                                @foreach( $autoecole as $auto){
                                <option value="{{$auto->id}}">{{$auto->name}}</option>
                                }
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            {!! Form::submit('Edit', ['class'=>'btn primary']) !!}
                        </div>
                        {!! Form::close() !!}
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
                        $('.datepicker').pickadate({
                            selectMonths: true, // Creates a dropdown to control month
                            selectYears: 15, // Creates a dropdown of 15 years to control year
                            format: 'yyyy-mm-dd'
                        });
                    });

                </script>
            @stop
</div>