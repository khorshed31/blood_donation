<?php

namespace Module\Blood\Controllers;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\User;
use App\Traits\FileSaver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    
    use FileSaver;

    public function index()
    {
        $data['user'] = User::query()->find(auth()->user()->id);

        $data['cities'] = City::get();

        return view('profile.index',$data);                

    }


    public function store(Request $request)
    {


        $user = User::updateOrCreate([
            'id'                   => auth()->user()->id
        ],
        [

                'name'          => $request->name,
                'email'         => $request->email,
                'phone'         => $request->phone,
                'blood_group'   => $request->blood_group,
                'city'          => $request->city,
                'age'           => $request->age,
                'description'   => $request->description,
        ]);

        $this->uploadFileWithResize($request->image, $user ,'image', 'assets/upload/user');

        return redirect()->back();

    }



    public function change_pass(Request $request)
    {

        if ($request->old_password == $request->new_password) {

            if ($request->new_password == $request->confirm_password) {

            User::updateOrCreate([

                'id'                   => auth()->user()->id
            ],
            [
    
                    'password'          => Hash::make($request->new_password) ,
            ]);
                
            }

            else {
                return redirect()->back()->withError('New Password & Confirm Password Not Matched');
            }
            
        }
        else {
            return redirect()->back()->withError('Old Password & New Password Not Matched');
        }

        $user = User::updateOrCreate([
            'id'                   => auth()->user()->id
        ],
        [

                'name'          => $request->name,
                'email'         => $request->email,
                'phone'         => $request->phone,
                'blood_group'   => $request->blood_group,
                'city'          => $request->city,
                'age'           => $request->age,
                'description'   => $request->description,
        ]);

        $this->uploadFileWithResize($request->image, $user ,'image', 'assets/upload/user');

        return redirect()->back()->withMessage('Success!');

    }




}
