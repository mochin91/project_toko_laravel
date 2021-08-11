<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index()
    {
        $user = User::orderBy('role','DESC')->orderBy('name','ASC')->get();
        return view('user.index',[
            'datas' => $user
        ]);
    }
}
