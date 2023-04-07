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

    public function editProfile($id){
        $data = User::find($id);
        return view('editprofile', ['data' => $data]);
    }
    public function validateForm(Request $request){
        $this->validate($request,[
            'profileImage' => 'nullable|image|mimes:jpeg,jpg,png,gif',
            'name' => 'required|string|min:1|max:255',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

    }

}