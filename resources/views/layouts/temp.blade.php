<!DOCTYPE html>
<html lang="en" >

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="{{asset('landing')}}/images/fresh.png">

    <title>Yello Jello Tour!</title>


    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/buttons/2.0.0/css/buttons.dataTables.min.css">

    <!-- Custom fonts for this template-->
    <script src="https://kit.fontawesome.com/fd8370ec87.js" crossorigin="anonymous"></script>
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        table tfoot {
            display: table-row-group;
        }
    </style>
</head>
<body class="hold-transition  sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed ">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__wobble" src="{{asset('landing')}}/images/fresh.png" alt="image" height="300" width="300">
        </div>
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-light navbar-lightblue bg-gradient-lightblue ">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ route('home') }}" class="nav-link">
                        <i class="fas fa-home"></i> Home
                    </a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small text-uppercase ">
                            {{ Auth::user()->name }} </span>
                        @if (Auth::user()->pelanggan)
                            <img src="{{ asset('pp/' . Auth::user()->pelanggan->foto) }}" width="35" height="35"
                                class="rounded-circle">
                        @endif
                    </a>
                    
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        @if (Auth::user()->pelanggan)
                            <a class="dropdown-item" href="{{ route('profile') }}">
                                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                profile
                            </a>
                        @endif
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Log Out
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </a>
                    </div>
                </li>
                      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
                <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>

            </ul>
        </nav>
        
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-light  sidebar-navy bg-gradient-navy elevation-4">
            <!-- Brand Logo -->
            <a href="{{ route('home') }}" class="brand-link text-center">
            <img src="{{asset('landing')}}/images/fresh.png" alt="image" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light" style="color: #ffffff;">Yello Jello Tour!</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar sidebar-dark">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    @if (Auth::user()->pelanggan)
                        <div class="image">
                            <img src="{{ asset('pp/' . Auth::user()->pelanggan->foto) }}" class="img-circle elevation-2"
                                alt="User Image">
                        </div>
                    @endif
                    <div class="info">
                        <a href="" class="d-block">{{ Auth::user()->name }} </a>
                    </div>
                </div>
                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                    <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
                </div>
            </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2 ">
                    
                    <ul class="nav nav-pills  nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item">
                            <a href="{{ route('home') }}"
                                class="nav-link {{ Request::routeIs('home') ? 'active' : '' }}">
                                <i class="fas fa-fw fa-home"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        @if (Auth::user()->level == 'admin')
                            <li class="nav-item">
                                <a href="{{ route('user') }}"
                                    class="nav-link {{ Request::routeIs('user') ? 'active' : '' }}">
                                    <i class="fas fa-fw fa-user-circle "></i>
                                    <p>
                                        Users
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('karyawan') }}"
                                    class="nav-link {{ Request::routeIs('karyawan') ? 'active' : '' }}">
                                    <i class="fas fa-fw fa-users "></i>
                                    <p>
                                        karyawan
                                    </p>
                                </a>
                            </li>
                        @elseif(Auth::user()->level == 'oprator')
                            <li class="nav-item">
                                <a href="{{ route('paket_wisata') }}"
                                    class="nav-link {{ Request::routeIs('paket_wisata') ? 'active' : '' }}">
                                    <i class="fas fa-fw fa-suitcase "></i>
                                    <p>
                                        Paket Wisata
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('daftar_paket') }}"
                                    class="nav-link {{ Request::routeIs('daftar_paket') ? 'active' : '' }}">
                                    <i class="fas fa-fw fa-list-alt"></i>
                                    <p>
                                        Daftar Paket
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('reservasi') }}"
                                    class="nav-link {{ Request::routeIs('reservasi') ? 'active' : '' }}">
                                    <i class="fas fa-fw fa-id-card"></i>
                                    <p>
                                        Reservasi
                                    </p>
                                </a>
                            </li>
                        @elseif(Auth::user()->level == 'pelanggan')
                            <li class="nav-item">
                                <a href="{{ route('reservasi') }}"
                                    class="nav-link {{ Request::routeIs('reservasi') ? 'active' : '' }}">
                                    <i class="fas fa-fw fa-address-card "></i>
                                    <p>
                                        Reservasi
                                    </p>
                                </a>
                            </li>
                        @elseif(Auth::user()->level == 'pemilik')
                            <li class="nav-item">
                                <a href="{{ route('laporan') }}"
                                    class="nav-link {{ Request::routeIs('laporan') ? 'active' : '' }}">
                                    <i class="fa fa-list-alt"></i>
                                    <p>
                                        Laporan
                                    </p>
                                </a>
                            </li>
                        @endif

                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
            
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <main class="py-4">
                @yield('content')
            </main>
        </div>
    </div>

    <footer class="main-footer">
        <strong>Copyright &copy; Ca-tour 2023.</strong>
    </footer>
    <!-- Bootstrap core JavaScript-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.js') }}"></script>

    <script type="text/javascript" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.0/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.print.min.js"></script>

    <!-- Memanggil library JSZip dan PDFMake yang dibutuhkan oleh library Buttons -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.6.0/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.2/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.2/vfs_fonts.js"></script>

    <script>
        $(document).ready(function() {
            $('table:not(#tlaporan)').DataTable();

            $('#tlaporan').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'pdfHtml5',
                    'print'
                ],
                footer: true
            });
        });
    </script>
    @if (session('success'))
        <script>
            $(document).ready(function() {
                Swal.fire({
                    title: 'Sukses!',
                    text: '{{ session('success') }}',
                    icon: 'success'
                });
            });
        </script>
    @endif
    @if ($errors->any())
        <script>
            $(document).ready(function() {
                Swal.fire({
                    title: 'Error!',
                    text: 'Gagal memasukan data',
                    icon: 'error'
                });
            });
        </script>
    @endif
</body>

</html>
