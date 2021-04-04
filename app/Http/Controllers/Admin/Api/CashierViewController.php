<?php

namespace App\Http\Controllers\Admin\Api;

use Carbon\Carbon;
use App\Models\CashierView;
use Illuminate\Http\Request;
use App\Models\CashierConsumer;
use App\Events\CashierViewChanged;
use App\Http\Controllers\Controller;

class CashierViewController extends Controller
{
    public function getCashierView(){
        $que = CashierView::select('id','number')->whereDate('created_at',Carbon::today())->latest('created_at')->first();
        return response()->json($que,200);
    }
    public function storeCashierView(Request $request){
        $que = new CashierView;
        $que->number = $request->cashier_number;
        $que->save();
        event(new CashierViewChanged);
        return response()->json($que,200);
    }
    public function checkId(Request $request){
        $que = CashierConsumer::findOrFail($request->cashier_id);
        return response()->json($que,200);
    }
}
