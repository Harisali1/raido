<!DOCTYPE html>
<html lang="en" class="light">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta content="Preview page of Metronic Admin Theme #4 for statistics, charts, recent events and reports"
          name="description"/>
    <meta content="" name="author"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/fontawesome.css">
    <link href="{{ asset('assets/global/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/global/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css') }}" rel="stylesheet" type="text/css"/>
    <!-- BEGIN PAGE LEVEL PLUGINS -->
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
    <!-- BEGIN HEADER INNER -->
    <div class="page-header-inner ">
        <!-- BEGIN LOGO -->
        <div class="page-logo">
            <a href="{{ route('admin.dashboard') }}">
                <img src="{{ asset('assets/pages/img/logos/logo-111x33.png') }}" alt="logo" class="logo-default"/>
            </a>
            <div class="menu-toggler sidebar-toggler">
                <!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
            </div>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
        <!-- END RESPONSIVE MENU TOGGLER -->

        <!-- BEGIN PAGE TOP -->
        <div class="page-top">
            <div class="top-menu">
                <ul class="nav navbar-nav pull-right">
                    <li class="separator hide"></li>
                    <li class="dropdown dropdown-user dropdown-dark">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                           data-close-others="true">
                            <span class="username username-hide-on-mobile"> {{ auth('vendor')->user()->name  }} </span>
                            <img alt="" class="img-circle" width="41" height="41"
                                 src="{{ auth('vendor')->user()->getImagePath('image') }}"> </a>
                        <ul class="dropdown-menu dropdown-menu-default">
                            <li>
                                <a href="{{ route('vendor.profile.index') }}">
                                    <i class="icon-user"></i> {{ auth('vendor')->user()->name  }} </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    <input type="text" name="guard" value="vendor">
                                    {{ csrf_field() }}
                                </form>
                                <a href="javascript:;" onclick="document.getElementById('logout-form').submit()">
                                    <i class="icon-key"></i>Logout
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- BEGIN TOP NAVIGATION MENU -->
{{--            <div class="top-menu">--}}
{{--                <ul class="nav navbar-nav pull-right">--}}
{{--                    <li class="separator hide"> </li>--}}
{{--                    <!-- BEGIN NOTIFICATION DROPDOWN -->--}}
{{--                    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->--}}
{{--                    <!-- DOC: Apply "dropdown-hoverable" class after "dropdown" and remove data-toggle="dropdown" data-hover="dropdown" data-close-others="true" attributes to enable hover dropdown mode -->--}}
{{--                    <!-- DOC: Remove "dropdown-hoverable" and add data-toggle="dropdown" data-hover="dropdown" data-close-others="true" attributes to the below A element with dropdown-toggle class -->--}}
{{--                    <li class="dropdown dropdown-extended dropdown-notification dropdown-dark" id="header_notification_bar">--}}
{{--                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">--}}
{{--                            <i class="icon-bell"></i>--}}
{{--                            <span class="badge badge-success"> 7 </span>--}}
{{--                        </a>--}}
{{--                        <ul class="dropdown-menu">--}}
{{--                            <li class="external">--}}
{{--                                <h3>--}}
{{--                                    <span class="bold">12 pending</span> notifications</h3>--}}
{{--                                <a href="page_user_profile_1.html">view all</a>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 250px;"><ul class="dropdown-menu-list scroller" style="height: 250px; overflow: hidden; width: auto;" data-handle-color="#637283" data-initialized="1">--}}
{{--                                        <li>--}}
{{--                                            <a href="javascript:;">--}}
{{--                                                <span class="time">just now</span>--}}
{{--                                                <span class="details">--}}
{{--                                                        <span class="label label-sm label-icon label-success">--}}
{{--                                                            <i class="fa fa-plus"></i>--}}
{{--                                                        </span> New user registered. </span>--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <a href="javascript:;">--}}
{{--                                                <span class="time">3 mins</span>--}}
{{--                                                <span class="details">--}}
{{--                                                        <span class="label label-sm label-icon label-danger">--}}
{{--                                                            <i class="fa fa-bolt"></i>--}}
{{--                                                        </span> Server #12 overloaded. </span>--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <a href="javascript:;">--}}
{{--                                                <span class="time">10 mins</span>--}}
{{--                                                <span class="details">--}}
{{--                                                        <span class="label label-sm label-icon label-warning">--}}
{{--                                                            <i class="fa fa-bell-o"></i>--}}
{{--                                                        </span> Server #2 not responding. </span>--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <a href="javascript:;">--}}
{{--                                                <span class="time">14 hrs</span>--}}
{{--                                                <span class="details">--}}
{{--                                                        <span class="label label-sm label-icon label-info">--}}
{{--                                                            <i class="fa fa-bullhorn"></i>--}}
{{--                                                        </span> Application error. </span>--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <a href="javascript:;">--}}
{{--                                                <span class="time">2 days</span>--}}
{{--                                                <span class="details">--}}
{{--                                                        <span class="label label-sm label-icon label-danger">--}}
{{--                                                            <i class="fa fa-bolt"></i>--}}
{{--                                                        </span> Database overloaded 68%. </span>--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <a href="javascript:;">--}}
{{--                                                <span class="time">3 days</span>--}}
{{--                                                <span class="details">--}}
{{--                                                        <span class="label label-sm label-icon label-danger">--}}
{{--                                                            <i class="fa fa-bolt"></i>--}}
{{--                                                        </span> A user IP blocked. </span>--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <a href="javascript:;">--}}
{{--                                                <span class="time">4 days</span>--}}
{{--                                                <span class="details">--}}
{{--                                                        <span class="label label-sm label-icon label-warning">--}}
{{--                                                            <i class="fa fa-bell-o"></i>--}}
{{--                                                        </span> Storage Server #4 not responding dfdfdfd. </span>--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <a href="javascript:;">--}}
{{--                                                <span class="time">5 days</span>--}}
{{--                                                <span class="details">--}}
{{--                                                        <span class="label label-sm label-icon label-info">--}}
{{--                                                            <i class="fa fa-bullhorn"></i>--}}
{{--                                                        </span> System Error. </span>--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <a href="javascript:;">--}}
{{--                                                <span class="time">9 days</span>--}}
{{--                                                <span class="details">--}}
{{--                                                        <span class="label label-sm label-icon label-danger">--}}
{{--                                                            <i class="fa fa-bolt"></i>--}}
{{--                                                        </span> Storage server failed. </span>--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                    </ul><div class="slimScrollBar" style="background: rgb(99, 114, 131); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(234, 234, 234); opacity: 0.2; z-index: 90; right: 1px;"></div></div>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}
{{--                    <!-- END NOTIFICATION DROPDOWN -->--}}

{{--                    <!-- BEGIN INBOX DROPDOWN -->--}}
{{--                    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->--}}
{{--                    <li class="dropdown dropdown-extended dropdown-inbox dropdown-dark" id="header_inbox_bar">--}}
{{--                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">--}}
{{--                            <i class="icon-envelope-open"></i>--}}
{{--                            <span class="badge badge-danger"> 4 </span>--}}
{{--                        </a>--}}
{{--                        <ul class="dropdown-menu">--}}
{{--                            <li class="external">--}}
{{--                                <h3>You have--}}
{{--                                    <span class="bold">7 New</span> Messages</h3>--}}
{{--                                <a href="app_inbox.html">view all</a>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 275px;"><ul class="dropdown-menu-list scroller" style="height: 275px; overflow: hidden; width: auto;" data-handle-color="#637283" data-initialized="1">--}}
{{--                                        <li>--}}
{{--                                            <a href="#">--}}
{{--                                                    <span class="photo">--}}
{{--                                                        <img src="../assets/layouts/layout3/img/avatar2.jpg" class="img-circle" alt=""> </span>--}}
{{--                                                <span class="subject">--}}
{{--                                                        <span class="from"> Lisa Wong </span>--}}
{{--                                                        <span class="time">Just Now </span>--}}
{{--                                                    </span>--}}
{{--                                                <span class="message"> Vivamus sed auctor nibh congue nibh. auctor nibh auctor nibh... </span>--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <a href="#">--}}
{{--                                                    <span class="photo">--}}
{{--                                                        <img src="../assets/layouts/layout3/img/avatar3.jpg" class="img-circle" alt=""> </span>--}}
{{--                                                <span class="subject">--}}
{{--                                                        <span class="from"> Richard Doe </span>--}}
{{--                                                        <span class="time">16 mins </span>--}}
{{--                                                    </span>--}}
{{--                                                <span class="message"> Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <a href="#">--}}
{{--                                                    <span class="photo">--}}
{{--                                                        <img src="../assets/layouts/layout3/img/avatar1.jpg" class="img-circle" alt=""> </span>--}}
{{--                                                <span class="subject">--}}
{{--                                                        <span class="from"> Bob Nilson </span>--}}
{{--                                                        <span class="time">2 hrs </span>--}}
{{--                                                    </span>--}}
{{--                                                <span class="message"> Vivamus sed nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <a href="#">--}}
{{--                                                    <span class="photo">--}}
{{--                                                        <img src="../assets/layouts/layout3/img/avatar2.jpg" class="img-circle" alt=""> </span>--}}
{{--                                                <span class="subject">--}}
{{--                                                        <span class="from"> Lisa Wong </span>--}}
{{--                                                        <span class="time">40 mins </span>--}}
{{--                                                    </span>--}}
{{--                                                <span class="message"> Vivamus sed auctor 40% nibh congue nibh... </span>--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <a href="#">--}}
{{--                                                    <span class="photo">--}}
{{--                                                        <img src="../assets/layouts/layout3/img/avatar3.jpg" class="img-circle" alt=""> </span>--}}
{{--                                                <span class="subject">--}}
{{--                                                        <span class="from"> Richard Doe </span>--}}
{{--                                                        <span class="time">46 mins </span>--}}
{{--                                                    </span>--}}
{{--                                                <span class="message"> Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                    </ul><div class="slimScrollBar" style="background: rgb(99, 114, 131); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(234, 234, 234); opacity: 0.2; z-index: 90; right: 1px;"></div></div>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}
{{--                    <!-- END INBOX DROPDOWN -->--}}
{{--                    <li class="separator hide"> </li>--}}
{{--                    <!-- BEGIN TODO DROPDOWN -->--}}
{{--                    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->--}}
{{--                    <li class="dropdown dropdown-extended dropdown-tasks dropdown-dark" id="header_task_bar">--}}
{{--                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">--}}
{{--                            <i class="icon-calendar"></i>--}}
{{--                            <span class="badge badge-primary"> 3 </span>--}}
{{--                        </a>--}}
{{--                        <ul class="dropdown-menu extended tasks">--}}
{{--                            <li class="external">--}}
{{--                                <h3>You have--}}
{{--                                    <span class="bold">12 pending</span> tasks</h3>--}}
{{--                                <a href="?p=page_todo_2">view all</a>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 275px;"><ul class="dropdown-menu-list scroller" style="height: 275px; overflow: hidden; width: auto;" data-handle-color="#637283" data-initialized="1">--}}
{{--                                        <li>--}}
{{--                                            <a href="javascript:;">--}}
{{--                                                    <span class="task">--}}
{{--                                                        <span class="desc">New release v1.2 </span>--}}
{{--                                                        <span class="percent">30%</span>--}}
{{--                                                    </span>--}}
{{--                                                <span class="progress">--}}
{{--                                                        <span style="width: 40%;" class="progress-bar progress-bar-success" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">--}}
{{--                                                            <span class="sr-only">40% Complete</span>--}}
{{--                                                        </span>--}}
{{--                                                    </span>--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <a href="javascript:;">--}}
{{--                                                    <span class="task">--}}
{{--                                                        <span class="desc">Application deployment</span>--}}
{{--                                                        <span class="percent">65%</span>--}}
{{--                                                    </span>--}}
{{--                                                <span class="progress">--}}
{{--                                                        <span style="width: 65%;" class="progress-bar progress-bar-danger" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">--}}
{{--                                                            <span class="sr-only">65% Complete</span>--}}
{{--                                                        </span>--}}
{{--                                                    </span>--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <a href="javascript:;">--}}
{{--                                                    <span class="task">--}}
{{--                                                        <span class="desc">Mobile app release</span>--}}
{{--                                                        <span class="percent">98%</span>--}}
{{--                                                    </span>--}}
{{--                                                <span class="progress">--}}
{{--                                                        <span style="width: 98%;" class="progress-bar progress-bar-success" aria-valuenow="98" aria-valuemin="0" aria-valuemax="100">--}}
{{--                                                            <span class="sr-only">98% Complete</span>--}}
{{--                                                        </span>--}}
{{--                                                    </span>--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <a href="javascript:;">--}}
{{--                                                    <span class="task">--}}
{{--                                                        <span class="desc">Database migration</span>--}}
{{--                                                        <span class="percent">10%</span>--}}
{{--                                                    </span>--}}
{{--                                                <span class="progress">--}}
{{--                                                        <span style="width: 10%;" class="progress-bar progress-bar-warning" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">--}}
{{--                                                            <span class="sr-only">10% Complete</span>--}}
{{--                                                        </span>--}}
{{--                                                    </span>--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <a href="javascript:;">--}}
{{--                                                    <span class="task">--}}
{{--                                                        <span class="desc">Web server upgrade</span>--}}
{{--                                                        <span class="percent">58%</span>--}}
{{--                                                    </span>--}}
{{--                                                <span class="progress">--}}
{{--                                                        <span style="width: 58%;" class="progress-bar progress-bar-info" aria-valuenow="58" aria-valuemin="0" aria-valuemax="100">--}}
{{--                                                            <span class="sr-only">58% Complete</span>--}}
{{--                                                        </span>--}}
{{--                                                    </span>--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <a href="javascript:;">--}}
{{--                                                    <span class="task">--}}
{{--                                                        <span class="desc">Mobile development</span>--}}
{{--                                                        <span class="percent">85%</span>--}}
{{--                                                    </span>--}}
{{--                                                <span class="progress">--}}
{{--                                                        <span style="width: 85%;" class="progress-bar progress-bar-success" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">--}}
{{--                                                            <span class="sr-only">85% Complete</span>--}}
{{--                                                        </span>--}}
{{--                                                    </span>--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <a href="javascript:;">--}}
{{--                                                    <span class="task">--}}
{{--                                                        <span class="desc">New UI release</span>--}}
{{--                                                        <span class="percent">38%</span>--}}
{{--                                                    </span>--}}
{{--                                                <span class="progress progress-striped">--}}
{{--                                                        <span style="width: 38%;" class="progress-bar progress-bar-important" aria-valuenow="18" aria-valuemin="0" aria-valuemax="100">--}}
{{--                                                            <span class="sr-only">38% Complete</span>--}}
{{--                                                        </span>--}}
{{--                                                    </span>--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                    </ul><div class="slimScrollBar" style="background: rgb(99, 114, 131); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(234, 234, 234); opacity: 0.2; z-index: 90; right: 1px;"></div></div>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}
{{--                    <!-- END TODO DROPDOWN -->--}}
{{--                    <!-- BEGIN USER LOGIN DROPDOWN -->--}}
{{--                    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->--}}
{{--                    <li class="dropdown dropdown-user dropdown-dark">--}}
{{--                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">--}}
{{--                            <span class="username username-hide-on-mobile"> Nick </span>--}}
{{--                            <!-- DOC: Do not remove below empty space(&nbsp;) as its purposely used -->--}}
{{--                            <img alt="" class="img-circle" src="../assets/layouts/layout4/img/avatar9.jpg"> </a>--}}
{{--                        <ul class="dropdown-menu dropdown-menu-default">--}}
{{--                            <li>--}}
{{--                                <a href="page_user_profile_1.html">--}}
{{--                                    <i class="icon-user"></i> My Profile </a>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <a href="app_calendar.html">--}}
{{--                                    <i class="icon-calendar"></i> My Calendar </a>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <a href="app_inbox.html">--}}
{{--                                    <i class="icon-envelope-open"></i> My Inbox--}}
{{--                                    <span class="badge badge-danger"> 3 </span>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <a href="app_todo_2.html">--}}
{{--                                    <i class="icon-rocket"></i> My Tasks--}}
{{--                                    <span class="badge badge-success"> 7 </span>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li class="divider"> </li>--}}
{{--                            <li>--}}
{{--                                <a href="page_user_lock_1.html">--}}
{{--                                    <i class="icon-lock"></i> Lock Screen </a>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <a href="page_user_login_1.html">--}}
{{--                                    <i class="icon-key"></i> Log Out </a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}
{{--                    <!-- END USER LOGIN DROPDOWN -->--}}
{{--                    <!-- BEGIN QUICK SIDEBAR TOGGLER -->--}}
{{--                    <li class="dropdown dropdown-extended quick-sidebar-toggler">--}}
{{--                        <span class="sr-only">Toggle Quick Sidebar</span>--}}
{{--                        <i class="icon-logout"></i>--}}
{{--                    </li>--}}
{{--                    <!-- END QUICK SIDEBAR TOGGLER -->--}}
{{--                </ul>--}}
{{--            </div>--}}
            <!-- END TOP NAVIGATION MENU -->
        </div>
        <!-- END PAGE TOP -->
    </div>
    <!-- END HEADER INNER -->
</div>

<div class="clearfix"></div>
<div class="page-container">
    <x-dashboard-sidebar-vendor></x-dashboard-sidebar-vendor>
    {{ $slot }}
</div>
<div class="page-footer">
    <div class="scroll-to-top">
        <i class="icon-arrow-up"></i>
    </div>
</div>
<script src="{{ asset('assets/global/plugins/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
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
