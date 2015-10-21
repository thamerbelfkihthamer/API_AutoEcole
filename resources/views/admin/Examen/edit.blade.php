@extends('admin.index')
@section('title', 'Index|Client')
@section('body')
    <div class="card">
        <div class="card-header">
            <h2>Edit school </h2>
            <div class="pull-right">
                <form class="del-form" action="{{ route('examen.destroy', $examen->id) }}">
                    <input type="hidden" name="_method" value="delete"/>
                    <button type="submit" class="btn btn-danger btn-sm waves-effect"><i class="fa fa-trash-o"></i></button>
                </form>
            </div>
        </div>

        <div class="card-body card-padding">
            <input type="hidden" name="_method" value="put"/>
            <div class="row">
                <div class="col-sm-6">
                    {!! Form::model($examen ,['method'=>'PATCH','route'=>['examen.update',$examen->id]]) !!}
                    <div class="form-group {!! $errors->has('nom') ? 'has-error' : '' !!}">
                        <div class="form-group">
                            {!! Form::label('date examen', 'date examen:') !!}
                            {!! Form::input('date','date_examen')!!}
                            {!! $errors->first('date_examen', '<small class="alert alert-danger">:message</small>') !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('resultat', 'resultat:') !!}
                            {!! Form::text('resultat') !!}
                            {!! $errors->first('resultat', '<small class="alert alert-danger">:message</small>') !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('numero liste', 'numero liste:') !!}
                            {!! Form::text('numero_liste') !!}
                            {!! $errors->first('numero_liste', '<small class="alert alert-danger">:message</small>') !!}
                        </div>


                        <div class="form-group">
                            {!! Form::label('centre', 'centre:') !!}
                            {!! Form::text('centre') !!}
                            {!! $errors->first('centre', '<small class="alert alert-danger">:message</small>') !!}
                        </div>
                        <div class="form-group">
                            <select name="autoecoletable_id">
                                @foreach( $autoecole as $auto){
                                <option value="{{$auto->id}}">{{$auto->name}}</option>
                                }
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            {!! Form::submit('Save', ['class'=>'btn primary']) !!}
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