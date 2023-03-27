<?php

namespace Module\Blood\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AllUserController extends Controller
{
    


    public function index()
    {
        $data['users'] = User::query()->where('id','!=',auth()->user()->id)
                        ->searchByField('blood_group')
                        ->likeSearch('name')
                        ->latest()->paginate(8);

        return view('user.index',$data);                

    }




}
