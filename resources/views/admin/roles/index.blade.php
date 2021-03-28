@extends('layouts.admin')
@section('content')
<div class="container-fluid pt-2">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="mb-2">
            </div>
            <div class="card">
                <div class="card-header">Roles</div>
                <div class="card-body">
                    <table id="datatable" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Name</th>
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
            "ajax": "{{route('api.roles.index')}}",
            "columns": [
                { data: "display_name", name: "roles.display_name"}
            ]
        });
    })
</script>
@endpush
