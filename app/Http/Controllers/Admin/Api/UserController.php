<?php

namespace App\Http\Controllers\Admin\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function getUsers(){
        $query = User::with('roles')->select('users.*');
        return datatables($query)
        ->addColumn('roles', function (User $user) {
            return $user->roles->map(function($role){
                return $role->display_name;
            })->implode('<br>');
        })
        ->addColumn('action', function ($user) {
            $buttons = '<button onclick="editUser('.$user->id.')" class="btn btn-sm btn-primary" style="margin-right:5px;"><i class="glyphicon glyphicon-edit"></i> Edit</button>';
            $buttons .= '<button onclick="deleteUser('.$user->id.')" class="btn btn-sm btn-danger" style="margin-right:5px;"><i class="glyphicon glyphicon-delete"></i> Delete</button>';
            $buttons .= $user->status == 1 
            ? '<button onclick="deactivate('.$user->id.')" class="btn btn-sm btn-warning" style="margin-right:5px;"><i class="glyphicon glyphicon-delete"></i> Deactivate</button>' 
            : '<button onclick="activate('.$user->id.')" class="btn btn-sm btn-success" style="margin-right:5px;"><i class="glyphicon glyphicon-delete"></i> Activate</button>';
            return $buttons;
        })
        ->editColumn('status', function (User $user){
            return $user->status == 1 ? 'Active' : 'Inactive';
        })
        ->make(true);   
    }
}
