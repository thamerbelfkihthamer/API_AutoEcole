@extends('admin.index')
@section('title')
    Client - index
@stop
@section('body')
    <div class="form-groupp">
        <div class="row">
            <div class="col-lg-12" id="header">
                <header>
                    <p>Home | Condidat | List </p>
                </header>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12" id="header">
                <header>
                    <p class="text-center"> </p>
                    <ul class="actions">
                        <a href="{{ route('client.create') }}"><i class="md md-person-add"></i></a>
                    </ul>
                </header>
            </div><hr>
            <div class="col-lg-12 contenu">
                <div class="table-responsive" id="clientid">
                    <table id="data-table-basic" class="table table-striped">
                        <thead>
                        <tr>
                            <th data-column-id="id">#</th>
                            <th data-column-id="firstname">First Name</th>
                            <th data-column-id="lastname">Last Name</th>
                            <th data-column-id="email">Email</th>
                            <th data-column-id="datenaissance">Date naissance</th>
                            <th data-column-id="telephone">Telephone</th>
                            <th data-column-id="adress">Adress</th>
                            <th data-column-id="piecetype">Type piece</th>
                            <th data-column-id="numpiece">Numero piece</th>
                            <th data-column-id="delete"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach( $clients as $client)
                            <tr>
                                <td>{{$client->id}}</td>
                                <td>{{$client->name}}</td>
                                <td>{{$client->prenom}}</td>
                                <td>{{$client->email}}</td>
                                <td>{{$client->date_naisssance}}</td>
                                <td>{{$client->tel}}</td>
                                <td>{{$client->adresss}}</td>
                                <td>{{$client->type_piece}}</td>
                                <td>{{$client->num_piece}}</td>
                                <td>delete</td>
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