<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href={{ asset('AdminLTE-3.2.0/dist/css/adminlte.min.css?v=3.2.0') }}>
    <link rel="stylesheet" href={{ asset('AdminLTE-3.2.0/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}>
    <link rel="stylesheet"
        href={{ asset('AdminLTE-3.2.0/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}>
    <link rel="stylesheet" href={{ asset('AdminLTE-3.2.0/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('AdminLTE-3.2.0/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('AdminLTE-3.2.0/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{  asset('AdminLTE-3.2.0/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{  asset('AdminLTE-3.2.0/plugins/jqvmap/jqvmap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{  asset('AdminLTE-3.2.0/dist/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('AdminLTE-3.2.0/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{  asset('AdminLTE-3.2.0/plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('AdminLTE-3.2.0/plugins/summernote/summernote-bs4.min.css') }}">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{ asset('AdminLTE-3.2.0/dist/img/logo_hrm.png') }}" alt="AdminLTELogo" height="100" width="100">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      {{-- <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> --}}
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
      <li class="nav-item">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="btn btn-danger" type="submit">Logout</button>
        </form>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('items.index') }}" class="brand-link d-flex justify-content-center align-items-center">
      <img src="{{ asset('AdminLTE-3.2.0/dist/img/logo_hrm.png') }}" alt="AdminLTE Logo" class="img-circle elevation-3" height="50" style="opacity: .8">
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('AdminLTE-3.2.0/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item {{ ($activePage == 'dashboard') ? 'menu-open' : '' }}">
            <a href="{{ route('home') }}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                {{-- <i class="right fas fa-angle-left"></i> --}}
              </p>
            </a>
          </li>
            <li class="nav-item {{ ($activePage == 'profile') ? 'menu-open' : '' }}">
            <a href="{{ route('profiles.index') }}" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Profile
                {{-- <span class="right badge badge-danger">New</span> --}}
              </p>
            </a>
          </li>
          </li>
            <li class="nav-item {{ ($activePage == 'pos') ? 'menu-open' : '' }}">
            <a href="https://bazzar.hrmsanur.my.id" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                POS SYSTEM
                {{-- <span class="right badge badge-danger">New</span> --}}
              </p>
            </a>
          </li>
          @if (Auth::user()->id_role == 1)
              <li class="nav-item {{ ($activePage == 'user') ? 'menu-open' : '' }}">
            <a href="{{ route('users.index') }}" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                User
                {{-- <span class="right badge badge-danger">New</span> --}}
              </p>
            </a>
          </li>
          <li class="nav-item {{ ($activePage == 'items') ? 'menu-open' : '' }}">
            <a href="{{ route('items.index') }}" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Items
                {{-- <span class="right badge badge-danger">New</span> --}}
              </p>
            </a>
          </li>
          <li class="nav-item {{ ($activePage == 'inout') ? 'menu-open' : '' }}">
            <a href="{{ route('inout.index') }}" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Items In & Out
                {{-- <span class="right badge badge-danger">New</span> --}}
              </p>
            </a>
          </li>
          <li class="nav-item {{ ($activePage == 'cart') ? 'menu-open' : '' }}">
            <a href="{{ route('cart.index') }}" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Cart
                {{-- <span class="right badge badge-danger">New</span> --}}
              </p>
            </a>
          </li>
         
          <li class="nav-item {{ ($activePage == 'checkout') ? 'menu-open' : '' }}">
            <a href="{{ route('checkout.index') }}" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Checkout
                {{-- <span class="right badge badge-danger">New</span> --}}
              </p>
            </a>
          </li>
          <li class="nav-item {{ ($activePage == 'supplier') ? 'menu-open' : '' }}">
            <a href="{{ route('suppliers.index') }}" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Supplier
                {{-- <span class="right badge badge-danger">New</span> --}}
              </p>
            </a>
          </li>
            <li class="nav-item {{ ($activePage == 'category') ? 'menu-open' : '' }}">
            <a href="{{ route('category.index') }}" class="nav-link">
              <i class="nav-icon fas fa-user {{ ($activePage == 'category') ? 'menu-open' : '' }}"></i>
              <p>
                Category
                {{-- <span class="right badge badge-danger">New</span> --}}
              </p>
            </a>
          </li>
          @endif 

          {{-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Layout Options
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/layout/top-nav.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Top Navigation</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Top Navigation + Sidebar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/layout/boxed.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Boxed</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/layout/fixed-sidebar.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Fixed Sidebar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/layout/fixed-sidebar-custom.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Fixed Sidebar <small>+ Custom Area</small></p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/layout/fixed-topnav.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Fixed Navbar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/layout/fixed-footer.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Fixed Footer</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/layout/collapsed-sidebar.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Collapsed Sidebar</p>
                </a>
              </li>
            </ul>
          </li>  --}}
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
        @yield('content')   
    </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2024 <a href="https://adminlte.io">HRM Masjid Al-Ihsaan Sanur</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

    <script src={{ asset('AdminLTE-3.2.0/plugins/jquery/jquery.min.js') }}></script>

    <script src={{ asset('AdminLTE-3.2.0/plugins/bootstrap/js/bootstrap.bundle.min.js') }}></script>

    <script src={{ asset('AdminLTE-3.2.0/dist/js/adminlte.min.js?v=3.2.0') }}></script>

    <script src={{ asset('AdminLTE-3.2.0/plugins/datatables/jquery.dataTables.min.js') }}></script>
    <script src={{ asset('AdminLTE-3.2.0/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}></script>
    <script src={{ asset('AdminLTE-3.2.0/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}></script>
    <script src={{ asset('AdminLTE-3.2.0/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}></script>
    <script src={{ asset('AdminLTE-3.2.0/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}></script>
    <script src={{ asset('AdminLTE-3.2.0/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}></script>
    <script src={{ asset('AdminLTE-3.2.0/plugins/jszip/jszip.min.js') }}></script>
    <script src={{ asset('AdminLTE-3.2.0/plugins/pdfmake/pdfmake.min.js') }}></script>
    <script src={{ asset('AdminLTE-3.2.0/plugins/pdfmake/vfs_fonts.js') }}></script>
    <script src={{ asset('AdminLTE-3.2.0/plugins/datatables-buttons/js/buttons.html5.min.js') }}></script>
    <script src={{ asset('AdminLTE-3.2.0/plugins/datatables-buttons/js/buttons.print.min.js') }}></script>
    <script src={{ asset('AdminLTE-3.2.0/plugins/datatables-buttons/js/buttons.colVis.min.js') }}></script>

    <script src={{ asset('AdminLTE-3.2.0/plugins/summernote/summernote-bs4.min.js') }}></script>

    <script src={{ asset('AdminLTE-3.2.0/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@stack('scripts')
</body>
</html>
