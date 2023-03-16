<?php


use Module\Blood\Models\IsBloodDonate;

function redirectIfError($error, $with_input = null)
{
    if (request()->dev == 1) {
        throw $error;
    }
    if ($with_input) {
        return redirect()->back()->withInput(request()->except('image'))->withError($error->getMessage());
    }
    return redirect()->back()->withError($error->getMessage());
}




function blood_groups(){

    return ['A+','B+','O+','AB+','A-','B-','O-','AB-'];
    
}


function isAdmin(){

    return auth()->id() == 1 ? true : optional(auth()->user())->role == 'admin'; 
}

function isDonate(){

    return IsBloodDonate::where('created_by',auth()->user()->id)->where('is_blood_donate',1)->first(); 
}




function account($id)
{
    if ($id == 1) {
        return 'Cash';
    } elseif ($id == 2) {
        return 'Bank';
    } else {
        return 'Mobile Wallet';
    }
}
