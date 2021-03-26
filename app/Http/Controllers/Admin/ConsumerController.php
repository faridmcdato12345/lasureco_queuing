<?php

namespace App\Http\Controllers\Admin;

use App\Models\Consumer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConsumerController extends Controller
{
    public function index(){
        $consumers = Consumer::all();
        return view('admin.consumer.index',compact('consumer'));
    }

    public function filterByDate(Request $request){
        $consumers = Consumer::where('create_at',$request->date)->get();
        
    }
}
