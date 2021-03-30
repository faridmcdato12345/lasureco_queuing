<?php

namespace App\Http\Controllers\Consumer;

use App\Http\Controllers\Controller;
use App\Models\CashierConsumer;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CashierConsumerController extends Controller
{
    public function store(Request $request){
        $lastNumber = CashierConsumer::latest()->first();
        $d = Carbon::createFromFormat($lastNumber->created_at)->format('Y-m-d');
        dd($d);
        if($lastNumber->created_at == date('Y-m-d')){
            dd('same');
        }
        else{
            dd('not same');
        }
        //dd($lastNumber);
        // CashierConsumer::create($request->only('number'));
        // $this->printNumber();
        // return redirect()->route('consumer.tracking');
    }
    // private function printNumber(){

    // }
}
