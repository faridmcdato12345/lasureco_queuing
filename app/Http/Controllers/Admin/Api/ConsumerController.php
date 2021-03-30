<?php

namespace App\Http\Controllers\Admin\Api;

use App\Http\Controllers\Controller;
use App\Models\Consumer;
use App\Services\DateFilterService;
use Illuminate\Http\Request;
use DB;

class ConsumerController extends Controller
{
    public function getConsumers(Request $request){
        if(request()->ajax()){
            $query = (new DateFilterService())->filterDataTableDate($request->from_date,$request->to_date);
        }
        return datatables($query)->make(true);  
    }
}
