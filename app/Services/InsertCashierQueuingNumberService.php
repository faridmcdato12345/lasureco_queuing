<?php
namespace App\Services;

use Carbon\Carbon;
use App\Models\CashierConsumer;

class InsertCashierQueuingNumberService{

    public function storeQueuingNumber(){
        $number = 0001;
        $lastNumber = CashierConsumer::latest()->first();
        if(!$lastNumber){
            $this->insert($number);
        }
        elseif (Carbon::createFromFormat('Y-m-d H:i:s',$lastNumber->created_at)->format('Y-m-d') != date('Y-m-d')) {
            $this->insert($number);
        }
        else{
            $number = $lastNumber->number;
            $number++;
            $this->insert($number);
        }
        return str_pad($number,4,'0',STR_PAD_LEFT);
    }
    private function insert($number){
        $cashierNumber = new CashierConsumer;
        $number = str_pad($number,4,'0',STR_PAD_LEFT);
        $cashierNumber->number = $number;
        $cashierNumber->save();
    }
}