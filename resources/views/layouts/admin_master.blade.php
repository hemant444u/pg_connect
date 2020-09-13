<!DOCTYPE html>

<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Admin | Dashboard</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{url('adminlte3/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{url('adminlte3/dist/css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">


  <link rel="stylesheet" href="{{url('adminlte3/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{url('adminlte3/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{url('adminlte3/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{url('adminlte3/plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{url('adminlte3/dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{url('adminlte3/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{url('adminlte3/plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{url('adminlte3/plugins/summernote/summernote-bs4.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    @yield('head')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{url('/')}}" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('/')}}" class="brand-link">
      <img src="{{url('images/logo/pgconnect.png')}}" alt="Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">PGconnect</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="https://cdn.pixabay.com/photo/2020/07/14/13/07/icon-5404125_960_720.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Admin</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{url('admin')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('country.index')}}" class="nav-link {{ request()->is('admin/country*') ? 'active': ''}}">
              <i class="nav-icon fas fa-th"></i>
              <p>Country</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('state.index')}}" class="nav-link {{ request()->is('admin/state*') ? 'active': ''}}">
              <i class="nav-icon fas fa-th"></i>
              <p>State</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('district.index')}}" class="nav-link {{ request()->is('admin/district*') ? 'active': ''}}">
              <i class="nav-icon fas fa-th"></i>
              <p>District</p>
            </a>
          </li>
          <li class="nav-item has-treeview {{ request()->is('admin/owners*') ? 'menu-open': ''}} ">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>PG Owners<i class="right fas fa-angle-left"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('admin/owners/pending')}}" class="nav-link {{ request()->is('admin/owners/pending*') ? 'active': ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pending</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('admin/owners/active')}}" class="nav-link {{ request()->is('admin/owners/active*') ? 'active': ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Active</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('admin/owners/blocked')}}" class="nav-link {{ request()->is('admin/owners/blocked*') ? 'active': ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Blocked</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('admin/owners')}}" class="nav-link {{ request()->is('admin/owners') ? 'active': ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview {{ request()->is('admin/users*') ? 'menu-open': ''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>Users<i class="right fas fa-angle-left"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('admin/users/pending')}}" class="nav-link {{ request()->is('admin/users/pending*') ? 'active': ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pending</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('admin/users/active')}}" class="nav-link {{ request()->is('admin/users/active*') ? 'active': ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Active</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('admin/users/blocked')}}" class="nav-link {{ request()->is('admin/users/blocked*') ? 'active': ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Blocked</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('admin/users')}}" class="nav-link {{ request()->is('admin/users') ? 'active': ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <i class="nav-icon fa fa-clock"></i>
              <p>Logout</p>
            </a>
            
            <form id="logout-form" action="{{url('admin/logout')}}" method="POST" style="display: none;">
              {{csrf_field()}}
            </form>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  
  
    @yield('content')

  
        <!-- Main Footer -->
      <footer class="main-footer">
        <!-- To the right -->
        <div class="float-right d-none d-sm-inline">
          Site under cunstruction
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2014-2021 <a href="{{url('/')}}">PG Connects</a>.</strong> All rights reserved.
      </footer>
</div>
<!-- ./wrapper -->

  <!-- jQuery -->
<script src="{{url('adminlte3/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{url('adminlte3/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{url('adminlte3/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{url('adminlte3/plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{url('adminlte3/plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{url('adminlte3/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{url('adminlte3/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{url('adminlte3/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{url('adminlte3/plugins/moment/moment.min.js')}}"></script>
<script src="{{url('adminlte3/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{url('adminlte3/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{url('adminlte3/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{url('adminlte3/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{url('adminlte3/dist/js/adminlte.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{url('adminlte3/dist/js/pages/dashboard.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{url('adminlte3/dist/js/demo.js')}}"></script>

@yield('script')
</body>

</html>
