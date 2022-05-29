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
    {{--    Toastr--}}
    <link href="{{asset('css/toastr.min.css')}}" rel="stylesheet">

{{--    Link Bootstrap --}}
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

                    <input type="search" class="form-control" style="width: 500px;" placeholder="Search..."
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
                <li class="nav-label">Hotel</li>

                <li>
                    <a class="" href="{{route('adminPage')}}" aria-expanded="false">
                        <i class="icon-home menu-icon"></i><span class="nav-text">Dashboard</span>
                    </a>
                </li>


                <li class="mega-menu mega-menu-sm">
                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="icon-bulb menu-icon"></i><span class="nav-text">Hotels</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{route('add.hotel')}}">Hotel Profile</a></li>
                        <li><a href="{{route('hotel.overall')}}">Hotel Details</a></li>
{{--                        <li><a href="{{route('all.hotel')}}">All Hotels</a></li>--}}
                    </ul>
                </li>


                <li>
                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="icon-screen-tablet menu-icon"></i><span class="nav-text">Rooms</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{route('room.view')}}">Add Room</a></li>
                        <li><a href="{{route('room.features.view')}}">Add Features</a></li>
                        <li><a href="{{route('room.active')}}">Active Rooms</a></li>
                        <li><a href="{{route('room.inActive')}}">In Active Rooms</a></li>
                        <li><a href="{{route('room.overall')}}">Over All Rooms</a></li>
                        <li><a href="{{route('features.all')}}">Over All Features</a></li>
                    </ul>
                </li>


                <li class="mega-menu mega-menu-sm">
                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="icon-user-follow menu-icon"></i><span class="nav-text">Customers</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{route('add.client')}}">Add Customer</a></li>
                        <li><a href="{{route('active.client')}}">Active Customer</a></li>
                        <li><a href="{{route('all.client')}}">All Customer</a></li>
                    </ul>
                </li>
                <li>


                <li>
                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="icon-menu menu-icon"></i> <span class="nav-text">Reservations</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{route('reservation.view')}}">Add Reservation</a></li>
                        <li><a href="{{route('reservation.active')}}">Active Reservations</a></li>
                        <li><a href="{{route('reservation.overall')}}">All Reservations</a></li>
                        <li><a href="{{route('reservation.checkout')}}">Check Out</a></li>
                    </ul>
                </li>


                <li>
                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="icon-graph menu-icon"></i> <span class="nav-text">Expenses</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{route('show.expense')}}">Add Expense</a></li>
                        <li><a href="{{route('list.expenses')}}">Expenses List</a></li>
                    </ul>
                </li>


                <li>
                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="icon-people menu-icon"></i><span class="nav-text">Employees</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{route('add.employee')}}">Add Employee</a></li>
                        <li><a href="{{route('active.employee')}}">Active Employees</a></li>
                        <li><a href="{{route('all.employee')}}">All Employees</a></li>
                    </ul>
                </li>


                <li>
                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="icon-credit-card menu-icon"></i><span class="nav-text">Payments</span>
                    </a>
                    <ul aria-expanded="false">
{{--                        <li><a href="{{route('hotel.payments.view')}}">New Payment</a></li>--}}
{{--                        <li><a href="{{route('active.employee')}}">All Payments</a></li>--}}
                    </ul>
                </li>

                <li class="nav-label">Transportation</li>
                <li>
                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="icon-credit-card menu-icon"></i><span class="nav-text">Transportation</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{route('company.view')}}" >Add Company </a></li>
                        <li><a href="{{route('company.details')}}" >List of Company </a></li>
                        <li><a href="{{route('transportationfeature.view')}}" >Feature Title</a></li>
                        <li><a href="{{route('show.title')}}" >Feature Title List</a></li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="icon-credit-card menu-icon"></i> <span class="nav-text">Drivers</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{route('view.drivers')}}">Driver Profile</a></li>
                        <li><a href="{{route('list.drivers')}}">Drivers List</a></li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="icon-credit-card menu-icon"></i> <span class="nav-text">Vehicle</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{route('vehicleDetail.view')}}"> Add Vehicle Detail</a></li>
                        <li><a href="{{route('view.vehicle.details')}}"> List Vehicle Detail</a></li>
                        <li><a href="{{route('Display.add.vehicle.title.view')}}"> Add Vehicle Type</a></li>
                        <li><a href="{{route('list.vehicle.title.type')}}"> List Vehicle Type</a></li>
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
    @yield('content');
    <!--**********************************
        Content body end
    ***********************************-->


</div>

<!--**********************************
    Footer start
***********************************-->
<div class="footer">
    <div class="copyright">
        <p>Copyright &copy; Designed & Developed by <a href="">NORTH TRIP CYCLE</a> 2022
        </p>
    </div>
</div>
<!--**********************************
    Footer end
***********************************-->
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
<script src="{{asset('Dashboard/js/custom_file.js')}}"></script>

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
    @if(Session::has('success'))
    toastr.success("{{ Session::get('success') }}")
    @endif
</script>

</body>

</html>
