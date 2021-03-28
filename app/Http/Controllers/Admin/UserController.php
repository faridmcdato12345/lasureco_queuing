<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\UsersDataTable;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Role;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function index(){
        $users = User::with('roles')->get();
        if(session('success_message')){
            Alert::success(session('success_message'));
        }
        return view('admin.users.index',compact('users'));
    }
    public function create(){
        $roles = Role::all();
        return view('admin.users.create',compact('roles'));
    }
    public function store(StoreUserRequest $request){
        $user = User::create($request->all());
        $user->attachRole($request->role_id);
        return redirect()->route('user.index')->withSuccessMessage('User Added Successfully!');
    }
    public function edit($id){
        $users = User::with('roles')->where('id',$id)->get();
        return view('admin.users.edit',compact('users'));
    }
    public function update(UpdateUserRequest $request, User $user){
        $user->update($request->only(['username','name']));
        return redirect()->route('user.index')->withSuccessMessage('User Updated Successfully!');
    }
    public function destroy($id){
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('user.index')->withSuccessMessage('User Deleted!');
    }
    
}
