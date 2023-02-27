<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Regal Admin</title>
    <!-- base:css -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="vendors/feather/feather.css">
    <link rel="stylesheet" href="vendors/base/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css" />
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/jquery-bar-rating/fontawesome-stars-o.css">
    <link rel="stylesheet" href="vendors/jquery-bar-rating/fontawesome-stars.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="images/favicon.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- bootstrap -->


</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo" href="index.html"><img src="images/logo.svg" alt="logo" /></a>
                <a class="navbar-brand brand-logo-mini" href="index.html"><img src="images/logo-mini.svg" alt="logo" /></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="icon-menu"></span>
                </button>
                <ul class="navbar-nav mr-lg-2">
                    <li class="nav-item nav-search d-none d-lg-block">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <!-- <span class="input-group-text" id="search">
                                    <i class="icon-search"></i>
                                </span> -->
                            </div>
                            <!-- <input type="text" class="form-control" placeholder="Search Projects.." aria-label="search" aria-describedby="search"> -->
                        </div>
                    </li>
                </ul>
                <ul class="navbar-nav navbar-nav-right">
                    <!-- <li class="nav-item dropdown d-lg-flex d-none">
                        <button type="button" class="btn btn-info font-weight-bold">+ Create New</button>
                    </li> -->
                    <!-- <li class="nav-item dropdown d-flex">
                        <a class="nav-link count-indicator dropdown-toggle d-flex justify-content-center align-items-center" id="messageDropdown" href="#" data-toggle="dropdown">
                            <i class="icon-air-play mx-0"></i>
                        </a> -->
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
                        <p class="mb-0 font-weight-normal float-left dropdown-header">Messages</p>
                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <img src="images/faces/face4.jpg" alt="image" class="profile-pic">
                            </div>
                            <div class="preview-item-content flex-grow">
                                <h6 class="preview-subject ellipsis font-weight-normal">David Grey
                                </h6>
                                <p class="font-weight-light small-text text-muted mb-0">
                                    The meeting is cancelled
                                </p>
                            </div>
                        </a>
                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <img src="images/faces/face2.jpg" alt="image" class="profile-pic">
                            </div>
                            <div class="preview-item-content flex-grow">
                                <h6 class="preview-subject ellipsis font-weight-normal">Tim Cook
                                </h6>
                                <p class="font-weight-light small-text text-muted mb-0">
                                    New product launch
                                </p>
                            </div>
                        </a>
                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <img src="images/faces/face3.jpg" alt="image" class="profile-pic">
                            </div>
                            <div class="preview-item-content flex-grow">
                                <h6 class="preview-subject ellipsis font-weight-normal"> Johnson
                                </h6>
                                <p class="font-weight-light small-text text-muted mb-0">
                                    Upcoming board meeting
                                </p>
                            </div>
                        </a>
                    </div>
                    </li>
                    <li class="nav-item dropdown mr-4 d-lg-flex d-none">
                        <a class="nav-link count-indicatord-flex align-item s-center justify-content-center" href="#">
                            <i class="icon-grid"></i>
                        </a>
                    </li>
                    <li class="nav-item dropdown d-flex mr-4 ">
                        <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center" id="notificationDropdown" href="#" data-toggle="dropdown">
                            <i class="icon-cog"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                            <p class="mb-0 font-weight-normal float-left dropdown-header">Settings</p>
                            <a class="dropdown-item preview-item" href="profile.php"><i class="icon-head"></i> Profile</a>
                            <a class="dropdown-item preview-item" href="logout.php"><i class="icon-inbox"></i> Logout</a>
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                    <span class="icon-menu"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <div class="user-profile">
                    <div class="user-image">
                        <img src="images/faces/face28.png">
                    </div>
                    <div class="user-name">
                        Edward Spencer
                    </div>
                    <div class="user-designation">
                        Developer
                    </div>
                </div>
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                            <i class="icon-head menu-icon"></i><span class="menu-title">DashBoard</span><i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="auth">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="home.php">HR DashBoard</a></li>
                                <li class="nav-item"> <a class="nav-link" href="emp_home.php">Employee DashBoard</a></li>
                            </ul>
                        </div>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                            <i class="icon-disc menu-icon"></i><span class="menu-title">DashBoard</span><i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="ui-basic">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="home.php">HR DashBoard</a></li>
                                <li class="nav-item"> <a class="nav-link" href="emp_home.php">Employee DashBoard</a></li>
                            </ul>
                        </div>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link" href="employees.php">
                            <i class="menu-icon icon-head"></i>
                            <span class="menu-title">Employees</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">
                            <i class="fa menu-icon fa-group-arrows-rotate"></i>
                            <span class="menu-title">Societies</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">
                            <i class="fa menu-icon fa-person-digging"></i>
                            <span class="menu-title">Works</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="holidays.php">
                            <i class="fa menu-icon fa-person-walking-luggage"></i>
                            <span class="menu-title">Holidays</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="leaves.php">
                            <i class="fa menu-icon fa-person-walking-arrow-right"></i>
                            <span class="menu-title">Leaves</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="payroll_items.php">
                            <i class="fa menu-icon fa-person-walking-arrow-right"></i>
                            <span class="menu-title">Payroll Items</span>
                        </a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                            <i class="icon-disc menu-icon"></i>
                            <span class="menu-title">Salary</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="ui-basic">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="create_earn.php">Create Earnings</a></li>
                                <li class="nav-item"> <a class="nav-link" href="create_dedu.php">Create Deductions</a></li>
                            </ul>
                        </div>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link" href="salary.php">
                            <i class="fa menu-icon fa-person-walking-arrow-right"></i>
                            <span class="menu-title">Salary</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="designation_setup.php">
                            <i class="fa menu-icon fa-person-walking-arrow-right"></i>
                            <span class="menu-title">Designation Setup</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">
                            <i class="fa menu-icon fa-right-from-bracket"></i>
                            <span class="menu-title">Logout</span>
                        </a>
                    </li>

                    <!-- <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false"
                            aria-controls="ui-basic">
                            <i class="icon-disc menu-icon"></i>
                            <span class="menu-title">UI Elements</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="ui-basic">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link"
                                        href="pages/ui-features/buttons.html">Buttons</a></li>
                                <li class="nav-item"> <a class="nav-link"
                                        href="pages/ui-features/typography.html">Typography</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages/forms/basic_elements.html">
                            <i class="icon-file menu-icon"></i>
                            <span class="menu-title">Form elements</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages/charts/chartjs.html">
                            <i class="icon-pie-graph menu-icon"></i>
                            <span class="menu-title">Charts</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages/tables/basic-table.html">
                            <i class="icon-command menu-icon"></i>
                            <span class="menu-title">Tables</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages/icons/feather-icons.html">
                            <i class="icon-help menu-icon"></i>
                            <span class="menu-title">Icons</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false"
                            aria-controls="auth">
                            <i class="icon-head menu-icon"></i>
                            <span class="menu-title">User Pages</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="auth">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a>
                                </li>
                                <li class="nav-item"> <a class="nav-link" href="pages/samples/login-2.html"> Login 2
                                    </a></li>
                                <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register
                                    </a></li>
                                <li class="nav-item"> <a class="nav-link" href="pages/samples/register-2.html"> Register
                                        2 </a></li>
                                <li class="nav-item"> <a class="nav-link" href="pages/samples/lock-screen.html">
                                        Lockscreen </a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="docs/documentation.html">
                            <i class="icon-book menu-icon"></i>
                            <span class="menu-title">Documentation</span>
                        </a>
                    </li> -->
                </ul>
            </nav>