<?php

namespace App\Http\Controllers\Admin\Api;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\ComplaintView;
use App\Models\ComplaintConsumer;
use App\Events\ComplaintViewChanged;
use App\Http\Controllers\Controller;

class ComplaintViewController extends Controller
{
    public function getComplaintView(){
        $que = ComplaintView::select('id','number')->whereDate('created_at',Carbon::today())->latest('created_at')->first();
        return response()->json($que,200);
    }
    public function storeComplaintView(Request $request){
        $que = new ComplaintView;
        $que->number = $request->complaint_number;
        $que->save();
        event(new ComplaintViewChanged);
        return response()->json($que,200);
    }
    public function checkId(Request $request){
        $que = ComplaintConsumer::findOrFail($request->complaint_id);
        return response()->json($que,200);
    }
}
