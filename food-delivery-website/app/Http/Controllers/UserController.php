<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //this function to find user data based on id
    public function findUser($id){
        $data = User::find($id);
        return view('profile', ['data'=>$data]);
    }


}