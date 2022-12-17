<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function index() {
        if(Auth::check()){
            return redirect(route('admin.dashboard'));
        }
        return view('admin.login');
    }
    /* Login Check Authenticate User */
    public function login(Request $request){
        
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255',
            'password' => 'required|min:8',
        ]);
         if ($validator->fails()) {
            
            return redirect('login')
            ->withErrors($validator, 'login')
            ->withInput();
        }  
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();                        
            if($user->email_verified_at && $user->email_verified_at ==null){
                $this->logout($request);
                redirect()->route('login')->with("error","Your are not verified user.");
            }
            if($user->role == 1){
                return redirect()->route('admin.dashboard')->with("success","Welcome To  ". env("APP_NAME"));
            }else{
                redirect()->route('login')->with("error","Your are not authorized user.");
            }
            
        }else{
            return redirect()->back()->with("error","Invalid Email Or Password.");            
        }      
    }

    /*Logout*/
    public function logout(Request $request){
        Auth::logout();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}