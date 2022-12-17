<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class FrontHomeController extends Controller
{
    public function index() {
        return view('front.index');
    }

    /* Student Dashboard */
    public function dashboard(){
        return view('front.dahsboard');
    }
    /* Student Profile */
    public function profile(){
        return view('front.profile');
    }
    /* Student Change Password */
    public function changepassword(){
        return view('front.changepassword');
    }

    /*
     * Update User Password
     */

     public function updatePassword(Request $request) {        
        $validator = Validator::make($request->all(), [
                    'currentpassword' => 'required|max:255',
                    'password' => 'required|max:255',
                    'password_confirmation' => 'required|max:255|same:password',
        ]);
        if ($validator->fails()) {
            return redirect()->route('front.changepassword')->withErrors($validator, 'changepassword')->withInput();
        }
        if (!Hash::check($request->currentpassword, Auth::user()->password)) {            
            return redirect()->route('front.changepassword')->with('error', 'Password and Current Password does not match.');
        }
        if ($request->newpassword != $request->confirmpassword) {
            return redirect()->route('front.changepassword')->with('error', 'New Password and Confirm Password does not match.');
        }
        User::updatePassword($request, Auth::user()->id);
        return redirect()->route('front.changepassword')->with('success', 'Password Change Successfully!');
    }
}
