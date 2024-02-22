<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ListController extends Controller
{
    //
    public function index()
    {
        return view('admin.list.index');
    }
}
