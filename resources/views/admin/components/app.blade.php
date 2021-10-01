<!DOCTYPE html>
<html lang="en" class="light">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta content="Preview page of Metronic Admin Theme #4 for statistics, charts, recent events and reports"
          name="description"/>
    <meta content="" name="author"/>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/fontawesome.css">
    <link href="{{ asset('assets/global/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/global/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/pages/css/profile.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/global/css/components.min.css') }}" rel="stylesheet" id="style_components" type="text/css"/>
    <link href="{{ asset('assets/layouts/layout4/css/layout.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/layouts/layout4/css/themes/default.min.css') }}" rel="stylesheet" type="text/css" id="style_color"/>
    <title>{{ $title  }}</title>
    {{ $styles ?? '' }}
    <style>
        .logo-default {
            margin: 20px 40px 0 !important;
        }
    </style>
</head>

<body class="page-container-bg-solid page-header-fixed page-sidebar-closed-hide-logo">
<div class="page-header navbar navbar-fixed-top bg-white">
    <div class="page-header-inner ">
        <div class="page-logo">
            <a href="{{ route('admin.dashboard') }}">
                <img src="{{ asset('assets/pages/img/logos/logo-111x33.png') }}" alt="logo" class="logo-default"/>
            </a>
            <div class="menu-toggler sidebar-toggler"></div>
        </div>
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse"
           data-target=".navbar-collapse"> </a>
        <div class="page-top">
{{--            <form class="search-form open bg-white">--}}
{{--                <div class="input-group">--}}
{{--                    <input type="text" class="form-control input-sm" placeholder="Search..." name="query">--}}
{{--                    <span class="input-group-btn">--}}
{{--                        <a href="javascript:;" class="btn submit"><i class="icon-magnifier"></i></a>--}}
{{--                    </span>--}}
{{--                </div>--}}
{{--            </form>--}}
            <div class="top-menu">
                <ul class="nav navbar-nav pull-right">
                    <li class="separator hide"></li>
                    <li class="dropdown dropdown-user dropdown-dark">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                           data-close-others="true">
                            <span class="username username-hide-on-mobile"> {{ auth()->user()->name  }} </span>
                            <img alt="" class="img-circle" width="41" height="41"
                                 src="{{ env('APP_URL') . '/storage/' . settings()->get('company_logo') }}"> </a>
                        <ul class="dropdown-menu dropdown-menu-default">
                            <li>
                                <a href="javascript:void(0)">
                                    <i class="icon-user"></i> {{ auth()->user()->name  }} </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    {{ csrf_field() }}
                                    <input type="text" name="guard" value="admin">
                                </form>
                                <a href="javascript:;" onclick="document.getElementById('logout-form').submit()">
                                    <i class="icon-key"></i>Logout
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>
<div class="page-container">
    <x-dashboard-sidebar></x-dashboard-sidebar>
    {{ $slot }}
</div>
<div class="page-footer">
    <div class="scroll-to-top">
        <i class="icon-arrow-up"></i>
    </div>
</div>
<script src="{{ asset('assets/global/plugins/jquery.min.js') }}"></script>
<script src="{{ asset('assets/global/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
{{--<script src="{{ asset('assets/global/plugins/js.cookie.min.js') }}" type="text/javascript"></script>--}}
{{--<script src="{{ asset('assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}"--}}
{{--        type="text/javascript"></script>--}}
{{--<script src="{{ asset('assets/global/plugins/jquery.blockui.min.js') }}" type="text/javascript"></script>--}}
<script src="{{ asset('assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"
        type="text/javascript"></script>
{{--<script src="{{ asset('assets/global/plugins/moment.min.js') }}" type="text/javascript"></script>--}}
{{--<script src="{{ asset('assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js') }}"--}}
{{--        type="text/javascript"></script>--}}
{{--<script src="{{ asset('assets/global/plugins/morris/morris.min.js') }}" type="text/javascript"></script>--}}
{{--<script src="{{ asset('assets/global/plugins/morris/raphael-min.js') }}" type="text/javascript"></script>--}}
<script src="{{ asset('assets/global/plugins/counterup/jquery.waypoints.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/counterup/jquery.counterup.min.js') }}" type="text/javascript"></script>
{{--<script src="{{ asset('assets/global/plugins/amcharts/amcharts/amcharts.js') }}" type="text/javascript"></script>--}}
{{--<script src="{{ asset('assets/global/plugins/amcharts/amcharts/serial.js') }}" type="text/javascript"></script>--}}
{{--<script src="{{ asset('assets/global/plugins/amcharts/amcharts/pie.js') }}" type="text/javascript"></script>--}}
{{--<script src="{{ asset('assets/global/plugins/amcharts/amcharts/radar.js') }}" type="text/javascript"></script>--}}
{{--<script src="{{ asset('assets/global/plugins/amcharts/amcharts/themes/light.js') }}" type="text/javascript"></script>--}}
{{--<script src="{{ asset('assets/global/plugins/amcharts/amcharts/themes/patterns.js') }}" type="text/javascript"></script>--}}
{{--<script src="{{ asset('assets/global/plugins/amcharts/amcharts/themes/chalk.js') }}" type="text/javascript"></script>--}}
{{--<script src="{{ asset('assets/global/plugins/amcharts/ammap/ammap.js') }}" type="text/javascript"></script>--}}
{{--<script src="{{ asset('assets/global/plugins/amcharts/ammap/maps/js/worldLow.js') }}" type="text/javascript"></script>--}}
{{--<script src="{{ asset('assets/global/plugins/amcharts/amstockcharts/amstock.js') }}" type="text/javascript"></script>--}}
{{--<script src="{{ asset('assets/global/plugins/fullcalendar/fullcalendar.min.js') }}" type="text/javascript"></script>--}}
{{--<script src="{{ asset('assets/global/plugins/horizontal-timeline/horizontal-timeline.js') }}"--}}
{{--        type="text/javascript"></script>--}}
{{--<script src="{{ asset('assets/global/plugins/flot/jquery.flot.min.js') }}" type="text/javascript"></script>--}}
{{--<script src="{{ asset('assets/global/plugins/flot/jquery.flot.resize.min.js') }}" type="text/javascript"></script>--}}
{{--<script src="{{ asset('assets/global/plugins/flot/jquery.flot.categories.min.js') }}" type="text/javascript"></script>--}}
{{--<script src="{{ asset('assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js') }}"--}}
{{--        type="text/javascript"></script>--}}
{{--<script src="{{ asset('assets/global/plugins/jquery.sparkline.min.js') }}" type="text/javascript"></script>--}}
{{--<script src="{{ asset('assets/global/plugins/jqvmap/jqvmap/jquery.vmap.js') }}" type="text/javascript"></script>--}}
{{--<script src="{{ asset('assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js') }}"--}}
{{--        type="text/javascript"></script>--}}
{{--<script src="{{ asset('assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js') }}"--}}
{{--        type="text/javascript"></script>--}}
{{--<script src="{{ asset('assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js') }}"--}}
{{--        type="text/javascript"></script>--}}
{{--<script src="{{ asset('assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js') }}"--}}
{{--        type="text/javascript"></script>--}}
{{--<script src="{{ asset('assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js') }}"--}}
{{--        type="text/javascript"></script>--}}
{{--<script src="{{ asset('assets/global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js') }}"--}}
{{--        type="text/javascript"></script>--}}
{{--<script src="{{ asset('assets/global/scripts/app.min.js') }}" type="text/javascript"></script>--}}
{{--<script src="{{ asset('assets/pages/scripts/dashboard.min.js') }}" type="text/javascript"></script>--}}
{{--<script src="{{ asset('assets/layouts/layout4/scripts/layout.min.js') }}" type="text/javascript"></script>--}}
{{--<script src="{{ asset('assets/layouts/layout4/scripts/demo.min.js') }}" type="text/javascript"></script>--}}
{{ $scripts ?? '' }}

</body>
</html>
