<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title> @yield('title') </title>

        <script src="{!! asset("js/app.js") !!}"></script>
        <link rel="stylesheet" href="{!! asset("css/app.css") !!}">
        
        {{-- Bootstrap material design --}}
        <link rel="stylesheet" type="text/css" href="{!! asset('css/bootstrap-material-design.css') !!}">
        <link rel="stylesheet" type="text/css" href="{!! asset('css/ripples.min.css') !!}">

        <link rel="stylesheet" href="{!! asset("css/style.css") !!}">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    </head>



    <body>
    	@include('shared.navbar')    	

    	@yield('content')

        


        <script src="{!! asset('js/ripples.min.js') !!}"></script>
        <script src="{!! asset('js/material.min.js') !!}"></script>

        <script>
            $(document).ready(function() {
                // This command is used to initialize some elements and make them work properly
                $.material.init();
            });
        </script>

    </body>
</html>