<?php

namespace App\Http\Controllers\Admin\Api;

use App\Models\CashierConsumer;
use App\Events\CashierQueChanged;
use App\Http\Controllers\Controller;
use App\Http\Resources\CashierConsumerResource;
use App\Services\InsertCashierQueuingNumberService;
use DB;
use Carbon\Carbon;

class CashierConsumerController extends Controller
{
    public function store(){
        $number = (new InsertCashierQueuingNumberService())->storeQueuingNumber();
        if($number){
            event(new CashierQueChanged);
        }
        return response()->json($number,200);
    }
    public function getCashierQue(){
        return CashierConsumerResource::collection(CashierConsumer::select('id','number','status')->where('status',0)->whereDate('created_at',Carbon::today())->get());
    }
    public function getCashierQueOne(){
        $que = CashierConsumer::where('status',0)->whereDate('created_at',Carbon::today())->first();
        return response()->json($que,200);
    }
    public function patchCashier($id){
        $number = CashierConsumer::findOrFail($id);
        $number->status = 1;
        $number->save();
        event(new CashierQueChanged);
        return response()->json($number,200);
    }
}
