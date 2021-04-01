<?php

namespace App\Http\Controllers\Admin\Api;

use App\Models\CashierConsumer;
use App\Events\CashierQueChanged;
use App\Http\Controllers\Controller;
use App\Http\Resources\CashierConsumerResource;
use App\Services\InsertCashierQueuingNumberService;
use DB;

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
        return CashierConsumerResource::collection(CashierConsumer::all());
    }
    public function getCashierQueOne(){
        $que = CashierConsumer::where('status',0)->first();
        return response()->json($que,200);
    }
}
