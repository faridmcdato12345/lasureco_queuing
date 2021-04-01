<?php
namespace App\Services;

use App\Models\CashierConsumer;
use App\Models\ComplaintConsumer;

class InsertComplaintQueuingNumberService{

    public function storeQueuingNumber(){
        $number = 0001;
        $lastNumber = ComplaintConsumer::latest()->first();
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
        return str_pad($number,4,'0',STR_PAD_LEFT);
    }
    private function insert($number){
        $complaintNumber = new ComplaintConsumer();
        $number = str_pad($number,4,'0',STR_PAD_LEFT);
        $complaintNumber->number = $number;
        $complaintNumber->save();
    }
}