@extends('layouts.index')

@section('title')
    P2 | Pacientes
@endsection

@section('nagivation')
    <div class="navbar navbar-fixed-top scroll-hide">
        <div class="container-fluid top-bar">
            <div class="pull-right">
                <ul class="nav navbar-nav pull-right">
                    <li class="dropdown user "><a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <img width="34" height="34" src="http://1plusx.com/app/mu-plugins/all-in-one-seo-pack-pro/images/default-user-image.png"/><b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">
                                    <i class="fa fa-user"></i>My Account</a>
                            </li>
                            <li><a href="#">
                                    <i class="fa fa-gear"></i>Account Settings</a>
                            </li>
                            <li><a href="{{url('#')}}">
                                    <i class="fa fa-sign-out"></i>Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>

            <a class="logo" href="index.html">se7en</a>
        </div>
        <div class="container-fluid main-nav clearfix">
            <div class="nav-collapse">
                <ul class="nav">
                    <li>
                        <a class="current" href="{{url('/')}}">
                            <span aria-hidden="true" class="se7en-home"></span>Dashboard</a>
                    </li>


                </ul>
            </div>
        </div>
    </div>
@endsection

@section('container')
    <div class="page-title">
        <h1>
            Listado de Productos
        </h1>
    </div>


    <div class="row">
        <div class="col-lg-12">
            <div class="widget-container fluid-height clearfix">
                <div class="heading">
                    <button id="boton" class="btn btn-default">Hola </button>

                </div>

                <div class="widget-content padded clearfix">
                    <div id="svg-wrapper"></div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('script')


<script>

    $(document).ready(function () {
        $('#example').dataTable({
            "language": {
                url: "//cdn.datatables.net/plug-ins/1.10.10/i18n/Spanish.json"
            },
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            filter: true,
            sort: true,
            info: true,
            autoWidth: true,
            order: [
                [0, "desc"]
            ],
            aoColumnDefs: [{
                bSortable: false,
                "aTargets": [-1]
            }]
        });

    });


</script>


@endpush