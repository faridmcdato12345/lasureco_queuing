<?php

namespace App\Http\Controllers\Consumer;

use App\Http\Controllers\Controller;
use App\Services\InsertComplaintQueuingNumberService;

class ComplaintConsumerController extends Controller
{
    public function store(){
        $number = (new InsertComplaintQueuingNumberService())->storeQueuingNumber();
        return redirect()->route('consumer.tracking');
    }
}
