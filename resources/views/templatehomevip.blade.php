<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Halaman User VIP</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/punyaadmin.css')}}">
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>

        <style>
            #btnkeluar{
                margin-left: 45px;
            }
            #btnchange{
                margin-left: 5px;
            }
            #atur{
                margin-left: -10%;
            }
        </style>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="{{url('/userVip/video')}}">KITAKAYA</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0" method="POST">
                <div class="input-group">
                    <h3 style="color: white;">Welcome, {{Session::get('nama')}}</h3>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a><button data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary" id="btnchange">Change Password</button></a></li>
                        <br>
                        <li><a href="{{url("/logout")}}"><button class="btn btn-danger" id="btnkeluar">Logout</button></a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Menu User</div>
                            <a class="nav-link" href="{{url('/userVip/video')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-video"></i></div>
                                Video
                            </a>
                            <a class="nav-link" href="{{url('/userVip/forum')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-suitcase"></i></div>
                                Forum
                            </a>
                            <a class="nav-link" href="{{url('/userVip/rekomendasi')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-door-open"></i></div>
                                Rekomendasi Saham
                            </a>
                            <a class="nav-link" href="{{url('/userVip/history')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                History Transaksi
                            </a>
                            <div class="sb-sidenav-menu-heading">Service</div>
                            <a class="nav-link" href="{{url('/userVip/cs')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-headphones"></i></div>
                                Customer Service
                            </a>
                            <a class="nav-link" href="{{url('/userVip/profile')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-user fa-fw"></i></div>
                                My Profile
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        @yield('content')
                    </div>
                </main>
            </div>
        </div>
        {{-- untuk Change Password --}}
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Watchlist</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-0">
                        <div class="container-fluid">
                            <div class="row gy-4">
                                <center>
                                    <div class="col-lg-8">
                                        <form method="POST">
                                            @csrf
                                            <div class="col-lg-6">
                                                <label for="userName" class="form-label">Old Password</label>
                                                <input type="password" class="form-control" id="nama" name="passlama">
                                            </div>
                                            <div class="col-lg-6">
                                                <label class="form-label">New Password</label><br>
                                                <input type="password" class="form-control" name="passbaru">
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="userName" class="form-label">Confirm New Password</label><br>
                                                <input type="password" class="form-control" name="conpass">
                                            </div>
                                            <br>
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary" name="change" data-bs-dismiss="modal">Change Password</button>
                                            </div>
                                            <br>
                                        </form>
                                    </div>
                                </center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script type="text/javascript" src="{{asset('assets/js/scripts.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    </body>
</html>
