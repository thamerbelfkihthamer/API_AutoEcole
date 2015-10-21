@extends('admin.index')
@section('title', 'Index|Client')
@section('body')

    <div class="card">
        <div class="card-header">
            <h2>New Driving school</h2>
        </div>
        <div class="card-body card-padding">
            <div class="row">
                <div class="col-sm-6">
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
                            {!! Form::submit('Save', ['class'=>'btn btn-primary waves-effect']) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>

        </div>


        @stop

        @section('header')

            <link href="{{ asset('vendors/chosen_v1.4.2/chosen.min.css') }}" rel="stylesheet">
        @stop

        @section('footer')

            <script src="{{ asset('vendors/chosen_v1.4.2/chosen.jquery.min.js') }}"></script>
            <script src="{{ asset('vendors/input-mask/input-mask.min.js') }}"></script>
            <script src="{{ asset('vendors/fileinput/fileinput.min.js') }}"></script>
@stop