<?php

namespace App\Http\Controllers\Consumer;

use App\Http\Controllers\Controller;
use App\Models\CashierConsumer;
use App\Services\InserQueuingNumberService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CashierConsumerController extends Controller
{
    public function store(){
        $number = (new InserQueuingNumberService())->storeQueuingNumber();
        return redirect()->route('consumer.tracking');
    }
}
