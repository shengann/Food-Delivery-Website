<?php

namespace App\Http\Controllers;

use App\Models\User;
use ErrorException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

use Illuminate\Support\Facades\Storage;


class UserController extends Controller
{
    //this function to find user data based on id
    public function findUser($id){
        $data = User::find($id);
        return view('profile', ['data'=>$data]);
    }
    public function deleteImage($filename, $filedirectory)
    {
        // Check if the file exists
        if (Storage::exists($filedirectory."/". $filename)) {

            // Delete the file
            Storage::delete($filedirectory."/". $filename);
            
            // Optionally, you can also delete the file from the database or perform other actions
            // ...
            
            // Return a success message
            return response()->json(['message' => 'Image deleted successfully.']);
        } else {
            // Return an error message if the file doesn't exist
            return response()->json(['message' => 'Image not found.'], 404);
        }
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
        // dd($image);

        if ($image) {
            $this->deleteImage($data->image_path, $path);
        }
        if ($image!=null){
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