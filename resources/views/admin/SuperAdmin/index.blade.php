@extends('admin.index')
@section('title')
    DashBoard - Super Admin
@stop
@section('body')
    <div class="form-groupp">
        <div class="row">
            <div class="col-lg-12" id="header">
                <header>
                    <p>Super Admin</p>
                </header>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12" id="header">
                <header>
                    <ul class="actions col-lg-offset-11">
                        <a href="{{ route('superadmin.create') }}"><i class="fa fa-plus" style="color:#FFF;"></i></a>

                    </ul>
                </header>
            </div><hr>
        </div>
        <div class="row">
            <div class="col-lg-12 contenu">
                <div class="table-responsive">
                    <table id="data-table-basic" class="table table-striped">
                        <thead>
                        <tr>
                            <th data-column-id="id">#</th>
                            <th data-column-id="firstname">First Name</th>
                            <th data-column-id="email">Email</th>
                            <th data-column-id="telephone">Role</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach( $owner as $u)
                            <tr>
                                <td>{{$u->id}}</td>
                                <td>{{$u->name}}</td>
                                <td>{{$u->email}}</td>
                                <td>owner</td>
                            </tr>
                        @endforeach
                        @foreach( $manager as $m)
                            <tr>
                                <td>{{$m->id}}</td>
                                <td>{{$m->name}}</td>
                                <td>{{$m->email}}</td>
                                <td>manager</td>
                            </tr>
                        @endforeach
                        @foreach( $employe as $e)
                            <tr>
                                <td>{{$e->id}}</td>
                                <td>{{$e->name}}</td>
                                <td>{{$e->email}}</td>
                                <td>employe</td>
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
                return window.location = "<?= route('superadmin.index') ?>/" + row.id + "/edit";
            });
        });
    </script>
@stop