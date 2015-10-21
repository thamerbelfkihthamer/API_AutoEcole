<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link href='https://fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Titillium+Web' rel='stylesheet' type='text/css'>
    <link href="{{ asset('bower_components/bootgrid/jquery.bootgrid.min.css') }}" rel="stylesheet">
    <link href="{{asset('bower_components/sweetalert2/dist/sweetalert2.css')}}" rel="stylesheet">
    <link href="{{asset('bower_components/Materialize/dist/css/materialize.css')}}" rel="stylesheet">
    <link href="{{asset('bower_components/fullcalendar/dist/fullcalendar.css')}}" rel="stylesheet"/>
    <link href="{{asset('bower_components/bootstrap/dist/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('bower_components/select2/dist/css/select2.css')}}" rel="stylesheet">
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
                            @yield('body')
                        </div>
                    </div>
                 </div>
            </div>
        </div>
    </div>
    @include('partials.footer');
</div>
<script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('bower_components/jquery_nicescroll/jquery.nicescroll.min.js') }}"></script>
<script src="{{ asset('bower_components/bootgrid/jquery.bootgrid.min.js') }}"></script>
<script src="{{asset('bower_components/moment/min/moment.min.js')}}"></script>
<script src="{{asset('bower_components/fullcalendar/dist/fullcalendar.js')}}"></script>
<script src="{{ asset('bower_components/Materialize/dist/js/materialize.js') }}"></script>
<script src="{{asset('bower_components/sweetalert2/dist/sweetalert2.min.js')}}"></script>
<script src="{{ asset('bower_components/select2/dist/js/select2.js') }}"></script>
<script src="{{asset('app/js/app.js')}}"></script>
@yield('footer')


</body>



