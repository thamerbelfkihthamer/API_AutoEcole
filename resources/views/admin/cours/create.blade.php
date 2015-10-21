@extends('admin.index')
@section('title', 'Index|Client')
@section('body')
    <div class="card">
        <div class="card-header">
            <h2>New Cour</h2>
        </div>
        <div class="card-body card-padding">
            <div class="row">
                <div class="col-sm-6">
                    {!! Form::open(['url'=>'cours']) !!}
                    <div class="form-group {!! $errors->has('nom') ? 'has-error' : '' !!}">
                        <select name="autoecoletable_id">
                            @foreach( $autoecole as $auto){
                            <option value="{{$auto->id}}">{{$auto->name}}</option>
                            }
                            @endforeach
                        </select>
                        <div class="input-field type">
                            {!! Form::select('type', ['CODE'=>'CODE', 'CONDUIT'=>'CONDUIT']) !!}
                            {!! $errors->first('type', '<small class="help-block">:message</small>') !!}
                        </div>

                        <div  id="sujet">
                            {!! Form::select('sujet', ['null'=>'','B'=>'B', 'C+F'=>'C+F','H'=>'H']) !!}
                            {!! $errors->first('sujet', '<small class="help-block">:message</small>') !!}
                        </div><br>
                        <div id="vehicule">
                            <select name="vehicules_id">
                                @foreach( $vehicules as $vehicule){
                                <option value="{{$vehicule->id}}">{{$vehicule->name}}</option>
                                }
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            {!! Form::submit('create', ['class'=>'btn primary']) !!}
                        </div><br>
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
                <script>
                    $(document).ready(function(){
                        $("select").addClass('selectpicker');

                        $("#sujet").css({
                            display: 'none'
                        });
                        $("#vehicule").css({
                            display: 'none'
                        });

                        $(".type select:first-child").on('change',function(){
                            if(this.value == "CONDUIT"){
                                $("#sujet").fadeIn(300);
                                $("#vehicule").fadeIn(2000);
                            }
                            else{
                                $("#sujet").fadeOut(300);
                                $("#vehicule").fadeOut(1000);
                            }
                        });


                    })
                </script>
            <script src="{{ asset('vendors/bower_components/bootstrap-select/dist/js/bootstrap-select.js') }}"></script>
            <script src="{{ asset('vendors/chosen_v1.4.2/chosen.jquery.min.js') }}"></script>
        @stop