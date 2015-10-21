@extends('admin/index')
@section('title', 'Index|Client')
@section('body')
    <div class="card">
        <div class="card-header">
            <h2>New Examen</h2>
        </div>
        <div class="card-body card-padding">
            <div class="row">
                <div class="col-sm-6">
                    {!! Form::open(['url'=>'examen']) !!}
                    <div class="form-group {!! $errors->has('nom') ? 'has-error' : '' !!}">
                        <div class="input-field">
                            {!! Form::label('centre', 'centre:') !!}
                            {!! Form::text('centre') !!}
                            {!! $errors->first('centre', '<small class="help-block">:message</small>') !!}
                        </div>
                        <div class="input-field">
                            {!! Form::label('date examen', 'date examen:') !!}
                            {!! Form::input('date','date_examen')!!}
                            {!! $errors->first('date_examen', '<small class="help-block">:message</small>') !!}
                        </div>

                        <div class="input-field">
                            {!! Form::label('resultat', 'resultat:') !!}
                            {!! Form::text('resultat') !!}
                            {!! $errors->first('resultat', '<small class="help-block">:message</small>') !!}
                        </div>

                        <div class="input-field">
                            {!! Form::label('numero liste', 'numero liste:') !!}
                            {!! Form::text('numero_liste') !!}
                            {!! $errors->first('numero_liste', '<small class="help-block">:message</small>') !!}
                        </div>
                        <div class="form-group">
                            <select name="autoecoletable_id">
                                @foreach( $autoecole as $auto){
                                <option value="{{$auto->id}}">{{$auto->name}}</option>
                                }
                                @endforeach
                            </select>
                        </div>
                        <div class="">
                            {!! Form::submit('create', ['class'=>'btn primary']) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>

            </div>
            @stop

            @section('header')
                <link href="{{ asset('vendors/bower_components/bootstrap-select/dist/css/bootstrap-select.css') }}" rel="stylesheet">
                <link href="{{ asset('vendors/chosen_v1.4.2/chosen.min.css') }}" rel="stylesheet">
            @stop

            @section('footer')
                <script src="{{ asset('vendors/bower_components/bootstrap-select/dist/js/bootstrap-select.js') }}"></script>
                <script src="{{ asset('vendors/chosen_v1.4.2/chosen.jquery.min.js') }}"></script>
            @stop