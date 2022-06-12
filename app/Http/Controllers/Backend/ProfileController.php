<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    /**
     *  profile view page
     */
    public function profileView()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('backend.user.view_profile', compact('user'));
    }
    /**
     *  profile edit page show
     */
    public function profileEdit()
    {
        $id = Auth::user()->id;
        $edit_data = User::find($id);
        return view('backend.user.edit_profile', compact('edit_data'));
    }
    /***
     *  profile update data
     */
    public function profileUpdate(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'gender' => 'required',
        ]);

        $id = Auth::user()->id;
        $data = User::find($id);

        // image upload
        if ($request->hasFile('image')) {
            @unlink($data->image);
            $image = $request -> file('image');
            $name_gen = hexdec(uniqid()).'.'. $image -> getClientOriginalExtension();
            Image::make($image) -> resize(100,100) -> save('upload/images/user_images/'.$name_gen);
            $save_url = 'upload/images/user_images/'. $name_gen;
            $data->image = $save_url;
        }

        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->gender = $request->gender;
        $data->address = $request->address;
        $data->update();

        $notification = array(
            'message' => 'User Profile Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('profile.view')->with($notification);

    }
    /***
     *  password change view
     */
    public function passwordView()
    {
        $id = Auth::user()->id;
        return view('backend.user.change_password');
    }
    /**
     *  profile password update
     */
    public function passwordUpdate(Request $request)
    {
        $validate_data = $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed',
        ]);

        $hashed_password = Auth::user()->password;
        if(Hash::check($request->old_password, $hashed_password)){
            $id = Auth::user()->id;
            $data = User::find($id);
            $data->password = Hash::make($request->password);
            $data->save();
            Auth::logout();
            $notification = array(
                'message' => 'You are Logged Out',
                'alert-type' => 'success',
            );
            return redirect()->route('login')->with($notification);
        }else{
            return redirect()->back();
        }

    }
}
