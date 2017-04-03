<!DOCTYPE html>
<html>
<head>
    <title>
        @yield('title')
    </title>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">

    <link href="http://fonts.googleapis.com/css?family=Lato:100,300,400,700" media="all" rel="stylesheet"
          type="text/css"/>
    <link href="{{URL::asset('stylesheets/bootstrap.min.css')}}" media="all" rel="stylesheet" type="text/css"/>
    <link href="{{URL::asset('stylesheets/font-awesome.min.css')}}" media="all" rel="stylesheet" type="text/css"/>
    <link href="{{URL::asset('stylesheets/se7en-font.css')}}" media="all" rel="stylesheet" type="text/css"/>
    <link href="{{URL::asset('stylesheets/isotope.css')}}" media="all" rel="stylesheet" type="text/css"/>
    <link href="{{URL::asset('stylesheets/jquery.fancybox.css')}}" media="all" rel="stylesheet" type="text/css"/>
    <link href="{{URL::asset('stylesheets/fullcalendar.css')}}" media="all" rel="stylesheet" type="text/css"/>
    <link href="{{URL::asset('stylesheets/wizard.css')}}" media="all" rel="stylesheet" type="text/css"/>
    <link href="{{URL::asset('stylesheets/select2.css')}}" media="all" rel="stylesheet" type="text/css"/>
    <link href="{{URL::asset('stylesheets/select2-bootstrap.css')}}" media="all" rel="stylesheet" type="text/css"/>
    <link href="{{URL::asset('stylesheets/morris.css')}}" media="all" rel="stylesheet" type="text/css"/>
    <link href="{{URL::asset('stylesheets/datatables.css')}}" media="all" rel="stylesheet" type="text/css"/>
    <link href="{{URL::asset('stylesheets/datepicker.css')}}" media="all" rel="stylesheet" type="text/css"/>
    <link href="{{URL::asset('stylesheets/timepicker.css')}}" media="all" rel="stylesheet" type="text/css"/>
    <link href="{{URL::asset('stylesheets/colorpicker.css')}}" media="all" rel="stylesheet" type="text/css"/>
    <link href="{{URL::asset('stylesheets/bootstrap-switch.css')}}" media="all" rel="stylesheet" type="text/css"/>
    <link href="{{URL::asset('stylesheets/bootstrap-editable.css')}}" media="all" rel="stylesheet" type="text/css"/>
    <link href="{{URL::asset('stylesheets/daterange-picker.css')}}" media="all" rel="stylesheet" type="text/css"/>
    <link href="{{URL::asset('stylesheets/typeahead.css')}}" media="all" rel="stylesheet" type="text/css"/>
    <link href="{{URL::asset('stylesheets/summernote.css')}}" media="all" rel="stylesheet" type="text/css"/>
    <link href="{{URL::asset('stylesheets/ladda-themeless.min.css')}}" media="all" rel="stylesheet" type="text/css"/>
    <link href="{{URL::asset('stylesheets/social-buttons.css')}}" media="all" rel="stylesheet" type="text/css"/>
    <link href="{{URL::asset('stylesheets/pygments.css')}}" media="all" rel="stylesheet" type="text/css"/>
    <link href="{{URL::asset('stylesheets/style.css')}}" media="all" rel="stylesheet" type="text/css"/>
    <link href="{{URL::asset('stylesheets/color/green.css')}}" media="all" rel="alternate stylesheet"
          title="green-theme"
          type="text/css"/>
    <link href="{{URL::asset('stylesheets/color/orange.css')}}" media="all" rel="alternate stylesheet"
          title="orange-theme"
          type="text/css"/>
    <link href="{{URL::asset('stylesheets/color/magenta.css')}}" media="all" rel="alternate stylesheet"
          title="magenta-theme"
          type="text/css"/>
    <link href="{{URL::asset('stylesheets/color/gray.css')}}" media="all" rel="alternate stylesheet" title="gray-theme"
          type="text/css"/>
    <link href="{{URL::asset('stylesheets/jquery.fileupload-ui.css')}}" media="screen" rel="stylesheet"
          type="text/css"/>
    <link href="{{URL::asset('stylesheets/dropzone.css')}}" media="screen" rel="stylesheet" type="text/css"/>
    <link href="{{URL::asset('stylesheets/sweetalert2.min.css')}}" media="screen" rel="stylesheet" type="text/css"/>

    <!-- Include Required Prerequisites -->

    <!-- Include Date Range Picker -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css"/>



    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
    <style>
        #svg-wrapper {
            width: 500px;
            height: 160px;
            margin: 2em auto;
        }

        svg path {
            fill: none;
            stroke: #000;
            stroke-width: 1.5px;
        }

        svg .axis {
            font-size: 12px;
        }

        svg .axis path {
            display: none;
        }
    </style>
</head>
<body class="page-header-fixed bg-1">
<div id="app">
    <div class="modal-shiftfix">
        <!-- Navigation -->
    @yield('nagivation')

    <!-- End Navigation -->
        <div class="container-fluid main-content">

            @yield('container')


        </div>
    </div>
</div>

<script src="https://d3js.org/d3.v3.min.js"></script>
<script src="{{ asset('js/app.js') }}"></script>
{{--<script src="http://code.jquery.com/jquery-1.10.2.min.js" type="text/javascript"></script>--}}
{{--<script src="{{asset('javascripts/jquery-3.1.1.js')}}" type="text/javascript"></script>--}}
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js" type="text/javascript"></script>
<script src="{{asset('javascripts/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('javascripts/raphael.min.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('javascripts/selectivizr-min.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('javascripts/jquery.mousewheel.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('javascripts/jquery.vmap.min.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('javascripts/jquery.vmap.sampledata.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('javascripts/jquery.vmap.world.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('javascripts/jquery.bootstrap.wizard.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('javascripts/fullcalendar.min.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('javascripts/gcal.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('javascripts/jquery.dataTables.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('javascripts/datatable-editable.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('javascripts/jquery.easy-pie-chart.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('javascripts/excanvas.min.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('javascripts/jquery.isotope.min.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('javascripts/isotope_extras.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('javascripts/modernizr.custom.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('javascripts/jquery.fancybox.pack.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('javascripts/select2.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('javascripts/styleswitcher.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('javascripts/wysiwyg.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('javascripts/summernote.min.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('javascripts/jquery.inputmask.min.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('javascripts/jquery.validate.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('javascripts/bootstrap-fileupload.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('javascripts/bootstrap-datepicker.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('javascripts/bootstrap-timepicker.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('javascripts/bootstrap-colorpicker.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('javascripts/bootstrap-switch.min.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('javascripts/spin.min.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('javascripts/ladda.min.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('javascripts/moment.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('javascripts/mockjax.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('javascripts/bootstrap-editable.min.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('javascripts/xeditable-demo-mock.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('javascripts/xeditable-demo.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('javascripts/address.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('javascripts/daterange-picker.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('javascripts/date.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('javascripts/morris.min.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('javascripts/skycons.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('javascripts/fitvids.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('javascripts/jquery.sparkline.min.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('javascripts/dropzone.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('javascripts/main.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('javascripts/respond.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('javascripts/jquery.autocomplete.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('javascripts/sweetalert2.min.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('javascripts/sum().js')}}" type="text/javascript"></script>

<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>



@stack('script')

</body>
</html>