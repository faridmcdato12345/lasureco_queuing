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
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper" id="app">
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars" style="color:
          #D50000"></i></a>
      </li>
      <li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            {{ Auth::user()->name }}
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('user.profile') }}">Profile</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST">
              @csrf
              <button type="submit" class="dropdown-item">
                {{ __('Logout') }}
              </button>
            </form>
        </div>
      </li>
    </ul>
  </nav>
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="index3.html" class="brand-link">
    <span class="brand-text font-weight-light">QUEUING Admin Panel</span>
    </a>
    <div class="sidebar">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item dashboard">
            <a href="{{route('dashboard')}}" class="nav-link">
              <i class="nav-icon fa fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item dashboard">
            <a href="{{route('user.index')}}" class="nav-link">
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
            <a href="{{route('admin.consumers.index')}}" class="nav-link">
              <i class="nav-icon fa fa-tachometer-alt"></i>
              <p>
                Consumers
              </p>
            </a>
          </li>
          
        </ul>
      </nav>
      </div>
    </aside>
  <div class="content-wrapper overflow-y-auto">
    @include('sweetalert::alert')
    @yield('content')
  </div>
  <footer class="main-footer">
    <strong>Copyright &copy; <?php echo date("Y");?> <a href="#">LASURECO - QUEUING</a>.</strong> All rights reserved.
  </footer>
</div>
</body>
<script>
$.ajaxSetup({
  headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
var url = window.location;
$('ul.nav-sidebar a').filter(function() {
    return this.href == url;
}).addClass('active');
</script>
@stack('scripts')
</html>
