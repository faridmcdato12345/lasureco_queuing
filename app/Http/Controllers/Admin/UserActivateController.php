<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class UserActivateController extends Controller
{
    public function activate(User $user){
        $user->status = 1;
        $user->save();
        return response()->json(200);
    }
}
