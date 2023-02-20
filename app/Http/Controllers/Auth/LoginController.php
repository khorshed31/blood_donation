<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;

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

    protected function validateLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
    }

    public function signin(Request $request)
    {

        $userInfo = User::where('email','=', $request->email)->first();

        if(!$userInfo){
            return back()->withMessage('We do not recognize your email address');
        }else{
            //check password
            if(Hash::check($request->password, $userInfo->password)){

                // $userInfo->update([
                //     'code'  => mt_rand(1111,9999)
                // ]);
                Auth::login($userInfo);

                return redirect()->route('home');
                // \Mail::to($userInfo->email)->send(new \App\Mail\RegisterMail($userInfo));

                // return view('auth.verify', compact('userInfo'));

            }else{  
                return back()->withMessage('Incorrect password');
            }
        }
    }


    


}
