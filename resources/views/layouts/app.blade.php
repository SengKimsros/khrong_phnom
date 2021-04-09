<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="icon" type="image/png" sizes="16x16" href="/cubic/plugins/images/favicon.png">
    <title>Krong Phnom</title>
    <!-- ===== sweetalert2 CSS ===== -->
    <link rel="stylesheet" href="/cubic/css/toastr.css">
    <link rel="stylesheet" href="/cubic/css/sweetalert2.css" type="text/css">
    <!-- ===== Bootstrap CSS ===== -->
    <link href="/cubic/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- ===== Plugin CSS ===== -->
    <link href="/cubic/plugins/components/chartist-js/dist/chartist.min.css" rel="stylesheet">
    <link href="/cubic/plugins/components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">
    <!-- ===== Animation CSS ===== -->
    <link href="/cubic/css/animate.css" rel="stylesheet">
    <!-- ===== Custom CSS ===== -->
    <link href="/cubic/css/style.css" rel="stylesheet">
    <!-- ===== Color CSS ===== -->
    <link href="/cubic/css/colors/default.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    {{-- dataTable --}}
    <link href="/cubic/plugins/components/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
    {{-- End DataTable --}}
</head>

<body class="mini-sidebar">
    <!-- ===== Main-Wrapper ===== -->
    <div id="wrapper">
        <div class="preloader">
            <div class="cssload-speeding-wheel"></div>
        </div>
        <!-- ===== Top-Navigation ===== -->
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header">
                <a class="navbar-toggle font-20 hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse">
                    <i class="fa fa-bars"></i>
                </a>
                <div class="top-left-part">
                    <a class="logo" href="javascript:">
                        <b>
                            <img class="logo_imag" src="/cubic/plugins/images/logo_krong_phnom.png" alt="home">
                        </b>
                    </a>
                </div>
                {{-- <ul class="nav navbar-top-links navbar-left hidden-xs">
                    <li>
                        <a href="javascript:void(0)" class="sidebartoggler font-20 waves-effect waves-light"><i class="icon-arrow-left-circle"></i></a>
                    </li>
                    <li>
                        <form role="search" class="app-search hidden-xs">
                            <i class="icon-magnifier"></i>
                            <input type="text" placeholder="Search..." class="form-control">
                        </form>
                    </li>
                </ul> --}}
                <ul class="nav navbar-top-links navbar-right pull-right">
                    <li class="dropdown">
                        <a class="dropdown-toggle waves-effect waves-light font-20" data-toggle="dropdown" href="javascript:void(0);">
                            <i class="icon-speech"></i>
                            <span class="badge badge-xs badge-danger">6</span>
                        </a>
                        <ul class="dropdown-menu mailbox animated bounceInDown">
                            <li>
                                <div class="drop-title">You have 4 new messages</div>
                            </li>
                            <li>
                                <div class="message-center">
                                    <a href="javascript:void(0);">
                                        <div class="user-img">
                                            <img src="/cubic/plugins/images/users/1.jpg" alt="user" class="img-circle">
                                            <span class="profile-status online pull-right"></span>
                                        </div>
                                        <div class="mail-contnet">
                                            <h5>Pavan kumar</h5>
                                            <span class="mail-desc">Just see the my admin!</span>
                                            <span class="time">9:30 AM</span>
                                        </div>
                                    </a>
                                    <a href="javascript:void(0);">
                                        <div class="user-img">
                                            <img src="/cubic/plugins/images/users/2.jpg" alt="user" class="img-circle">
                                            <span class="profile-status busy pull-right"></span>
                                        </div>
                                        <div class="mail-contnet">
                                            <h5>Sonu Nigam</h5>
                                            <span class="mail-desc">I've sung a song! See you at</span>
                                            <span class="time">9:10 AM</span>
                                        </div>
                                    </a>
                                    <a href="javascript:void(0);">
                                        <div class="user-img">
                                            <img src="/cubic/plugins/images/users/3.jpg" alt="user" class="img-circle"><span class="profile-status away pull-right"></span>
                                        </div>
                                        <div class="mail-contnet">
                                            <h5>Arijit Sinh</h5>
                                            <span class="mail-desc">I am a singer!</span>
                                            <span class="time">9:08 AM</span>
                                        </div>
                                    </a>
                                    <a href="javascript:void(0);">
                                        <div class="user-img">
                                            <img src="/cubic/plugins/images/users/4.jpg" alt="user" class="img-circle">
                                            <span class="profile-status offline pull-right"></span>
                                        </div>
                                        <div class="mail-contnet">
                                            <h5>Pavan kumar</h5>
                                            <span class="mail-desc">Just see the my admin!</span>
                                            <span class="time">9:02 AM</span>
                                        </div>
                                    </a>
                                </div>
                            </li>
                            <li>
                                <a class="text-center" href="javascript:void(0);">
                                    <strong>See all notifications</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle waves-effect waves-light font-20" data-toggle="dropdown" href="javascript:void(0);">
                            <i class="icon-calender"></i>
                            <span class="badge badge-xs badge-danger">3</span>
                        </a>
                        <ul class="dropdown-menu dropdown-tasks animated slideInUp">
                            <li>
                                <a href="javascript:void(0);">
                                    <div>
                                        <p>
                                            <strong>Task 1</strong>
                                            <span class="pull-right text-muted">40% Complete</span>
                                        </p>
                                        <div class="progress progress-striped active">
                                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                                <span class="sr-only">40% Complete (success)</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="javascript:void(0);">
                                    <div>
                                        <p>
                                            <strong>Task 2</strong>
                                            <span class="pull-right text-muted">20% Complete</span>
                                        </p>
                                        <div class="progress progress-striped active">
                                            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                                <span class="sr-only">20% Complete</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="javascript:void(0);">
                                    <div>
                                        <p>
                                            <strong>Task 3</strong>
                                            <span class="pull-right text-muted">60% Complete</span>
                                        </p>
                                        <div class="progress progress-striped active">
                                            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                                <span class="sr-only">60% Complete (warning)</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="javascript:void(0);">
                                    <div>
                                        <p>
                                            <strong>Task 4</strong>
                                            <span class="pull-right text-muted">80% Complete</span>
                                        </p>
                                        <div class="progress progress-striped active">
                                            <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                                <span class="sr-only">80% Complete (danger)</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a class="text-center" href="javascript:void(0);">
                                    <strong>See All Tasks</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="right-side-toggle">
                        <a class="right-side-toggler waves-effect waves-light b-r-0 font-20" href="javascript:void(0)">
                            <i class="icon-settings"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- ===== Top-Navigation-End ===== -->
        <!-- ===== Left-Sidebar ===== -->
        <aside class="sidebar">
            <div class="scroll-sidebar">
                <div class="user-profile">
                    <div class="dropdown user-pro-body">
                        <div class="profile-image">
                            <img src="/cubic/plugins/images/users/hanna.jpg" alt="user-img" class="img-circle">
                            <a href="javascript:void(0);" class="dropdown-toggle u-dropdown text-blue" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <span class="badge badge-danger">
                                    <i class="fa fa-angle-down"></i>
                                </span>
                            </a>
                            <ul class="dropdown-menu animated flipInY">
                                <li><a href="{{url('profile.show')}}"><i class="fa fa-user"></i> Profile</a></li>
                                {{-- <li><a href="javascript:void(0);"><i class="fa fa-inbox"></i> Inbox</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="javascript:void(0);"><i class="fa fa-cog"></i> Account Settings</a></li>
                                <li role="separator" class="divider"></li> --}}
                                <li><a href="{{url('logout')}}"><i class="fa fa-power-off"></i> Logout</a></li>
                            </ul>
                        </div>
                        <p class="profile-text m-t-15 font-16"><a href="javascript:void(0);"> Hanna Gover</a></p>
                    </div>
                </div>
                <nav class="sidebar-nav">
                    <ul id="side-menu">
                        <li>
                            <a class="active waves-effect" href="{{url('admin/dashboard')}}"><i class="icon-screen-desktop fa-fw"></i> <span class="hide-menu"> Dashboard <span class="label label-rounded label-info pull-right">3</span></span></a>
                        </li>
                        <li>
                            <a class="waves-effect" href="javascript:void(0);" aria-expanded="false"><i class="icon-basket fa-fw"></i> <span class="hide-menu"> Project </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li> <a href="{{url('admin/project')}}">Project</a> </li>
                                <li> <a href="{{url('admin/project/create')}}">Add Project</a> </li>
                            </ul>
                        </li>
                        <li>
                            <a class="waves-effect" href="javascript:void(0);" aria-expanded="false"><i class="icon-envelope-letter fa-fw"></i> <span class="hide-menu"> Home <span class="label label-rounded label-primary pull-right">5</span></span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li> <a href="{{url('admin/home')}}">My Home</a> </li>
                                <li> <a href="{{url('admin/home/create')}}">Add Home</a> </li>
                            </ul>
                        </li>
                        <li>
                            <a class="waves-effect" href="javascript:void(0);" aria-expanded="false"><i class="icon-equalizer fa-fw"></i> <span class="hide-menu"> Booking <span class="label label-rounded label-danger pull-right">18</span></span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{url('admin/booking')}}">Booking</a></li>
                                <li><a href="{{url('admin/booking/create')}}">Add Booking</a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="waves-effect" href="javascript:void(0);" aria-expanded="false"><i class="icon-notebook fa-fw"></i> <span class="hide-menu"> Post </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{url('admin/post')}}">Post</a></li>
                                <li><a href="{{url('admin/post/create')}}">Add Post</a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="waves-effect" href="javascript:void(0);" aria-expanded="false"><i class="icon-grid fa-fw"></i> <span class="hide-menu"> Users</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{url('admin/user')}}">User</a></li>
                                <li><a href="{{url('admin/user/create')}}">Add User</a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="waves-effect" href="javascript:void(0);" aria-expanded="false"><i class="icon-settings fa-fw"></i> <span class="hide-menu"> Setting</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{url('admin/role')}}">Role</a></li>
                                <li><a href="#">Header</a></li>
                                <li><a href="#">Footer</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- ===== Left-Sidebar-End ===== -->
        <!-- ===== Page-Content ===== -->
        @yield('content')
        <!-- ===== Page-Content-End ===== -->
    </div>
    <!-- ===== Main-Wrapper-End ===== -->
    <!-- ==============================
        Required JS Files
    =============================== -->
    <!-- ===== jQuery ===== -->
    <script src="/cubic/plugins/components/jquery/dist/jquery.min.js"></script>
    <!-- ===== Bootstrap JavaScript ===== -->
    <script src="/cubic/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- ===== Slimscroll JavaScript ===== -->
    <script src="/cubic/js/jquery.slimscroll.js"></script>
    <!-- ===== Wave Effects JavaScript ===== -->
    <script src="/cubic/js/waves.js"></script>
    <!-- ===== Menu Plugin JavaScript ===== -->
    <script src="/cubic/js/sidebarmenu.js"></script>
    <!-- ===== Custom JavaScript ===== -->
    <script src="/cubic/js/custom.js"></script>
    <!-- ===== toastr JS ===== -->
    <script src="/cubic/js/toastr.min.js"></script>
    <script src="/cubic/js/sweetalert2.min.js"></script>
    <!-- ===== ckeditor JS ===== -->
    <!-- ===== Plugin JS ===== -->
    <script src="/cubic/plugins/components/chartist-js/dist/chartist.min.js"></script>
    <script src="/cubic/plugins/components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="/cubic/plugins/components/sparkline/jquery.sparkline.min.js"></script>
    <script src="/cubic/plugins/components/sparkline/jquery.charts-sparkline.js"></script>
    <script src="/cubic/plugins/components/knob/jquery.knob.js"></script>
    <script src="/cubic/plugins/components/easypiechart/dist/jquery.easypiechart.min.js"></script>
    <script src="/cubic/js/db1.js"></script>
    <!-- ===== Style Switcher JS ===== -->
    <script src="/cubic/plugins/components/styleswitcher/jQuery.style.switcher.js"></script>

    {{-- DataTable --}}
    <script src="/cubic/plugins/components/datatables/jquery.dataTables.min.js"></script>
    <!-- start - This is for export functionality only -->
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    {{-- End DataTable --}}

    <script src="/js/my_app.js"></script>
    <script src="/js/project.js"></script>
    <script src="/js/post.js"></script>
    @yield('customScript')
    <script type="text/javascript">
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr("content")
            }
        });
    </script>
</body>

</html>
