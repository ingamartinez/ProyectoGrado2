<!DOCTYPE html>
<html>
<head>
    <title>
        se7en - Dashboard
    </title>
    <link href="http://fonts.googleapis.com/css?family=Lato:100,300,400,700" media="all" rel="stylesheet"
          type="text/css"/>
    <link href="stylesheets/bootstrap.min.css" media="all" rel="stylesheet" type="text/css"/>
    <link href="stylesheets/font-awesome.min.css" media="all" rel="stylesheet" type="text/css"/>
    <link href="stylesheets/se7en-font.css" media="all" rel="stylesheet" type="text/css"/>
    <link href="stylesheets/style.css" media="all" rel="stylesheet" type="text/css"/>
    <script src="http://code.jquery.com/jquery-1.10.2.min.js" type="text/javascript"></script>
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js" type="text/javascript"></script>
    <script src="javascripts/bootstrap.min.js" type="text/javascript"></script>
    <script src="javascripts/modernizr.custom.js" type="text/javascript"></script>
    <script src="javascripts/main.js" type="text/javascript"></script>
    <script src="javascripts/application.js" type="text/javascript"></script>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
</head>
<body class="fourofour bg-danger">
<!-- Login Screen -->
<div class="fourofour-container">
    <h1>
        <i class="fa fa-unlink"></i>
    </h1>
    <h2>
        Error 500!
        <br>
        Al parecer algo salió mal!
    </h2>

    <a class="btn btn-lg btn-default-outline" href="{{url('/')}}"><i class="fa fa-home"></i>Ir a la pagina principal</a>

    {{dd($e)}}

</div>

<!-- End Login Screen -->
</body>
</html>