@extends('layouts.admin')
@section('content')
<div class="container-fluid pt-2">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="mb-2">
            <a href="" class="btn btn-primary">Add User</a>
            </div>
            <div class="card">
                <div class="card-body">
                    <table id="myTable" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <input type="hidden" value="{{$user->id}}" id="user_id">
                                    <td>{{$user->username}}</td>
                                    <td>{{$user->roles->name}}</td>
                                    <td>
                                        @if ($user->status == 1)
                                            ACTIVE
                                        @else
                                            INACTIVE
                                        @endif
                                    </td>
                                    <td class="text-nowrap">
                                        @if ($user->status == 1)
                                            <a href="javascript:void(0)" class="edit btn btn-danger btn-sm userInActive">In Active</a>
                                        @else
                                            <a href="javascript:void(0)" class="edit btn btn-primary btn-sm userActive">Active</a>
                                           
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
