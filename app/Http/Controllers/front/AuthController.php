<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use  Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /* Login / Register Page */
    public function login()
    {
        return view('front.login');
    }

    /* Login */
    public function postlogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255',
            'password' => 'required|min:8',
        ]);

        if ($validator->fails()) {
            return redirect('front.login')
                ->withErrors($validator, 'login')
                ->withInput();
        }

        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();
            if ($user->role != config('const.studentRole')) {
                return redirect()->route('front.login')->with("error", "You are not authorized user.");
            }
            return redirect()->route('front.dashboard');
        } else {            
            return redirect()->route('front.login')->with("error", "Invalid Email Or Password.");
        }
    }

    /* Regisert */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:100',
            'email' => 'required|unique:users,email|max:190',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required|same:password'
        ]);
        $message = array(
            'password.confirmed' => 'Password and Confirm Password doesnot match.'
        );
        if ($validator->fails($message)) {
            return redirect()->route('front.login')
                ->withErrors($validator, 'register')
                ->withInput();
        }
        $user = User::where('email', $request->email)->count();
        if ($user > 0) {
            return redirect()->route('front.login')->with("error", "Email is already registered.");
        }
        $user = User::register($request);
        if ($user) {
            return redirect()->route('front.login')->with("success", "You are Register Successfully!");
        } else {
            return redirect()->route('front.login')->with("error", "Some thing went wrong!");
        }
    }

    /*Logout*/
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->regenerateToken();
        return redirect()->route('front.login');
    }
}
