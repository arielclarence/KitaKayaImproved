<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/punyaadmin.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/addvideo.css')}}">
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>

        <style>
            #btnkeluar{
                margin-left: 45px;
            }
        </style>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="halamanadmin.php">KITAKAYA</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <h3 style="color: white;">Welcome, Admin</h3>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        {{-- @php
                            $user = Session::get('userData')
                        @endphp

                        <li>EXP : {{ $user->exp || 0 }}</li> --}}
                        <li><a href="{{url("/admin/logout")}}"><button class="btn btn-danger" id="btnkeluar">Logout</button></a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Menu Admin</div>
                            <a class="nav-link" href="{{url('/admin/home')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-play-circle"></i></div>
                                Add Video
                            </a>
                            <a class="nav-link" href="{{url('/admin/listvideo')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-video"></i></div>
                                List Video
                            </a>
                            <a class="nav-link" href="{{url('/admin/chart')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Add Rekomendasi Saham
                            </a>

                            <div class="sb-sidenav-menu-heading">Charts</div>
                            <a class="nav-link collapsed" href="{{url('/admin/chartumur')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Chart Umur
                            </a>
                            <a class="nav-link collapsed" href="{{url('/admin/chartperkembangan')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Chart Perkembangan Member
                                <!-- <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div> -->
                            </a>
                            <div class="sb-sidenav-menu-heading">Users</div>
                            <a class="nav-link" href="{{url('/admin/listmember')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                List Member
                            </a>
                            <a class="nav-link" href="{{url('/admin/validasi')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-bell"></i></div>
                                History Pembayaran Member
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                @include('message')
                @yield('content')
                <script type="text/javascript" src="{{asset('assets/js/scripts.js')}}"></script>
                <script type="text/javascript" src="{{asset('assets/js/jquery-3.6.0.min.js')}}"></script>
                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script type="text/javascript" src="{{asset('assets/js/scripts.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script type="text/javascript" src="{{asset('assets/demo/chart-area-demo.js')}}"></script>
        <script type="text/javascript" src="{{asset('assets/demo/chart-bar-demo.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script type="text/javascript" src="{{asset('assets/js/datatables-simple-demo.js')}}"></script>
    </body>
</html>
