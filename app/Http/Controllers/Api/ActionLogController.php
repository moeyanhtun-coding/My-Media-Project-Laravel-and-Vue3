<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ActionLog;
use Illuminate\Http\Request;

class ActionLogController extends Controller
{
    //
    public function getActionLog(Request $request)
    {
        $data = [
            'user_id' => $request->user_id,
            'post_id' => $request->post_id
        ];
        ActionLog::create($data);

        $actionLogData = ActionLog::where('post_id', $request->post_id)->get();

        return response()->json([
            'viewCount' => $actionLogData,
        ], 200);
    }
}
