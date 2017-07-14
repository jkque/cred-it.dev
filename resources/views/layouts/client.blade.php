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
    <link href="css/material.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" rel="stylesheet" />
    <!-- <link href="https://cdn.datatables.net/1.10.15/css/dataTables.material.min.css" rel="stylesheet" /> -->
    <link href="https://cdn.datatables.net/responsive/2.1.1/css/responsive.jqueryui.min.css" rel="stylesheet" />

    <link href="https://cdn.datatables.net/buttons/1.3.1/css/buttons.dataTables.min.css" rel="stylesheet" />
    <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <script src="https://use.fontawesome.com/6b90f0ef95.js"></script>
    @assets('css')
    @assets('cssblock')

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
    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.1.1/js/dataTables.responsive.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/dataTables.material.min.js"></script>

    <!-- Export Buttons -->
    <script src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>
    <script src="js/bin/materialize.js"></script>
    <!-- @assets('js') -->
    @assets('jsblock')
</body>
</html>
