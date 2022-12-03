<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Customer Service</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/punyaadmin.css')}}">
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <style>
        #btnkeluar{
            margin-left: 45px;
        }
        .rate{

        border-bottom-right-radius: 12px;
        border-bottom-left-radius: 12px;

        }

        .rating {
        display: flex;
        flex-direction: row-reverse;
        justify-content: center;
        margin-right: 72%;
        }

        .rating>input {
        display: none
        }

        .rating>label {
        position: relative;
        width: 1em;
        font-size: 30px;
        font-weight: 300;
        color: #FFD600;
        cursor: pointer
        }

        .rating>label::before {
        content: "\2605";
        position: absolute;
        opacity: 0
        }

        .rating>label:hover:before,
        .rating>label:hover~label:before {
        opacity: 1 !important
        }

        .rating>input:checked~label:before {
        opacity: 1
        }

        .rating:hover>input:checked~label:before {
        opacity: 0.4
        }

        .ratingg {
        display: flex;
        flex-direction: row-reverse;
        justify-content: center;
        margin-right: 70%;
        }

        .ratingg>input {
        display: none
        }

        .ratingg>label {
        position: relative;
        width: 1em;
        font-size: 30px;
        font-weight: 300;
        color: #FFD600;
        cursor: pointer
        }

        .ratingg>label::before {
        content: "\2605";
        position: absolute;
        opacity: 0
        }

        .ratingg>label:hover:before,
        .ratingg>label:hover~label:before {
        opacity: 1 !important
        }

        .ratingg>input:checked~label:before {
        opacity: 1
        }

        .ratingg:hover>input:checked~label:before {
        opacity: 0.4
        }
    </style>
</head>
<body class="sb-nav-fixed">
    {{-- done --}}
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="halamancs.php">KITAKAYA</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <h3 style="color: white;">Welcome, Customer Service</h3>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="{{url("/logoutCs")}}">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Customer Service Menu</div>
                        <a class="nav-link" href="{{url('/cs/listcs')}}">
                            <div class="sb-nav-link-icon"><i class="far fa-comment-dots"></i></div>
                            Chat
                        </a>
                        <a class="nav-link" href="{{url('/cs/forum')}}">
                            <div class="sb-nav-link-icon"><i class="fas fa-suitcase"></i></div>
                            Forum
                        </a>
                        <a class="nav-link" href="{{url('/cs/historycs')}}">
                            <div class="sb-nav-link-icon"><i class="fas fa-suitcase"></i></div>
                            History
                        </a>
                    </div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            @yield('content')
            <script type="text/javascript" src="{{asset('assets/js/scripts.js')}}"></script>
            <script type="text/javascript" src="{{asset('assets/js/jquery-3.6.0.min.js')}}"></script>
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script type="text/javascript" src="{{asset('assets/js/scripts.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
</body>
</html>
