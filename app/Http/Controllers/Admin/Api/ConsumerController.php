<?php

namespace App\Http\Controllers\Admin\Api;

use App\Http\Controllers\Controller;
use App\Models\Consumer;
use Illuminate\Http\Request;

class ConsumerController extends Controller
{
    public function getConsumers(){
        $query = Consumer::select('consumers.*');
        return datatables($query)->make(true);  
    }
}
