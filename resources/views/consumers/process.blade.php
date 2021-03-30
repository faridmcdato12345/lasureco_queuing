<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>QUEUING</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{asset('js/app.js')}}"></script>
    <style>
        .center {
            margin: auto;
            width: 50%;
            border: 3px solid green;
            padding: 10px;
            display: block !important;
        }
        .outer {
            display: table;
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            }

            .middle {
            display: table-cell;
            vertical-align: middle;
            }

            .inner {
            margin-left: auto;
            margin-right: auto;
            width: 660px;
            /*whatever width you want*/
            }
            .btn-lg{
                font-size: 3.125rem;
            }
    </style>
</head>
<body>
    <div class="outer">
        <div class="middle">
          <div class="inner">
            <h1 style="text-align: center;font-size:3.25rem;"><strong>SAAN PO KAYO PUPUNTA?</strong></h1>
            <br>
            <a href="{{route('cashier.consumer.store')}}" class="btn btn-primary btn-lg btn-block">CASHIER</a>
            <a href="" class="btn btn-success btn-lg btn-block">COMPLAINT DESK</a>
          </div>
        </div>
    </div>
</body>
</html>
