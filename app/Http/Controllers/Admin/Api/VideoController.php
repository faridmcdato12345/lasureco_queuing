<?php

namespace App\Http\Controllers\Admin\Api;

use App\Models\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VideoController extends Controller
{
    public function getVideos(){
        $query = Video::select('videos.*');
        return datatables($query)
        ->addColumn('action', function ($user) {
            $buttons = '<button onclick="deleteUser('.$user->id.')" class="btn btn-sm btn-danger" style="margin-right:5px;"><i class="glyphicon glyphicon-delete"></i> Delete</button>';
            return $buttons;
        })
        ->make(true);
    }
}
