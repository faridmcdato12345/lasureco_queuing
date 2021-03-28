<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()->hasRole('cashier')){
            return view('user.cashier.index');
        }elseif(Auth::user()->hasRole('complaint_officer')){
            return view('user.complaint.index');
        }elseif(Auth::user()->hasRole('administrator')){
            return view('admin.dashboard');
        }
    }
}
