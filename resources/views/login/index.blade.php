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
    <link href="stylesheets/ladda-themeless.min.css" media="all" rel="stylesheet" type="text/css"/>
    <script src="http://code.jquery.com/jquery-1.10.2.min.js" type="text/javascript"></script>
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js" type="text/javascript"></script>
    <script src="javascripts/bootstrap.min.js" type="text/javascript"></script>
    <script src="javascripts/raphael.min.js" type="text/javascript"></script>
    <script src="javascripts/jquery.mousewheel.js" type="text/javascript"></script>
    <script src="javascripts/jquery.vmap.min.js" type="text/javascript"></script>
    <script src="javascripts/jquery.vmap.sampledata.js" type="text/javascript"></script>
    <script src="javascripts/jquery.vmap.world.js" type="text/javascript"></script>
    <script src="javascripts/jquery.bootstrap.wizard.js" type="text/javascript"></script>
    <script src="javascripts/fullcalendar.min.js" type="text/javascript"></script>
    <script src="javascripts/gcal.js" type="text/javascript"></script>
    <script src="javascripts/jquery.dataTables.js" type="text/javascript"></script>
    <script src="javascripts/datatable-editable.js" type="text/javascript"></script>
    <script src="javascripts/jquery.easy-pie-chart.js" type="text/javascript"></script>
    <script src="javascripts/excanvas.min.js" type="text/javascript"></script>
    <script src="javascripts/jquery.isotope.min.js" type="text/javascript"></script>
    <script src="javascripts/masonry.min.js" type="text/javascript"></script>
    <script src="javascripts/modernizr.custom.js" type="text/javascript"></script>
    <script src="javascripts/jquery.fancybox.pack.js" type="text/javascript"></script>
    <script src="javascripts/select2.js" type="text/javascript"></script>
    <script src="javascripts/styleswitcher.js" type="text/javascript"></script>
    <script src="javascripts/wysiwyg.js" type="text/javascript"></script>
    <script src="javascripts/jquery.inputmask.min.js" type="text/javascript"></script>
    <script src="javascripts/jquery.validate.js" type="text/javascript"></script>
    <script src="javascripts/bootstrap-fileupload.js" type="text/javascript"></script>
    <script src="javascripts/bootstrap-datepicker.js" type="text/javascript"></script>
    <script src="javascripts/bootstrap-timepicker.js" type="text/javascript"></script>
    <script src="javascripts/bootstrap-colorpicker.js" type="text/javascript"></script>
    <script src="javascripts/bootstrap-switch.min.js" type="text/javascript"></script>
    <script src="javascripts/daterange-picker.js" type="text/javascript"></script>
    <script src="javascripts/date.js" type="text/javascript"></script>
    <script src="javascripts/morris.min.js" type="text/javascript"></script>
    <script src="javascripts/skycons.js" type="text/javascript"></script>
    <script src="javascripts/jquery.sparkline.min.js" type="text/javascript"></script>
    <script src="javascripts/fitvids.js" type="text/javascript"></script>
    <script src="javascripts/main.js" type="text/javascript"></script>
    <script src="javascripts/respond.js" type="text/javascript"></script>
    <script src="javascripts/ladda.min.js" type="text/javascript"></script>
    <script src="javascripts/spin.min.js" type="text/javascript"></script>
    <script src="javascripts/dropzone.js" type="text/javascript"></script>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
</head>
<body class="login1">
<!-- Login Screen -->
<div class="login-wrapper">
    <div class="login-container">
        <img width="250" height="75" src="images/LogoUnisinu.png"/>

        <form action="{{route('log.store')}}" method="POST" autocomplete="off" id="form-agregar-paciente">
            {{csrf_field()}}
            {{method_field('POST')}}

            <div class="form-group">
                <input class="form-control" name="email" placeholder="Correo Electronico" type="text">
            </div>
            <div class="form-group">
                <input class="form-control" name="password" placeholder="Contraseña" type="password"><input type="submit" value="&#xf054;">
            </div>
            {{--<div class="form-options clearfix">--}}
                {{--<a class="pull-right" data-toggle="modal" href="#modal-registrar">Registrate</a>--}}

            {{--</div>--}}
        </form>
    </div>
</div>
<!-- End Login Screen -->
</body>
</html>