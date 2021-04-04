<?php

namespace App\Http\Controllers\Admin\Api;


use App\Models\ComplaintConsumer;
use App\Events\ComplaintQueChanged;
use App\Http\Controllers\Controller;
use App\Http\Resources\ComplaintConsumerResource;
use App\Services\InsertComplaintQueuingNumberService;
use Carbon\Carbon;

class ComplaintConsumerController extends Controller
{
    public function store(){
        $number = (new InsertComplaintQueuingNumberService())->storeQueuingNumber();
        if($number){
            event(new ComplaintQueChanged);
        }
        return response()->json($number,200);
    }
    public function getComplaintQue(){
        return ComplaintConsumerResource::collection(ComplaintConsumer::select('id','number','status')->where('status',0)->get());
    }
    public function getComplaintQueOne(){
        $que = ComplaintConsumer::where('status',0)->whereDate('created_at',Carbon::today())->first();
        return response()->json($que,200);
    }
    public function patchComplaint($id){
        $number = ComplaintConsumer::findOrFail($id);
        $number->status = 1;
        $number->save();
        event(new ComplaintQueChanged);
        return response()->json($number,200);
    }
    public function patchComplaintonGoing($id){
        $number = ComplaintConsumer::findOrFail($id);
        $number->on_going = 1;
        $number->save();
        event(new ComplaintQueChanged);
        return response()->json($number,200); 
    }
}
