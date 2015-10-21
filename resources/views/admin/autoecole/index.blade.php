@extends('admin.index')
@section('title')
    School - index
@stop
@section('body')
    <div class="form-groupp">
        <div class="row">
            <div class="col-lg-12" id="header">
                <header>
                    <p>Home | School | List </p>
                </header>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12" id="header">
                <header>
                    <p class="text-center"> </p>
                    <ul class="actions">
                        <a href="{{ route('autoecole.create') }}"><i class="md md-person-add"></i></a>
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
                            <th data-column-id="adress">Adress</th>
                            <th data-column-id="telephone">Telephone</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($autoecoles as $autoecole)
                            <tr>
                                <td>{{$autoecole->id}}</td>
                                <td>{{$autoecole->name}}</td>
                                <td>{{$autoecole->adress}}</td>
                                <td>{{$autoecole->tel}}</td>
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