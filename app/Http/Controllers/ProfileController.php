<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    //
    public function index()
    {
        $data = User::where('id', Auth::user()->id)->first();
        return view('admin.profile.index', compact('data'));
    }
    public function updateAdminProfile(Request $request)
    {
        $data = $this->updateData($request);
        User::where('id', Auth::user()->id)->update($data);
        return back()->with(['update_success' => 'Admin Account Updated !']);
    }
    private function updateData($request)
    {
        return [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'address' => $request->address,
            'updated_at' => Carbon::now()
        ];
    }
}
