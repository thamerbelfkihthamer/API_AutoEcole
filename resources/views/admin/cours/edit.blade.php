@extends('admin.index')
@section('title', 'Index|Client')
@section('body')
    <div class="card">
        <div class="card-header">
            <h2>Edit cour </h2>
            <div class="pull-right">
                <form class="del-form" action="{{ route('cours.destroy', $cour->id) }}">
                    <input type="hidden" name="_method" value="delete"/>
                    <button type="submit" class="btn btn-danger btn-sm waves-effect"><i class="fa fa-trash-o"></i></button>
                </form>
            </div>
        </div>

        <div class="card-body card-padding">
            <input type="hidden" name="_method" value="put"/>
            <div class="row">
                <div class="col-sm-6">
                    {!! Form::model($cour ,['method'=>'PATCH','route'=>['cours.update',$cour->id]]) !!}
                    <div class="form-group {!! $errors->has('nom') ? 'has-error' : '' !!}">
                        <div class="form-group">
                        <select name="autoecoletable_id">
                            @foreach( $autoecole as $auto){
                            <option value="{{$auto->id}}">{{$auto->name}}</option>
                            }
                            @endforeach
                        </select>
                            </div>
                        <div class="form-group">
                            {!! Form::select('type', ['CODE'=>'CODE', 'CONDUIT'=>'CONDUIT']) !!}
                            {!! $errors->first('type', '<small class="alert alert-danger">:message</small>') !!}
                        </div>

                        <div class="form-group sujet">
                            {!! Form::select('sujet', ['null'=>'','B'=>'B', 'C+F'=>'C+F','H'=>'H']) !!}
                            {!! $errors->first('sujet', '<small class="alert alert-danger">:message</small>') !!}
                        </div>
                        <div id="vehicule">
                            <select name="vehicules_id">
                                @foreach( $vehicules as $vehicule){
                                <option value="{{$vehicule->id}}">{{$vehicule->name}}</option>
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

            @stop

            @section('header')
                <link href="{{ asset('vendors/bower_components/bootstrap-select/dist/css/bootstrap-select.css') }}" rel="stylesheet">
                <link href="{{ asset('vendors/chosen_v1.4.2/chosen.min.css') }}" rel="stylesheet">
            @stop

            @section('footer')

                <script src="{{ asset('vendors/bower_components/bootstrap-select/dist/js/bootstrap-select.js') }}"></script>
                <script src="{{ asset('vendors/chosen_v1.4.2/chosen.jquery.min.js') }}"></script>
                <script>
                    $(document).ready(function(){
                        $(".sujet select:first-child").addClass('selectpicker');
                        $(".type select:first-child").addClass('selectpicker');
                        if($(".sujet select:first-child").value == "null"){
                            $(".sujet select:first-child").hide();
                        }
                        $(".type select:first-child").on('change',function(){
                            if(this.value == "CONDUIT"){

                                $(".sujet select:first-child").fadeIn(300);
                            }
                            else{
                                $(".sujet select:first-child").fadeOut(300);
                            }
                        });
                        $("select").addClass('selectpicker');

                    })
                </script>
            @stop