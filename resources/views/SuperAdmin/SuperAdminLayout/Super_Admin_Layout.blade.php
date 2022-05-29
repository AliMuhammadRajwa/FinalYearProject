<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>North Trip Cycle</title>
    <!-- Favicon icon -->
    {{--    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('img/logo1.png')}}">--}}
    <link rel="icon" class="img-responsive thumbnail" sizes="16x16" href="{{asset('img/logo1.png')}}">
    <!-- Pignose Calender -->
    <link href="{{asset('Dashboard/plugins/pg-calendar/css/pignose.calendar.min.css')}}" rel="stylesheet">
    <!-- Chartist -->
    <link rel="stylesheet" href="{{asset('Dashboard/plugins/chartist/css/chartist.min.css')}}">
    <link rel="stylesheet"
          href="{{asset('Dashboard/plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css')}}">
    <!-- Custom Stylesheet -->
    <link href="{{asset('Dashboard/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('css/toastr.min.css')}}" rel="stylesheet">

</head>

<body>

<!--*******************
    Preloader start
********************-->
<div id="preloader">
    <div class="loader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10"/>
        </svg>
    </div>
</div>
<!--*******************
    Preloader end
********************-->


<!--**********************************
    Main wrapper start
***********************************-->
<div id="main-wrapper">

    <!--**********************************
        Nav header start
    ***********************************-->
    <div class="nav-header">
        <a href="{{route('LoadMainPage')}}">
            <div class="row">
                <div class="col-sm-5 mx-auto text-center">
                    <img src="{{asset('img/logo1.png')}}" class="thumbnail img-responsive">
                </div>
            </div>
        </a>
    </div>


    <!--**********************************
        Nav header end
    ***********************************-->

    <!--**********************************
        Header start
    ***********************************-->
    <div class="header">
        <div class="header-content clearfix">

            <div class="nav-control">
                <div class="hamburger">
                    <span class="toggle-icon"><i class="icon-menu"></i></span>
                </div>
            </div>
            <div class="header-left">
                <div class="input-group icons">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-transparent border-0 pr-2 pr-sm-3" id="basic-addon1"><i
                                class="mdi mdi-magnify"></i></span>
                    </div>
                    <input type="search" class="form-control" style="width: 500px;" placeholder="Search Dashboard"
                           aria-label="Search Dashboard">
                    <div class="drop-down animated flipInX d-md-none">
                        <form action="#">
                            <input type="text" class="form-control" placeholder="Search">
                        </form>
                    </div>
                </div>
            </div>
            <div class="header-right">
                <ul class="clearfix">
                    <li class="icons dropdown"><a href="javascript:void(0)" data-toggle="dropdown">
                            <i class="mdi mdi-email-outline"></i>
                            <span class="badge badge-pill gradient-1">3</span>
                        </a>
                        <div class="drop-down animated fadeIn dropdown-menu">
                            <div class="dropdown-content-heading d-flex justify-content-between">
                                <span class="">3 New Messages</span>
                                <a href="javascript:void()" class="d-inline-block">
                                    <span class="badge badge-pill gradient-1">3</span>
                                </a>
                            </div>
                            <div class="dropdown-content-body">
                                <ul>
                                    <li class="notification-unread">
                                        <a href="javascript:void()">
                                            <img class="float-left mr-3 avatar-img"
                                                 src="{{asset('Dashboard/images/avatar/1.jpg')}}" alt="">
                                            <div class="notification-content">
                                                <div class="notification-heading">Saiful Islam</div>
                                                <div class="notification-timestamp">08 Hours ago</div>
                                                <div class="notification-text">Hi Teddy, Just wanted to let you ...
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="notification-unread">
                                        <a href="javascript:void()">
                                            <img class="float-left mr-3 avatar-img"
                                                 src="{{asset('Dashboard/images/avatar/2.jpg')}}" alt="">
                                            <div class="notification-content">
                                                <div class="notification-heading">Adam Smith</div>
                                                <div class="notification-timestamp">08 Hours ago</div>
                                                <div class="notification-text">Can you do me a favour?</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void()">
                                            <img class="float-left mr-3 avatar-img"
                                                 src="{{asset('Dashboard/images/avatar/3.jpg')}}" alt="">
                                            <div class="notification-content">
                                                <div class="notification-heading">Barak Obama</div>
                                                <div class="notification-timestamp">08 Hours ago</div>
                                                <div class="notification-text">Hi Teddy, Just wanted to let you ...
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void()">
                                            <img class="float-left mr-3 avatar-img"
                                                 src="{{asset('Dashboard/images/avatar/4.jpg')}}" alt="">
                                            <div class="notification-content">
                                                <div class="notification-heading">Hilari Clinton</div>
                                                <div class="notification-timestamp">08 Hours ago</div>
                                                <div class="notification-text">Hello</div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>

                            </div>
                        </div>
                    </li>
                    <li class="icons dropdown"><a href="javascript:void(0)" data-toggle="dropdown">
                            <i class="mdi mdi-bell-outline"></i>
                            <span class="badge badge-pill gradient-2">3</span>
                        </a>
                        <div class="drop-down animated fadeIn dropdown-menu dropdown-notfication">
                            <div class="dropdown-content-heading d-flex justify-content-between">
                                <span class="">2 New Notifications</span>
                                <a href="javascript:void()" class="d-inline-block">
                                    <span class="badge badge-pill gradient-2">5</span>
                                </a>
                            </div>
                            <div class="dropdown-content-body">
                                <ul>
                                    <li>
                                        <a href="javascript:void()">
                                            <span class="mr-3 avatar-icon bg-success-lighten-2"><i
                                                    class="icon-present"></i></span>
                                            <div class="notification-content">
                                                <h6 class="notification-heading">Events near you</h6>
                                                <span class="notification-text">Within next 5 days</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void()">
                                            <span class="mr-3 avatar-icon bg-danger-lighten-2"><i
                                                    class="icon-present"></i></span>
                                            <div class="notification-content">
                                                <h6 class="notification-heading">Event Started</h6>
                                                <span class="notification-text">One hour ago</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void()">
                                            <span class="mr-3 avatar-icon bg-success-lighten-2"><i
                                                    class="icon-present"></i></span>
                                            <div class="notification-content">
                                                <h6 class="notification-heading">Event Ended Successfully</h6>
                                                <span class="notification-text">One hour ago</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void()">
                                            <span class="mr-3 avatar-icon bg-danger-lighten-2"><i
                                                    class="icon-present"></i></span>
                                            <div class="notification-content">
                                                <h6 class="notification-heading">Events to Join</h6>
                                                <span class="notification-text">After two days</span>
                                            </div>
                                        </a>
                                    </li>
                                </ul>

                            </div>
                        </div>
                    </li>

                    <li class="icons dropdown">
                        <div class="user-img c-pointer position-relative" data-toggle="dropdown">
                            <span class="activity active"></span>
                            <img src="{{asset('img/logo1.png')}}" height="40" width="40" alt="">
                        </div>

                        <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
                            <div class="dropdown-content-body">
                                <ul>
                                    <li>
                                        <a><i class="icon-user"></i> <span>{{ Auth::user()->name }}</span></a>
                                    </li>
                                    <li>
                                        <a href="app-profile.html"><i class="icon-user"></i> <span>Profile</span></a>
                                    </li>

                                    <li>
                                        <a href="#"><i class="icon-settings"></i> <span>Settings</span></a>
                                    </li>

                                    <hr class="my-2">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                              class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!--**********************************
        Header end ti-comment-alt
    ***********************************-->

    <!--**********************************
        Sidebar start
    ***********************************-->
    <div class="nk-sidebar">
        <div class="nk-nav-scroll">
            <ul class="metismenu" id="menu">
                <li class="nav-label"></li>
                <li>
                    <a class="" href="{{route('adminPage')}}" aria-expanded="false">
                        <i class="icon-home menu-icon"></i><span class="nav-text">Dashboard</span>
                    </a>
                </li>
                <li class="mega-menu mega-menu-sm">
                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="icon-user-follow menu-icon"></i><span class="nav-text">Hotels</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="#">Add Hotel</a></li>
                        <li><a href="#">Active Hotel</a></li>
                        <li><a href="#">All Hotels</a></li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="icon-menu menu-icon"></i> <span class="nav-text">Countries</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{route('country.view')}}">Add Countires</a></li>
                        <li><a href="{{route('country.list')}}">Active Countries</a></li>
                        <li><a href="#">List All Countries</a></li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="icon-screen-tablet menu-icon"></i><span class="nav-text">Provinces</span>
                    </a>
                    <ul aria-expanded="false">

                        <li><a href="{{route('province.view')}}">Add Province</a></li>
                        <li><a href="{{route('province.list')}}">Over All</a></li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="icon-graph menu-icon"></i> <span class="nav-text">Cities</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{route('city.view')}}">Add City</a></li>
                        <li><a href="{{route('city.list')}}">List all Cities</a></li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="icon-graph menu-icon"></i> <span class="nav-text">Gender</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{route('gender.view')}}">Add Gender</a></li>
                        <li><a href="{{route('gender.list')}}">List Gender</a></li>
                    </ul>
                </li>
                <li>

                <li>
                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="icon-graph menu-icon"></i> <span class="nav-text">Room Type</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{route('room_type.view')}}">Add Room Type</a></li>
                        <li><a href="{{route('room_type.list')}}">List Room Type</a></li>
                    </ul>
                </li>
                <li>

                <li>
                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="icon-graph menu-icon"></i> <span class="nav-text">Bed Type</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{route('bed_type.view')}}">Add Bed Type</a></li>
                        <li><a href="{{route('bed_type.list')}}">List Bed Type</a></li>
                    </ul>
                </li>


                <li>
                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="icon-graph menu-icon"></i> <span class="nav-text">Feature Title</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{route('features.title.view')}}">Add Feature Title</a></li>
{{--                        <li><a href="{{route('bed_type.list')}}">List Bed Type</a></li>--}}
                    </ul>
                </li>


                <li>
                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="icon-people menu-icon"></i><span class="nav-text">Super Admins</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="./ui-accordion.html">Add SuperAdmin</a></li>
                        <li><a href="./ui-alert.html">All SuperAdmin</a></li>
                        <li><a href="./ui-badge.html">Attendance</a></li>
                    </ul>
                </li>

                <a href="{{ route('logout') }}" aria-expanded="false"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    <i class="icon-logout menu-icon"></i> <span class="nav-text" style="margin-left: 4%;">Logout</span>
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                      class="d-none">
                    @csrf
                </form>
            </ul>
        </div>
    </div>
    <!--**********************************
        Sidebar end
    ***********************************-->

    <!--**********************************
        Content body start
    ***********************************-->
    @yield('Super_content');
    <!--**********************************
        Content body end
    ***********************************-->


</div>
<!--**********************************
    Main wrapper end
***********************************-->

<!--**********************************
    Scripts
***********************************-->
<script src="{{asset('Dashboard/plugins/common/common.min.js')}}"></script>
<script src="{{asset('Dashboard/js/custom.min.js')}}"></script>
<script src="{{asset('Dashboard/js/settings.js')}}"></script>
<script src="{{asset('Dashboard/js/gleek.js')}}"></script>
<script src="{{asset('Dashboard/js/styleSwitcher.js')}}"></script>

<!-- Chartjs -->
<script src="{{asset('Dashboard/plugins/chart.js/Chart.bundle.min.js')}}"></script>
<!-- Circle progress -->
<script src="{{asset('Dashboard/plugins/circle-progress/circle-progress.min.js')}}"></script>
<!-- Datamap -->
<script src="{{asset('Dashboard/plugins/d3v3/index.js')}}"></script>
<script src="{{asset('Dashboard/plugins/topojson/topojson.min.js')}}"></script>
<script src="{{asset('Dashboard/plugins/datamaps/datamaps.world.min.js')}}"></script>
<!-- Morrisjs -->
<script src="{{asset('Dashboard/plugins/raphael/raphael.min.js')}}"></script>
<script src="{{asset('Dashboard/plugins/morris/morris.min.js')}}"></script>
<!-- Pignose Calender -->
<script src="{{asset('Dashboard/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('Dashboard/plugins/pg-calendar/js/pignose.calendar.min.js')}}"></script>
<!-- ChartistJS -->
<script src="{{asset('Dashboard/plugins/chartist/js/chartist.min.js')}}"></script>
<script src="{{asset('Dashboad/plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js')}}"></script>


<script src="{{asset('Dashboard/js/dashboard/dashboard-1.js')}}"></script>
<script src="{{asset('js/toastr.min.js')}}"></script>
<script>
    @if( Session::has('success'))
    toastr.success("{{ Session::get('success') }}")
    @elseif( Session::has('info' ))
    toastr.info("{{ Session::get('info') }}")
    @elseif( Session::has('error' ))
    toastr.error("{{ Session::get('error') }}")
    @elseif( Session::has('warning' ))
    toastr.warning("{{ Session::get('warning') }}")
    @endif
</script>
</body>

</html>
