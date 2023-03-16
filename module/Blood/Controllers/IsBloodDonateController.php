<?php

namespace Module\Blood\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Module\Blood\Models\BloodDonate;
use Module\Blood\Models\IsBloodDonate;

class IsBloodDonateController extends Controller
{
    

    public function store(Request $request)
    {
        IsBloodDonate::updateOrCreate(
            [
                'created_by'        => auth()->user()->id
            ]
            ,[

                'date'                  => $request->date,
                'is_blood_donate'       => 1,
        ]);

        BloodDonate::create([
            'date'                  => $request->date,
        ]);

        return redirect()->back();

    }

}
