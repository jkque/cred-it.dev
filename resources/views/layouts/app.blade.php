<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <!--meta http-equiv="X-UA-Compatible" content="IE=edge"-->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} | @title()</title>

    <!-- Styles -->
    
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    @assets('css')
    @assets('cssblock')

    <script src="https://use.fontawesome.com/6b90f0ef95.js"></script>

    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body class="@body_class()">
    @if(!$document->isEmptyGroupBlock('app-header'))
        @dynamicblock('app-header')
    @endif

    @yield('content')

    <!-- Scripts -->
    <!--script src="{{ asset('js/app.js') }}"></script-->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="js/bin/materialize.js"></script>
    @assets('js')
    @assets('jsblock')
</body>
</html>
