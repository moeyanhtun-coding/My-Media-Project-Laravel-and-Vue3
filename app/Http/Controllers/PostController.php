<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\table;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    //
    public function index()
    {
        $category = Category::get();
        $postList = DB::table('posts')->select('posts.*', 'categories.title as categoryName',)
            ->leftJoin('categories', 'posts.category_id', "=", 'categories.id')->get();
        return view('admin.post.index', compact('postList', 'category'));
    }

    // creat post
    public function postCreate(Request $request)
    {
        $this->postValidationCheck($request);
        $data = $this->postGetData($request);
        if (!empty($request->postImage)) {
            $file = $request->file('postImage');
            $fileName = uniqid() . '_' . $file->getClientOriginalName();
            $file->move(public_path() . '/PostImage', $fileName);
            $data['image'] = $fileName;
        } else {
            $data['image'] = "null";
        }
        Post::create($data);
        return back();
    }

    // delet post
    public function postDelete($id)
    {
        $data = Post::where('post_id', $id)->first();
        $fileName = $data['image'];
        if (File::exists(public_path() . '/PostImage/' . $fileName)) {
            File::delete(public_path() . '/PostImage/' . $fileName);
        }
        Post::where('post_id', $id)->delete($data);
        return back()->with(['success' => 'Delete Completed']);
    }
    // get data post
    private function postGetData($request)
    {
        return [
            'title' => $request->postTitle,
            'description' => $request->postDescription,
            'category_id' => $request->postCategory,
            'created_at' => Carbon::now()->format('Y-m-d'),
            'updated_at' => Carbon::now()->format('Y-m-d'),
        ];
    }

    private function postValidationCheck($request)
    {
        $request->validate([
            'postTitle' => 'required|unique:posts,title',
            'postDescription' => 'required',
            'postCategory' => 'required'
        ]);
    }
}
