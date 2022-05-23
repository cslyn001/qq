
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{csrf_token()}}">

  <title>{{$title}} | e-Portfolio</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('assets/css/adminlte.min.css')}}">

  @yield('admin-css')
</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="{{asset('assets/img/cvsulogo.png')}}" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->

      <!--<li class="nav-item">-->
      <!--  <a class="nav-link" data-widget="fullscreen" href="#" role="button">-->
      <!--    <i class="fas fa-expand-arrows-alt"></i>-->
      <!--  </a>-->
      <!--</li>-->
          <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="fas fa-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="{{ url('admin/profile') }}" class="dropdown-item">
            Edit Profile
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item dropdown-footer" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> Logout </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
      </li>
    </ul>
  </nav>

   
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-success elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('/')}}" class="brand-link">
      <img src="{{asset('assets/images/cvsulogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">E-Portfolio</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 mb-3 text-center">
        <div class="image">
            @if ($prof_pic !== NULL)
                <img src="{{ asset('/documents/'.$prof_pic) }}" class="img-circle elevation-2" alt="User Image" style="width: 50%;height:auto;">
                {{-- <div  style="background-image: url()"></div> --}}
            @else
                <img src="{{asset('assets/images/dp.png')}}" class="img-circle elevation-2" alt="User Image " style="width: 60%;height:auto;">
            @endif
        </div>
        
      <br>
          <div class="info">
            <a href="#" class="d-block">{{$student_name}} {{$student_lname}}</a>
          </div>
        </div>




      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="header">MAIN</li>
          <li class="nav-item">
            <a href="{{url('admin/messages')}}" class="nav-link">
              <i class="nav-icon fas fa-comment-alt"></i>
              <p>
                Message
                {{-- <span class="right badge badge-danger">New</span> --}}
              </p>
            </a>
          </li>
          @if(Auth::user()->user_type != 2)
          <li class="nav-item">
            <a href="{{ url('admin/user-list') }}" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                User Management
                {{-- <span class="right badge badge-danger">New</span> --}}
              </p>
            </a>
          </li>
          @endif
          @if(Auth::user()->user_type != 2)
          <li class="nav-item">
            <a href="{{ url('admin/faculty-list') }}" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Faculty Management
                {{-- <span class="right badge badge-danger">New</span> --}}
              </p>
            </a>
          </li>
          @endif
          <li class="nav-item">
            <a href="{{ url('admin/org-list') }}" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Organization Management
                {{-- <span class="right badge badge-danger">New</span> --}}
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('admin/announcements') }}" class="nav-link">
              <i class="nav-icon fas fa-bullhorn"></i>
              <p>
                Announcements
                {{-- <span class="right badge badge-danger">New</span> --}}
              </p>
            </a>
          </li>
          @if(Auth::user()->user_type != 2)
          <li class="nav-item">
            <a href="{{ url('admin/adminreport') }}" class="nav-link">
              <i class="nav-icon fa">&#xf080;</i>

              <p>
                Admin Report
                {{-- <span class="right badge badge-danger">New</span> --}}
              </p>
            </a>
          </li>
          @endif
        <!--  @if(Auth::user()->user_type != 2)-->
        <!--  <li class="nav-item">-->
        <!--    <a href="{{ url('admin/badge') }}" class="nav-link">-->
        <!--      <i class="nav-icon fa">&#xf2c1;</i>-->

        <!--      <p>-->
        <!--       Badge-->
        <!--        {{-- <span class="right badge badge-danger">New</span> --}}-->
        <!--      </p>-->
        <!--    </a>-->
        <!--</i>-->
        <!--    @endif-->
          <li class="header">SETTING</li>
          <li class="nav-item">
            <a href="{{ url('admin/changepassword') }}" class="nav-link">
              <i class="nav-icon fas fa-key"></i>
              <p>
                Change Password
                {{-- <span class="right badge badge-danger">New</span> --}}
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('admin/profile') }}" class="nav-link">
              <i class="nav-icon fas fa-bullhorn"></i>
              <p>
                Edit Profile
                {{-- <span class="right badge badge-danger">New</span> --}}
              </p>
            </a>
          </li>
          <!--<li class="nav-item">-->
          <!--  <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> Logout </a>-->

          <!--  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">-->
          <!--      @csrf-->
          <!--  </form>-->
          <!--</li>-->
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @yield('admin-content')
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2021-2022 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 0.0.1
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('assets/js/adminlte.js')}}"></script>


<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{asset('assets/plugins/jquery-mousewheel/jquery.mousewheel.js')}}"></script>
<script src="{{asset('assets/plugins/raphael/raphael.min.js')}}"></script>
<script src="{{asset('assets/plugins/jquery-mapael/jquery.mapael.min.js')}}"></script>
<script src="{{asset('assets/plugins/jquery-mapael/maps/usa_states.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('assets/plugins/chart.js/Chart.min.js')}}"></script>

<!-- AdminLTE for demo purposes -->
<script src="{{asset('assets/js/demo.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('assets/js/pages/dashboard2.js')}}"></script>

<script src="<?php echo e(asset('assets/js/scripts.js')); ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="<?php echo e(asset('assets/js/tools.js')); ?>"></script>

    <?php if(Session::has('msg')): ?>
        <script>
            $(document).ready(function(){
                Swal.fire('Success!', "<?php echo e(Session::get('msg')); ?>", 'success');
            });
        </script>
    <?php endif; ?>



@yield('admin-js')
</body>
</html>
