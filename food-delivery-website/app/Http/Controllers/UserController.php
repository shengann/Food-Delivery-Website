<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use ErrorException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Collection;


class UserController extends Controller
{
    //this function to find user data based on id
    public function findUser($id){
        $data = User::find($id);
        return view('profile', ['data'=>$data]);
    }

    public function showHistory($user_id){
        $data = User::where('id',$user_id)->with('orders', 'orders.shop')->get();
    //    dd($data = User::find($user_id)->getOrder);
        
        // dd($data1 = $data->join('shop','shop.id',"=", "$data.shop_id")
        //         ->select("$data.*","shop.*")
        //         ->get());
        
        // $order_items_list = [];
        // foreach($data as $order){
        //     echo"$order";
        //     $order_items = $order->getOrder_items;
        //     // $order_items_list[] = $order_items;

        //     foreach($order_items as $item){
        //         $product = Product::find($item['product_id']);
        //         // echo "$product";
        //         $data = DB::table('')
        //             ->join('table2', 'table1.id', '=', 'table2.table1_id')
        //             ->select('table1.*', 'table2.column1', 'table2.column2')
        //             ->get();
        //         // return $data;
        //     }

        // }
        // $data = DB::table('order_items')
        //             ->join('orders', 'order_items.order_id', '=', 'orders.id')
        //             ->select('orders.*', 'order_items.*')
        //             ->get();

        // $data = DB::table('orders')
        //             ->join('order_items', 'orders.id', '=', 'order_items.order_id')
        //             ->join('products', 'order_items.product_id', '=', 'products.id')
        //             ->where('orders.user_id', '=', $user_id)
        //             ->select('orders.*', 'order_items.*', 'products.*')
        //             ->get();
        
        return $data;
        
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
            'address' => 'required|max:255',
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
        $data->address = $req->address;
        

        if($req->password != null){
            $data->password = Hash::make($req->password);
        }
        
        // Get the new image file and rename it to the same name as the old file
        
    
       
        // Save the new file name to the profile_photo_path column of the user table
        
        
    

        $data->save();
       
        
        $list = DB::table('users')->get();
        

        return redirect('profile/' . $req->id . '/edit');
        

    }

    public function findUser_api($id)
    {
        $data = User::find($id);
        return $data;
    }

}