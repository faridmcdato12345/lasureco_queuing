<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>QUEUING</title>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <style>
     .outerDiv{
        height: 500px;
        position:relative;
    }
    
    .innerDiv{
        width: 50%;
        height: 290px;
        position:absolute;
        top: 50%;
        left:35%;
        margin-top: -147px;
        margin-left: -144px;
    }
  </style>
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
            <a class="dropdown-item" href="{{ route('logout') }}"
               onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
      </li>
    </ul>
  </nav>
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="index3.html" class="brand-link">
        <span class="brand-text font-weight-light">CASHIER Panel</span>
        </a>
        <!--list of queuing numbers-->
        <div class="sidebar" style="color: white">
            <p><h5>QUEUING NUMBERS:</h5></p>
            <cashier-component route="{{route('api.cashier.get')}}"></cashier-component>
        </div>
    </aside>
  <div class="content-wrapper overflow-y-auto">
    <!--- controller of numbers-->
    <div class="container outerDiv">
      <div class="card justify-content-center text-center innerDiv">
        <div class="card-header">
          <h1><strong>QUEUING NUMBER</strong></h1>
        </div>
        <div class="card-body" style="color:red">
          <h1 style="font-size:3.5rem"><strong></strong></h1>
        </div>
        <div class="card-footer">
          <button type="button" class="btn btn-primary btn-lg form-control" id="nxt-button">NEXT</button>
        </div>
      </div>
    </div>
  </div>
  <footer class="main-footer">
    <strong>Copyright &copy; <?php echo date("Y");?> <a href="#">LASURECO - QUEUING</a>.</strong> All rights reserved.
  </footer>
</div>
<script src="{{asset('js/app.js')}}"></script>
<script>
  $(document).ready(function(){
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    getQueuingNumber()
    $("body").on('click','.start-button',function(){
      getQueuingNumber()
    })
    $("body").on('click','.next-button',function(){
      updateStatusOfCashierConsumer()
      console.log("wtf")
    })
  });
  var getQueuingNumber = function(){
    $.ajax({
      url: "{{route('api.cashier.get.one')}}",
      type: "get",
      dataType: "json",
      success: function(data){
        $('#nxt-button').addClass('next-button').removeClass('start-button')
        $('.card-body').html('<h1><strong>CA-'+data.number+'</strong></h1>')
        $('.card-body').append('<input type="hidden" value='+data.id+' class="cashier_id">')
        $('.next-button').html('NEXT')
        if(data.number == undefined){
          $('.card-body').html('<h2><strong>No Registered Number</strong></h2>')
          $('#nxt-button').addClass('start-button').removeClass('next-button')
          $('.start-button').html('START')
        }
      },
      error: function(error){
        $('.card-body').html('<h2><strong>No Registered Number</strong></h2>')
        $('#nxt-button').addClass('start-button').removeClass('next-button')
        $('.start-button').html('START')
      }
    })
  }
  var updateStatusOfCashierConsumer = function(){
    let cashier_id = $('.cashier_id').val();
    let url = "{{route('api.cashier.update.status',':id')}}"
    var urlUpdate = url.replace(':id',cashier_id)
    $.ajax({
      url: urlUpdate,
      type: "get",
      dataType: "json",
      success: function(data){
        getQueuingNumber()
      }
    });
  }
</script>
</body>
</html>
