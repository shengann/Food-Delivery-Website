<?php

namespace App\Http\Controllers;

use App\Models\User;
use ErrorException;
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
        $path = "public/img/userprofile_photo";
        $this->validate($req,[
            'image'=> 'sometimes|nullable|image|mimes:jpeg,jpg,png',
            'name' => 'required|string|min:1|max:255',
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($req->id),],
            'password' => ['sometimes', 'nullable', 'min:8', 'confirmed'],
        ], [
            'image.mimes' => 'The uploaded file must be a JPEG, PNG, or JPG image.',
            'image.image' => 'The uploaded file must be an image.'
        ]);
        $data = User::find($req->id);
        $image = $req->file('image');

        if ($image && $data->image_path) {
            $old_file_path = public_path($path . $data->image_path);
            if (file_exists($old_file_path)) {
                unlink($old_file_path);
            }
        }
        if ($image){
            $filename = uniqid() . '.' . $image->getClientOriginalExtension();
            $image->storeAs($path, $filename);
            $data->image_path = $filename;
        }
                
        $data->name = $req->name;
        $data->email = $req->email;

        if($req->password != null){
            $data->password = Hash::make($req->password);
        }
        
        // Get the new image file and rename it to the same name as the old file
        
    
       
        // Save the new file name to the profile_photo_path column of the user table
        
        
    

        $data->save();
       
        
        $list = DB::table('users')->get();
        

        return redirect('profile/' . $req->id . '/edit');
        

    }

}