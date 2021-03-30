<?php

namespace App\Http\Controllers\Admin;

use App\Models\Consumer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreConsumerRequest;

class ConsumerController extends Controller
{
    public function index(){
        return view('admin.consumers.index');
    }
    public function filterByDate(Request $request){
        $consumers = Consumer::where('created_at',$request->date)->get();
    }
    public function store(StoreConsumerRequest $request){
        Consumer::create($request->all());
        return view('consumers.process');
    }
}
