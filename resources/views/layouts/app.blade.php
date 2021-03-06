
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="/js/lib/jquery/jquery.min.js"></script>
    @yield('css')
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <title>KickStart | {{Route::currentRouteName()}}</title>
    <!-- Bootstrap Core CSS -->
    <link href="/css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="/css/helper.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->
    <!--[if lt IE 9]>
    <script src="https:**oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https:**oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header fix-sidebar">
    <!-- Preloader - style you can find in spinners.css -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
			<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- Main wrapper  -->
    <div id="main-wrapper">
        <!-- header header  -->
        <div class="header">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- Logo -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.html">
                        <!-- Logo icon -->
                        <b><img src="/img/logo.jpg" width="70px" height="80px" alt="homepage" class="dark-logo" /></b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                    </a>
                </div>
                <!-- End Logo -->
                <div class="navbar-collapse">
                    <!-- toggle and nav items -->
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted  " href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                        <li class="nav-item m-l-10"> <a class="nav-link sidebartoggler hidden-sm-down text-muted  " href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        <!-- Messages -->
                        <li class="nav-item dropdown mega-dropdown"> <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-th-large"></i></a>
                            <div class="dropdown-menu animated zoomIn">
                                <ul class="mega-dropdown-menu row">


                                    <li class="col-lg-3  m-b-30">
                                       
                                    </li>
                                    <li class="col-lg-3 col-xlg-3 m-b-30">
                                        <h4 class="m-b-20">FAQs List</h4>
                                        <!-- List style -->
                                        <ul class="list-style-none">
                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> This Is Another Link</a></li>
                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> This Is Another Link</a></li>
                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> This Is Another Link</a></li>
                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> This Is Another Link</a></li>
                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> This Is Another Link</a></li>
                                        </ul>
                                    </li>
                                   
                                </ul>
                            </div>
                        </li>
                        <!-- End Messages -->
                    </ul>
                    <!-- User profile and search -->
                    <ul class="navbar-nav my-lg-0">

                        <!-- Search -->
                       
                        <!-- Comment -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-bell"></i>
								<div class="notify"><span class="point"></span> </div>
							</a>
                            <div class="dropdown-menu dropdown-menu-right mailbox animated zoomIn">
                                <ul>
                                    <li>
                                        <div class="drop-title">Notifications</div>
                                    </li>
                                    <li>
                                        <div class="message-center">
                                            <!-- Message -->
                                            <a href="#">
                                                <div class="btn btn-danger btn-circle m-r-10"><i class="fa fa-link"></i></div>
                                                <div class="mail-contnet">
                                                    <h5>Notification Deactivated</h5> <span class="mail-desc">If you want to activate real time notifications in this app, please contact the creator of this app</span> <span class="time">9:30 AM</span>
                                                </div>
                                            </a>
                                            <!-- Message -->
                                            
                                        </div>
                                    </li>
                                    
                                </ul>
                            </div>
                        </li>
                        <!-- End Comment -->
                        <!-- Messages -->
                       
                        <!-- End Messages -->
                        <!-- Profile -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img @if(Auth()->user()->image) src="/img/users/{{Auth()->user()->image}}" @else src="/img/logo.jpg" @endif alt="user" class="profile-pic" /></a>
                            <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                                <ul class="dropdown-user">
                                    <li><a href="#"><i class="ti-user"></i> {{Auth::user()->name}}</a></li>
                                    <li><a href="/changePassword"><i class=""></i>Change Password</a></li>
                                    <li><a href="{{route('logout')}}"><i class="fa fa-power-off"></i> Logout</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- End header header -->
        <!-- Left Sidebar  -->
        <div class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                        <li class="nav-label">Home</li>
                        <li> <a    href="/home" aria-expanded="false"><i class="fa fa-tachometer"></i><span class="hide-menu">Dashboard</a>
                        </li>
                        <li class="nav-label">&nbsp;</li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-user" aria-hidden="true"></i><span class="hide-menu">Customers</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{route('manageCustomers')}}">Manage Customers</a></li>
                                <li><a href="/manageDefaulters">Manage Defaulters</a></li>
                                <li><a href="/customer/create">Add New Customer</a></li>
                                <li><a href="{{route('uploadCustomerDocuments')}}">Upload Customer Documents</a></li>
                            </ul>
                        </li>
                        
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-user" aria-hidden="true"></i><span class="hide-menu">Guarantors</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="/manageGuarantors">Manage Guarantors</a></li>
                                <li><a href="/guarantor/create">Add New Guarantor</a></li>
                                <li><a href="{{route('uploadGuarantorDocuments')}}">Upload Guarantor Documents</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-suitcase"></i><span class="hide-menu">Loans<span class="label label-rouded label-warning pull-right">{{count(App\loanType::all())}}</span></span></a>
                            <ul aria-expanded="false" class="collapse">
                                @foreach (App\loanType::all() as $loanTypes )
                                <li><a href="/loanType/{{$loanTypes->id}}">{{$loanTypes->name}}</a></li>
                                @endforeach
                               
                               
                               
                            </ul>
                        </li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-wpforms"></i><span class="hide-menu">Branches</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="/manageBranch">Manage Branches</a></li>
                                <li><a href="/addBranch">Add Branch</a></li>
                               
                            </ul>
                        </li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-table"></i><span class="hide-menu"> Account</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <!--
                                <li><a href="table-bootstrap.html">Manage Capital Received</a></li>
                                <li><a href="table-datatable.html">Manage Capital Return</a></li>
                                -->
                            </ul>
                        </li>
                       
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-columns"></i><span class="hide-menu">Bank Book</span></a>
                             <!--
                            <ul aria-expanded="false" class="collapse">
                              
                                <li><a href="layout-blank.html">Manage Bank Deposits</a></li>
                                <li><a href="layout-boxed.html">Manage Bank Withdrawls</a></li>
                                <li><a href="layout-fix-header.html">Ledger</a></li>
                                <li><a href="layout-fix-sidebar.html">Bank Sheet</a></li>
                              
                            </ul>
                              -->
                        </li>
                       
                       
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-building" aria-hidden="true"></i><span class="hide-menu">Collateral</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="/collateral/manage">Manage Collateral</a></li>
                                <li><a href="/collateral/add">Add collateral</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-bar-chart"></i></i><span class="hide-menu">Reports</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="/runningLoans">Running Loans</a></li>
                               
                            </ul>
                        </li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-gear"></i><span class="hide-menu">Settings<span class="label label-rouded label-success pull-right">8</span></span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="/approveLoan">Approve Loans</a></li>
                                <li><a href="#" class="has-arrow">Users<span class="label label-rounded label-success">2</span></a>
                                    <ul aria-expanded="false" class="collapse">
                                        <li><a href="/admin/users/add">Add Users</a></li>
                                        <li><a href="/admin/users/manage">Manage User</a></li>
                                        
                                    </ul>
                                </li>
                                <li><a href="#" class="has-arrow">Loan</a>
                                    <ul aria-expanded="false" class="collapse">
                                        <li><a href="/addLoanType">Add Loan</a></li>
                                        <li><a href="/manageLoanType">Manage loan</a></li>
                                        
                                    </ul>
                                </li>
                                <li><a href="/changePassword">Change Password</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </div>
        <!-- End Left Sidebar  -->
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">{{Route::currentRouteName()}}</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
        @yield('content')
            <!-- End Container fluid  -->
            <!-- footer -->
            <footer class="footer"> © 2018 All rights reserved. Template designed by <a href="">Colorlib</a></footer>
            <!-- End footer -->
        </div>
        <!-- End Page wrapper  -->
    </div>
    <!-- End Wrapper -->
    <!-- All Jquery -->
    
    <!-- Bootstrap tether Core JavaScript -->
    <script src="/js/lib/bootstrap/js/popper.min.js"></script>
    <script src="/js/lib/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="/js/jquery.slimscroll.js"></script>
    <!--Menu sidebar -->
    <script src="/js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="/js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!-- Amchart -->
    <script src="/js/lib/morris-chart/raphael-min.js"></script>
    <script src="/js/lib/morris-chart/morris.js"></script>
    <script src="/js/lib/morris-chart/dashboard1-init.js"></script>

    <!--Custom JavaScript -->
    <script src="/js/custom.min.js"></script>
    @yield('js')

</body>

</html>