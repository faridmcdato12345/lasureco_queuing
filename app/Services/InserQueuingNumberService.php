<?php
namespace App\Services;

use App\Models\CashierConsumer;

class InserQueuingNumberService{

    public function storeQueuingNumber(){
        $number = 0001;
        $lastNumber = CashierConsumer::latest()->first();
        if(!$lastNumber){
            $this->insert($number);
        }
        elseif ($lastNumber->created_at != date('Y-m-d')) {
            $this->insert($number);
        }
        else{
            $number = $lastNumber->number;
            $number++;
            $this->insert($number);
        }
        return $number;
    }
    private function insert($number){
        $cashierNumber = new CashierConsumer;
        $number = str_pad($number,4,'0',STR_PAD_LEFT);
        $cashierNumber->number = $number;
        $cashierNumber->save();
    }
}