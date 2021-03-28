@extends('layouts.admin')
@section('content')
<div class="container-fluid pt-2">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h3>Edit: <span style="text-transform: uppercase">{{$users[0]->name}}</span></h3></div>
                <div class="card-body">
                    @foreach ($users as $user)
                        <form action="{{route('user.update',$user)}}" method="post">
                            @csrf
                            @method('patch')
                            <div class="form-group">
                                <label for="username">Name:</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{$user->name}}">
                            </div>
                            <div class="form-group">
                                <label for="username">Username:</label>
                                <input type="text" name="username" id="username" class="form-control" value="{{$user->username}}">
                            </div>
                            <div class="form-group changePassDiv">
                                <button type="button" id="change_pass" class="btn btn-sm form-control btn-success" style="margin-bottom:5px;">Change password</button>
                            </div>
                            <input type="submit" value="Update" class="btn btn-sm btn-primary form-control" style="margin-bottom: 5px;">
                            <a href="{{route('user.index')}}" class="btn btn-sm btn-danger form-control">Cancel</a>
                        </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
    $(document).ready(function(){
        $('#change_pass').on('click',function(){
            $(this).toggleClass('show')
            if($(this).hasClass('show')){
                $('#change_pass').html('Do not change password')
                $('.changePassDiv').append('<label for="username" id="new_pass_label">New password:</label>')
                $('.changePassDiv').append('<input type="password" name="password" id="password" class="form-control" placeholder="Type the new password here...">')
            }
            else{
                $('#change_pass').html('Change password')
                $('#password').remove()
                $('#new_pass_label').remove()
            }
        });
    });
</script>
@endpush
