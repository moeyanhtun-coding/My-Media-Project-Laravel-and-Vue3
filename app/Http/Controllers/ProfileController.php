<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    //
    public function index()
    {
        $data = User::where('id', Auth::user()->id)->first();
        return view('admin.profile.index', compact('data'));
    }

    // update admin update
    public function updateAdminProfile(Request $request)
    {
        $this->validationCheck($request);
        $data = $this->updateData($request);
        User::where('id', Auth::user()->id)->update($data);
        return back()->with(['update_success' => 'Admin Account Updated !']);
    }

    // password change page
    public function passwordChnage()
    {
        return view('admin.profile.changePassword');
    }
    // change admin password
    public function changePassword(Request $request)
    {
        $this->validationPassword($request);
        $data = User::where('id', Auth::user()->id)->first();
        $oldPassword = $data->password;
        if (Hash::check($request->oldPassword, $oldPassword)) {
            $data = [
                'password' => Hash::make($request->newPassword),
            ];
            User::where('id', Auth::user()->id)->update($data);
            return redirect()->route('admin#profile')->with('success', 'Password Changed');
        } else {
            return back()->with('notMatch', 'The Old Password not Match. Try again..');
        }
    }

    //  update admin get data
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

    // validation check get data
    private function validationCheck($request)
    {
        return Validator::make(
            $request->all(),
            [
                'name' => ['required', Rule::unique('users')->ignore(Auth::user()->id)],
                'email' => ['required', Rule::unique('users')->ignore(Auth::user()->id)],
            ]
        )->validate();
    }

    // validation check password
    private function validationPassword($request)
    {
        return Validator::make($request->all(), [
            'oldPassword' => ['required', 'min:8'],
            'newPassword' => ['required', 'min:8'],
            'confirmPassword' => ['required', 'min:8', 'same:newPassword'],
        ])->validate();
    }
}
