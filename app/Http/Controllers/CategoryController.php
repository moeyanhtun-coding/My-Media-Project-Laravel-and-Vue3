<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class CategoryController extends Controller
{
    //
    public function index()
    {
        $categoryList = Category::get();
        return view('admin.category.index', compact('categoryList'));
    }

    // category create
    public function categoryCreate(Request $request)
    {
        $this->validationCheck($request);
        $data = $this->categoryGetData($request);
        Category::create($data);
        $categoryList = Category::get();
        return redirect()->route('admin#category', compact('categoryList'));
    }

    // delete category list
    public function categoryDelete($id)
    {
        Category::where('id', $id)->delete();
        return back()->with(['success' => 'Category List Deleted !']);
    }

    // edit category list
    public function categoryEdit($id)
    {
        $data = Category::where('id', $id)->first();
        $categoryList = Category::get();
        return view('admin.category.edit', compact('data', 'categoryList'));
    }

    // update category list
    public function categoryUpdate(Request $request)
    {
        $this->validationCheck($request);
        $data = $this->categoryGetData($request);
        Category::where('id', $request->categoryID)->update($data);
        return back()->with(['update_success' => 'Category List Updated !']);
    }

    // data search category
    public function categorySearch(Request $request)
    {
        $categoryList = Category::orWhere('title', 'LIKE', '%' . $request->categorySearch . '%')
            ->orWhere('description', 'LIKE', '%' . $request->categorySearch . '%')
            ->get();
        $data = $this->categoryGetData($request);
        return view('admin.category.index', compact('categoryList', 'data'));
    }

    // get data category
    private function categoryGetData($request)
    {
        return [
            'title' => $request->categoryTitle,
            'description' => $request->categoryDescription,
            'created_at' => Carbon::now()->format('Y-m-d'),
            'updated_at' => Carbon::now()->format('Y-m-d'),
        ];
    }

    // get category check valitation
    private function validationCheck($request)
    {
        Validator::make($request->all(), [
            'categoryTitle' => 'required | unique:categories,title',
            'categoryDescription' => 'required'
        ])->validate();
    }
}
