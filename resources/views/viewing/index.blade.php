<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>QUEUING VIEWING</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        body:not(.sidebar-mini-md) .content-wrapper, body:not(.sidebar-mini-md) .main-footer, body:not(.sidebar-mini-md) .main-header {
            margin-left: 25%;
        }
        .main-sidebar{
            width: 25%;
            background: yellow;
        }
        .sidebar{
            padding-left: 0rem !important;
            padding-right: 0rem !important;
            overflow-y: hidden !important;
        }
    </style>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper" id="app">
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav m-auto">
      <li class="nav-item">
        <h1>LASURECO</h1>
      </li>
    </ul>
  </nav>
    <aside class="main-sidebar elevation-4">
        <!--list of queuing numbers-->
        <div class="sidebar">
            <div>
                <div class="cashier">
                    <div style="text-align:center;font-size:4rem">
                        <label for="">CASHIER</label>
                    </div>
                    <div style="background:white;color:red;font-size:5rem;text-align:center;height:120px;" class="cashier-number">
                        <cashier-viewing-component route="{{route('api.cashier.view')}}" audiopath="{{asset('audio')}}"></cashier-viewing-component>
                    </div>
                </div>
                <div class="complaint">
                    <div style="text-align:center;font-size:4rem">
                        <label for="">COMPLAINT</label>
                    </div>
                    <div style="background:white;color:red;font-size:5rem;text-align:center;height:120px;" class="complaint-number">
                        <complaint-viewing-component route="{{route('api.complaint.view')}}" audiopath="{{asset('audio')}}"></complaint-viewing-component>
                    </div>
                </div>
            </div>
        </div>
    </aside>
  <div class="content-wrapper overflow-y-hidden">
    <!--- video containers-->
    @foreach ( $videos as $video )
    <video id="myVideo" muted autoplay style="width: 100%">
      <source src="{{asset('videos/'.$video->path)}}" id="mp4Source" type="video/mp4">
    </video>
    @endforeach
  </div>
  <footer class="main-footer">
    <strong>Copyright &copy; <?php echo date("Y");?> <a href="#">LASURECO - QUEUING</a>.</strong> All rights reserved.
  </footer>
</div>
<script src="{{asset('js/app.js')}}"></script>
</body>
</html>
