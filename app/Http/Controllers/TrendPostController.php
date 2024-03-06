<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\ActionLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TrendPostController extends Controller
{
    //
    public function index()
    {
        $data = ActionLog::select('posts.*', 'action_logs.*', DB::raw('COUNT(action_logs.post_id) as view_count'))
            ->leftJoin('posts', 'posts.post_id', '=', 'action_logs.post_id')
            ->groupBy('action_logs.post_id')
            ->get();

        return view('admin.trend_post.index', compact('data'));
    }

    // trend post detail
    public function getData($id)
    {
        $data = Post::where('post_id', $id)->first();
        return view('admin.trend_post.detail', compact('data'));
    }
}
