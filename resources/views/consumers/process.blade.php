<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>QUEUING</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
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
    <div id="app">
        <div class="outer">
            <div class="middle">
              <div class="inner">
                <h1 style="text-align: center;font-size:3.25rem;"><strong>SAAN PO KAYO PUPUNTA?</strong></h1>
                <br>
                <button class="btn btn-primary btn-lg btn-block cashier">CASHIER</button>
                <a href="{{route('complaint.consumer.store')}}" class="btn btn-success btn-lg btn-block">COMPLAINT DESK</a>
              </div>
            </div>
        </div>
    </div>
    <div id="error_modal" class="modal fade" aria-modal="true" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-confirm modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <h4>Ooops!</h4>	
                    <p>Nagkaproblema. Subukan nyo po ulit</p>
                    <button class="btn btn-success" data-dismiss="modal">Try Again</button>
                </div>
            </div>
        </div>
    </div>
<script src="{{asset('js/app.js')}}"></script>
<script>
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.cashier').on('click',function(){
            $.ajax({
                url: "{{route('api.cashier')}}",
                type: "post",
                dataType: "json",
                success: function(data){
                    const number = "CA-" + data;
                },
                error: function(e){
                    $('#error_modal').modal('show')
                }
            });
        })
    })
</script>
</body>
</html>
