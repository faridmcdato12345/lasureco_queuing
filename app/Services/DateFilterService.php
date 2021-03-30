<?php
namespace App\Services;

use DB;
use App\Models\Consumer;

class DateFilterService {

    public function filterDataTableDate($fromDate,$toDate){
        if(!empty($fromDate)){
            $todate = $toDate;
            $fToDate = date('Y-m-d',strtotime($todate. ' + 1 days'));
            $query = DB::table('consumers')->whereBetween('created_at',array($fromDate,$fToDate));
        }
        else{
            $query = Consumer::select('consumers.*');
        }
        return $query;
    }

}