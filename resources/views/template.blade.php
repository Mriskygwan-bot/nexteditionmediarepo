<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Next Edition Media</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link rel="stylesheet" type="text/css" href="/css/fontawesome.min.css">


</head>
<body>

<div class="row">
    <div id="app">

        @yield('content')

    </div>
</div>


<div class="black white-text center-align text-bold-6 text-size-1" style="position:fixed; left:0px; bottom:0px; width:100%; height:30px;">
    <div class="divider">
    </div>
    &copy; 2020 PCG Software
</div>

<!--  Scripts-->
<script src="js/app.js"></script>
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="js/materialize.js"></script>
<script src="js/init.js"></script>

</body>
</html>
