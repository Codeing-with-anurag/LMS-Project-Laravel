<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use App\Models\ResetPassword;
use App\Jobs\SendEmailJob;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;

class ResetPasswordController extends Controller {
    /*
      |--------------------------------------------------------------------------
      | Password Reset Controller
      |--------------------------------------------------------------------------
      |
      | This controller is responsible for handling password reset requests
      | and uses a simple trait to include this behavior. You're free to
      | explore this trait and override any methods you wish to tweak.
      |
     */

use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    public function forgotpassword() {
        return view('admin.forgotpassword');
    }

    public function sendEmailForgotPassword(Request $request) {
        $validator = Validator::make($request->all(), [
                    'email' => 'required|email|max:255',
        ]);
        if ($validator->fails()) {
            return redirect('forgotpassword')
                            ->withErrors($validator, 'forgotpassword')
                            ->withInput();
        }
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return redirect()->route('forgotpassword')->with("error", "Your not Registered User.");
        }
        $token = Crypt::encrypt($request->email);
        ResetPassword::updateOrCreate(["email" => $request->email, 'token' => $token]);
        dispatch(new SendEmailJob([
                    '_blade' => 'forgot',
                    'name' => $user->name,
                    'toemail' => $request->email,
                    'token' => $token,
                    'url' => route('resetpassword', $token)
        ]));
        return redirect()->route('forgotpassword')->with("success", "Your Forgot Password mail has been sent Succefully!");
    }

    public function resetpassword($token) {
        $resetpasswordData = ResetPassword::where('token', $token)->first();
        if (empty($resetpasswordData)) {
            return redirect()->route('login')->with("error", "Your  Reset Password link has been expired.");
        }
        return view('admin.resetpassword', compact('resetpasswordData'));
    }

    public function postResetPassword(Request $request) {
        if ($request->password != $request->confirmpassword) {
            return redirect()->route('resetpassword')->with("error", "Password and Confirm Password has been not match.");
        }
        $email = $request->email;
        User::where('email', $email)->update(["password" => Hash::make($request->password)]);
        ResetPassword::where('email', $email)->delete();
        return redirect()->route('login')->with("success", "Your Password has been Reset Succefully!");
    }

}