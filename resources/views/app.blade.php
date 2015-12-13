<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>AutoEcole</title>
        <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
        <link href="{{ asset('bower_components/Materialize/dist/css/materialize.min.css') }}" rel="stylesheet">
        <link href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('app/css/app.css') }}" rel="stylesheet">
    </head>
    <body>
    <div id="client">
        <div class="container">
            @yield('content')
        </div>
    </div>
        <script src="{{ asset('bower_components/Materialize/dist/js/materialize.min.js') }}"></script>
        <script src="{{ asset('app/js/app.js') }}"></script>
    </body>
</html>
