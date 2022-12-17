<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Services\CommonService;

class HomeController extends Controller {

    protected $service;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(CommonService $userService) {
        $this->middleware('auth');
        $this->service = $userService;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dashboard() {
        if (Auth::user()) {
            $data['totalExam'] = $this->service->totalExam();
            $data['totalPlan'] = $this->service->totalPlan();
            $data['totalSubject'] = $this->service->totalSubject();
            $data['totalTest'] = $this->service->totalTest();
            $data['totalCountry'] = $this->service->totalCountry();
            $data['totalState'] = $this->service->totalState();
            return view('admin.dashboard', compact('data'));
        } else {
            Auth::logout();
            return redirect(route('login'));
        }
    }

    /*
     * Admin Profile
     */

    public function profile() {
        $user = User::find(Auth::user()->id);
        return view('admin.profile', compact('user'));
    }

    /*
     * Update User Profile
     */

    public function updateProfile(Request $request) {
        $validator = Validator::make($request->all(), [
                    'name' => 'required|max:255',
        ]);
        if ($validator->fails()) {
            return redirect('admin/profile')->withErrors($validator, 'profile')->withInput();
        }
        User::updateProfile($request, Auth::user()->id);
        return redirect()->route('admin.profile')->with('success', 'Profile Update Successfully!');
    }

    /*
     * Update User Password
     */

    public function updatePassword(Request $request) {
        $validator = Validator::make($request->all(), [
                    'currentpassword' => 'required|max:255',
                    'newpassword' => 'required|max:255',
                    'password_confirmation' => 'required|max:255|same:newpassword',
        ]);
        if ($validator->fails()) {
            return redirect('admin/profile')->withErrors($validator, 'changepassword')->withInput();
        }
        if (!Hash::check($request->currentpassword, Auth::user()->password)) {
            return redirect()->route('admin.profile')->with('error', 'Password and Current Password does not match.');
        }
        if ($request->newpassword != $request->password_confirmation) {
            return redirect()->route('admin.profile')->with('error', 'New Password and Confirm Password does not match.');
        }
        User::updatePassword($request, Auth::user()->id);
        return redirect()->route('admin.profile')->with('success', 'Password Change Successfully!');
    }

}
