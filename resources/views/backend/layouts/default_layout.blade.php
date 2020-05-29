<!DOCTYPE html>
<html>
<head>
    @include('backend.includes.head_style')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
    @include('backend.includes.nav')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('backend.includes.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="margin-top: 60px">
    <!-- Content Header (Page header) -->
    @yield('content')
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

    @include('backend.includes.footer')

</div>
<!-- ./wrapper -->

@include('backend.includes.foot_script')
</body>
</html>
