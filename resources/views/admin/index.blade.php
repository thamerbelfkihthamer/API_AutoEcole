<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link href='https://fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href='https://fonts.googleapis.com/css?family=Titillium+Web' rel='stylesheet' type='text/css'>
    <link href="{{ asset('bower_components/jquery.bootgrid/dist/jquery.bootgrid.min.css') }}" rel="stylesheet">
    <link href="{{asset('bower_components/sweetalert2/dist/sweetalert2.css')}}" rel="stylesheet">
     
    <link href="{{asset('bower_components/fullcalendar/dist/fullcalendar.css')}}" rel="stylesheet"/>
    <link href="{{asset('bower_components/bootstrap/dist/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('bower_components/select2/dist/css/select2.css')}}" rel="stylesheet">
    <link href="{{asset('bower_components/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker3.css" rel="stylesheet">
    <link href="{{asset('app/css/index.css')}}" rel="stylesheet">
    @yield('header')
</head>
<body>
@include('partials.header')
<div id="main">
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="col-lg-12">
                @include('partials.sidebar')
                 <div class="content">
                    <div class="row">
                        <div class="col-lg-10 col-lg-offset-2">
                            <h2 class="text-center">DashBoard</h2>
                            @include('partials.notification')
                            @yield('body')
                        </div>
                    </div>
                 </div>
            </div>
        </div>
    </div>
 </div>
@include('partials.footer');
<script src="{{asset('bower_components/jquery/dist/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('bower_components/jquery.nicescroll/dist/jquery.nicescroll.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('bower_components/jquery.bootgrid/dist/jquery.bootgrid.min.js') }}" type="text/javascript"></script>
<script src="{{asset('bower_components/moment/min/moment.min.js')}}" type="text/javascript"></script>
<script src="{{asset('bower_components/fullcalendar/dist/fullcalendar.js')}}" type="text/javascript"></script>
<script src="{{ asset('bower_components/Materialize/dist/js/materialize.js') }}" type="text/javascript"></script>
<script src="{{asset('bower_components/sweetalert2/dist/sweetalert2.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('bower_components/select2/dist/js/select2.js') }}" type="text/javascript"></script>
<script src="{{ asset('bower_components/jspdf/dist/jspdf.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('bower_components/jspdf-autotable/dist/jspdf.plugin.autotable.js') }}" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js" type="text/javascript"></script>
<script src="{{asset('app/js/app.js')}}" type="text/javascript"></script>
@yield('footer')
</body>



