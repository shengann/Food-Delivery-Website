<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;


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

    public function select(){
        $list = DB::table('user')->get();
        return $list;
    }
    public function updateUser(Request $req){
        $this->validate($req,[
            // 'profileImage' => 'nullable|image|mimes:jpeg,jpg,png,gif',
            'name' => 'required|string|min:1|max:255',
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($req->id),],
            'password' => ['sometimes', 'nullable', 'min:8', 'confirmed'],
        ]);
        $data = User::find($req->id);
        $data->name = $req->name;
        $data->email = $req->email;
        $data->password = Hash::make($req->password);
        $data->save();
        $list = DB::table('users')->get();
        

        return redirect('profile/' . $req->id . '/edit');
        

    }

}