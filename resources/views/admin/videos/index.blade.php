@extends('layouts.admin')
@section('content')
<div class="container-fluid pt-2">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="mb-2">
            <a href="{{route('video.create')}}" class="btn btn-primary ">Add Video</a>
            </div>
            <div class="card">
                <div class="card-header">Users</div>
                <div class="card-body">
                    <table id="datatable" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Path</th>
                                <th>Action</th>
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
<!--delete modal-->
<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post">
                @csrf
                @method('delete')
                <div class="modal-header">
                    Are you sure you want to delete this Video?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button  type="submit" class="btn btn-danger btn-ok">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
var activate,deactivate,editUser,deleteUser;
$(document).ready(function(){
    var table = $('#datatable').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "{{ route('api.videos.index') }}",
        "columns": [
            { data: "path", name: "videos.path" },
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ]
    });
    //delete user
    deleteUser = function(id){
        var urlUpdate = "{{route('video.destroy',':id')}}";
        urlUpdate = urlUpdate.replace(':id',id);
        $('#confirm-delete form').attr('action',urlUpdate);
        $('#confirm-delete').modal('show');
    }
});
</script>
@endpush
