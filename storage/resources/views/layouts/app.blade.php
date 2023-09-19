<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Styles -->


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css"
          integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/Mycss.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/MyCustomCSS.css')}}" rel="stylesheet" type="text/css">
    <!-- Scripts -->


    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),]) !!};
    </script>

</head>
<body>
<div id="app">
    @include('partials._nav')

    @yield('content')
</div>
@include('partials._footer')



<!-- Scripts -->
<!-- footer used for React, empty file -->

@include('partials._javascript')
</body>
</html>