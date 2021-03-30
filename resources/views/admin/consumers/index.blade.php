@extends('layouts.admin')
@section('content')
<div class="container-fluid pt-2">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Consumers</div>
                <div class="card-body">
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
<script>
$(document).ready(function(){
    var table = $('#datatable').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "{{ route('api.consumers.index') }}",
        "columns": [
            { data: "firstname", name: "consumers.firstname" },
            { data: "lastname", name: "consumers.lastname" },
            { data: "address", name: "consumers.address" },
            { data: "gender", name: "consumers.gender" },
            { data: "age", name: "consumers.age" },
            { data: "dob", name: "consumers.dob" },
            { data: "phone", name: "consumers.phone" },
            { data: "email", name: "consumers.email" },
        ],
    });
});
</script>
@endpush
