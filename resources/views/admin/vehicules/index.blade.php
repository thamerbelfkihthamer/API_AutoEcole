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
                    <ul class="actions col-lg-offset-11">
                        <a href="{{ route('vehicules.create') }}"><i class="fa fa-plus" style="color:#FFF;"></i></a>
                    </ul>
                </header>
            </div><hr>
            <div class="col-lg-12 contenu">
                <div class="table-responsive">
                    <table id="data-table-basic" class="table table-striped">
                        <thead>
                        <tr>
                            <th data-column-id="id">#</th>
                            <th data-column-id="name">Marque</th>
                            <th data-column-id="matricule">Immatriculation</th>
                            <th data-column-id="date_visite_technique">Visite technique</th>
                            <th data-column-id="date_fin_assurence">Expiration assurence</th>
                            <th data-column-id="vidanfe">Vidange</th>
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
            }).on("click.rs.jquery.bootgrid", function (e, columns, row)
            {
                return window.location = "<?= route('vehicules.index') ?>/" + row.id + "/edit";
            });
        });
    </script>
@stop

