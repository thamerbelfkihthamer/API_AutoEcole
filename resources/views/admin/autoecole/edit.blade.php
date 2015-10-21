@extends('admin.index')
@section('title', 'Index|Client')
@section('body')
    <div class="card">
        <div class="card-header">
            <h2>Edit school </h2>
            <div class="pull-right">
                <form class="del-form" action="{{ route('autoecole.destroy', $autoecole->id) }}">
                    <input type="hidden" name="_method" value="delete"/>
                    <button type="submit" class="btn btn-danger btn-sm waves-effect"><i class="fa fa-trash-o"></i></button>
                </form>
            </div>
        </div>

        <div class="card-body card-padding">
                <input type="hidden" name="_method" value="put"/>
                <div class="row">
                    <div class="col-sm-6">
                        {!! Form::model($autoecole ,['method'=>'PATCH','route'=>['autoecole.update',$autoecole->id]]) !!}
                        <div class="form-group {!! $errors->has('nom') ? 'has-error' : '' !!}">
                            <div class="form-group {!! $errors->has('nom') ? 'has-error' : '' !!}">
                                <div class="form-group">
                                    {!! Form::label('name') !!}
                                    {!! Form::text('name') !!}
                                    {!! $errors->first('name', '<small class="alert alert-danger">:message</small>') !!}
                                </div>

                                <div class="form-group">
                                    {!! Form::label('adress') !!}
                                    {!! Form::text('adress') !!}
                                    {!! $errors->first('adress', '<small class="alert alert-danger">:message</small>') !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('telephone') !!}
                                    {!! Form::text('tel') !!}
                                    {!! $errors->first('tel', '<small class="alert alert-danger">:message</small>') !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::submit('Save', ['class'=>'btn primary']) !!}
                                </div>
                                {!! Form::close() !!}
                    </div>
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