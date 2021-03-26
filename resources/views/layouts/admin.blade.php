<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>QUEUING</title>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <script src="{{asset('js/app.js')}}"></script>
  <style>
    .nav-item {
      font-size:12px;
    }
    @media print
    {
      html, body { height: auto; }
      .dt-print-table,.dt-print-table thead tr:nth-child(1) th,.dt-print-table thead tr:nth-child(2) th {border: 0 none !important;}
      .dt-print-table img{
        width:100px;
        text-align: left !important;
      }
    }
  </style>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper" id="app">
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars" style="color:
          #D50000"></i></a>
      </li>
    </ul>
  </nav>
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="index3.html" class="brand-link">
    <span class="brand-text font-weight-light">QUEUING</span>
    </a>
    <div class="sidebar">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item dashboard">
            <a href="{{route('admin.dashboard')}}" class="nav-link">
              <i class="nav-icon fa fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item dashboard">
            <a href="{{route('admin.users.index')}}" class="nav-link">
              <i class="nav-icon fa fa-tachometer-alt"></i>
              <p>
                Users
              </p>
            </a>
          </li>
          <li class="nav-item dashboard">
            <a href="{{route('admin.roles.index')}}" class="nav-link">
              <i class="nav-icon fa fa-tachometer-alt"></i>
              <p>
                Roles
              </p>
            </a>
          </li>
          <li class="nav-item dashboard">
            <a href="" class="nav-link">
              <i class="nav-icon fa fa-tachometer-alt"></i>
              <p>
                Consumers
              </p>
            </a>
          </li>
          <li class="nav-item form-group">
            <a href="{{ route('logout') }}" class="nav-link btn btn-danger text-white text-left" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            <i class="nav-icon fa fa-sign-out-alt" ></i>
                <p>
                LOGOUT
                </p>
            </a>
          </li>
        <form id="logout-form" action="{{ route('logout') }}" method="POST">
            @csrf
        </form>
        </ul>
      </nav>
      </div>
    </aside>
  <div class="content-wrapper overflow-y-auto">
    @yield('content')
  </div>
  <footer class="main-footer">
    <strong>Copyright &copy; <?php echo date("Y");?> <a href="#">LASURECO - QUEUING</a>.</strong> All rights reserved.
  </footer>
</div>
</body>
<script>
  $(document).ready(function(){
      $('#myTable').DataTable({
          stateSave: true,
      });
  })
</script>
@yield('script')
</html>
