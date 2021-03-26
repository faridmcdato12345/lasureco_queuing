<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    public function index(){
        $users = User::with('roles')->get();
        return view('admin.users.index',compact('users'));
    }
    public function update(UpdateUserRequest $request, User $user){
        $user->update($request->all());
        return redirect()->route('admin.user.index');
    }
    public function destroy(User $user){
        $user->delete();
        return redirect()->route('admin.user.index'); 
    }
}
