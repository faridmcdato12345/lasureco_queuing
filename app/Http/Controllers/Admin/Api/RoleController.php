<?php

namespace App\Http\Controllers\Admin\Api;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    public function getRoles(){
        $query = Role::select('roles.*');
        return datatables($query)->make(true);   
    }
}
