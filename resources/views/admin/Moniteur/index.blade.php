@extends('admin.index')
@section('title')
    Moniteur - index
@stop
@section('body')
    <div class="form-groupp">
        <div class="row">
            <div class="col-lg-12" id="header">
                <header>
                    <p>Home | Moniteur | List </p>
                </header>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12" id="header">
                <header>
                    <p class="text-center"> </p>
                    <ul class="actions">
                        <a href="{{ route('moniteur.create') }}"><i class="md md-person-add"></i></a>
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
                            <th data-column-id="telephone">Telephone</th>
                            <th data-column-id="cin">CIN</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach( $moniteurs as $moniteur)
                            <tr>
                                <td>{{$moniteur->id}}</td>
                                <td>{{$moniteur->name}}</td>
                                <td>{{$moniteur->prenom}}</td>
                                <td>{{$moniteur->email}}</td>
                                <td>{{$moniteur->tel}}</td>
                                <td>{{$moniteur->cin}}</td>
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