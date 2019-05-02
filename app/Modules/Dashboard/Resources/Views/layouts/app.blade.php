<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Vendor -->
  <link rel="stylesheet" href="{{ asset('css/vendor/admin-lte.css') }}">
  <!-- Custom CSS -->
  @yield('css')
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <div id="app">
    <!-- Site wrapper -->
    <div class="wrapper">

      @include('dashboard::partials._header')

      <!-- Left side column. contains the sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          @include('dashboard::partials._sidebar')
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- =============================================== -->

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          @yield('content-header')
        </section>

        <section class="content">
          @yield('content')
        </section>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->

      @include('dashboard::partials._footer')

    </div>
    <!-- ./wrapper -->
  </div>

  <!-- Vendor -->
  <script src="{{ asset('js/vendor/admin-lte.js') }}"></script>
  <script>
    $(document).ready(function () {
      $('.sidebar-menu').tree()
    })
  </script>
  <!-- Custom JS -->
  @yield('js')
</body>
</html>
