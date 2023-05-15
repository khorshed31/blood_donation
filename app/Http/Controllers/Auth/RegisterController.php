<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Module\Blood\Models\OtpCode;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    public $user_phone = 0 ;
    public $user_email = 0 ;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }




    public function index()
    {

        $data['cities'] = City::query()->get();

        return view('auth.register', $data);
    }




    public function store(Request $request)
    {
        $userOTP = OtpCode::create([
            'email'         => $request->email,
            'code'          => mt_rand(1111,9999),
        ]);

        // $request->validate([
        //     'phone' => 'required|exists:users',
        //     'email' => 'required|exists:users',
        // ]);

        if (User::where('phone', '=', $request->phone)->exists() || User::where('email', '=', $request->email)->exists()) {  
            
            return back()->withMessage('Phone or Email Already Register');

        }
        else {
            
            $userInfo = [
                        'name'          => $request->name,
                        'email'         => $request->email,
                        'phone'         => $request->phone,
                        'blood_group'   => $request->blood_group,
                        'city'          => $request->city,
                        'age'           => $request->age,
                        'password'      => Hash::make($request->password),     
                        'code'          => $userOTP->code,    
                    ];    

                    \Mail::to($request->email)->send(new \App\Mail\RegisterMail($userOTP));

                    return view('auth.verify', compact('userOTP','userInfo'));
        }

        
    }





    public function varify(Request $request)
    {

        $userInfo = OtpCode::where('email','=', $request->email)->where('code', $request->code)->first();

        if(!$userInfo){
            return back()->withMessage('Incorrect code');
        }else{
            
            User::create([
                'name'          => $request->name,
                'email'         => $request->email,
                'phone'         => $request->phone,
                'blood_group'   => $request->blood_group,
                'city'          => $request->city,
                'age'           => $request->age,
                'password'      => $request->password,
                'role'          => 'user',
            ]);

            $userInfo->delete();
    
            return redirect()->route('login')->withMessage('Register Success');
        }
    }





    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
