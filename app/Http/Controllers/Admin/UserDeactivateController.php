<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserDeactivateController extends Controller
{
    public function deActivate(User $user){
        $user->status = 0;
        $user->save();
        return response()->json(200);
    }
}
