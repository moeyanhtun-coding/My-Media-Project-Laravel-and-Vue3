<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use function PHPSTORM_META\map;

class CategoryController extends Controller
{
    //
    public function getCategory()
    {
        $category = Category::get();
        return response()->json([
            'category' => $category,
            'message' => 'get Category Data'
        ], 200);
    }

    // serach category
    public function searchCategory(Request $request)
    {
        $data = Post::select('posts.*')
            ->join('categories', 'posts.category_id', 'categories.id')
            ->where('categories.title','LIKE','%'.$request->key.'%')->get();
        return response()->json([
            'result' => $data
        ], 200);
    }
}
