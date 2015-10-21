@extends('admin.index')
@section('title')
    Cars - index
@stop
@section('body')
    <div class="form-groupp">
        <div class="row">
            <div class="col-lg-12" id="header">
                <header>
                    <p>Home | Cars | List </p>
                </header>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12" id="header">
                <header>
                    <p class="text-center"> </p>
                    <ul class="actions">
                        <a href="{{ route('vehicules.create') }}"><i class="md md-person-add"></i></a>
                    </ul>
                </header>
            </div><hr>
            <div class="col-lg-12 contenu">
                <div class="table-responsive">
                    <table id="data-table-basic" class="table table-striped">
                        <thead>
                        <tr>
                            <th data-column-id="id">#</th>
                            <th data-column-id="name">Name</th>
                            <th data-column-id="matricule">Matricule</th>
                            <th data-column-id="date_visite_technique">date visite technique</th>
                            <th data-column-id="date_fin_assurence">date fin assurence</th>
                            <th data-column-id="vidanfe">vidange</th>
                            <th data-column-id="autoecole">AutoEcole</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach( $vehicules as $vehicule)
                            <tr>
                                <td>{{$vehicule->id}}</td>
                                <td>{{$vehicule->name}}</td>
                                <td>{{$vehicule->matricule}}</td>
                                <td>{{$vehicule->date_visite_technique}}</td>
                                <td>{{$vehicule->date_fin_assurence}}</td>
                                <td>{{$vehicule->vidange}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
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
        $(function() {

            $("#data-table-basic").bootgrid({
                css: {
                    icon: 'md icon',
                    iconColumns: 'md-view-module',
                    iconDown: 'md-expand-more',
                    iconRefresh: 'md-refresh',
                    iconUp: 'md-expand-less'
                }
            });
        });
    </script>
@stop

