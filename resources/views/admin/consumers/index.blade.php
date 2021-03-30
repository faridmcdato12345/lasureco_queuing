@extends('layouts.admin')
@section('content')
<div class="container-fluid pt-2">
    <div class="row justify-content-center">
        <div class="col-md-12">
            
            <div class="card">
                <div class="card-header">Consumers</div>
                <div class="card-body">
                    <br />
                    <div class="row input-daterange">
                        <div class="col-md-4">
                            <input type="date" name="from_date" id="from_date" class="form-control" placeholder="From Date"  />
                        </div>
                        <div class="col-md-4">
                            <input type="date" name="to_date" id="to_date" class="form-control" placeholder="To Date"  />
                        </div>
                        <div class="col-md-4">
                            <button type="button" name="filter" id="filter" class="btn btn-primary">Filter</button>
                            <button type="button" name="refresh" id="refresh" class="btn btn-default">Refresh</button>
                        </div>
                    </div>
                    <br />
                    <table id="datatable" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Firstname</th>
                                <th>Lastname</th>
                                <th>Address</th>
                                <th>Gender</th>
                                <th>Age</th>
                                <th>Date of Birth</th>
                                <th>Mobile Number</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script src="{{asset('js/buttons.print.min.js')}}"></script>
<script src="{{asset('js/dataTables.buttons.min.js')}}"></script>
<script>
$(document).ready(function(){
    load_data();
    function load_data(from_date = '', to_date = ''){
        var table = $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('api.consumers.index') }}",
                data:{from_date:from_date, to_date:to_date}
            },
            columns: [
                { data: "firstname", name: "consumers.firstname" },
                { data: "lastname", name: "consumers.lastname" },
                { data: "address", name: "consumers.address" },
                { data: "gender", name: "consumers.gender" },
                { data: "age", name: "consumers.age" },
                { data: "dob", name: "consumers.dob" },
                { data: "phone", name: "consumers.phone" },
                { data: "email", name: "consumers.email" },
            ],
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'print',
                    title: '<h1><strong>LASURECO</strong> - Contact Tracer App</h1>',
                    customize: function ( win ) {
                        $(win.document.body)
                            .css( {'font-size':'10pt','padding':'3%'} );
                        $(win.document.body).find( 'table' )
                            .addClass( 'compact' )
                            .css( 'font-size', 'inherit' );
                    }
                }
            ]
        });
    }
    $('#filter').click(function(){
        var from_date = $('#from_date').val();
        var to_date = $('#to_date').val();
        if(from_date != '' &&  to_date != '')
        {
            $('#datatable').DataTable().destroy();
            load_data(from_date, to_date);
        }
        else
        {
            alert('Both Date is required');
        }
    });
    $('#refresh').click(function(){
        $('#from_date').val('');
        $('#to_date').val('');
        $('#datatable').DataTable().destroy();
        load_data();
    });
});
</script>
@endpush
