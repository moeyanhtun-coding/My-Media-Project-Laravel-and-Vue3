<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    //get all post
    public function getPost()
    {
        $post = Post::get();
        return response()->json([
            'posts' => $post,
            'message' => 'Post Data'
        ], 200);
    }

    // search post
    public function searchPost(Request $request)
    {
        $data = Post::where('title', 'LIKE', '%' . $request->key . '%')->get();
        return response()->json([
            'searchData' => $data
        ], 200);
    }

    //post detail
    public function detailPost(Request $request)
    {
        $data = Post::where('post_id',$request->key)->first();
        return response()->json([
            'result'=>$data,
        ],200);
    }
}
