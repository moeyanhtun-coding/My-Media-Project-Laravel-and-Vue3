<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use SebastianBergmann\Complexity\Complexity;

class ListController extends Controller
{
    //
    public function index()
    {
        $data = User::get();
        return view('admin.list.index', compact('data'));
    }

    // account delete
    public function accountDelete($id)
    {
        User::where('id', $id)->delete();
        return back();
    }

    // account search
    public function accountSearch(Request $request)
    {
        $data = User::orWhere('name', 'LIKE', '%' . $request->adminSearch . '%')
            ->orWhere('address', 'LIKE', '%' . $request->adminSearch . '%')
            ->orWhere('phone', 'LIKE', '%' . $request->adminSearch . '%')
            ->orWhere('gender', 'LIKE', '%' . $request->adminSearch . '%')->get();
        return view('admin.list.index', compact('data'));
    }
}
