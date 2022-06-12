<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     *  show user view
     */
    public function userView()
    {
        $all_data = User::all();
        return view('backend.user.view_user', compact('all_data'));
    }
    /**
     * add new user
     */
    public function userAdd()
    {
        return view('backend.user.add_user');
    }
    /**
     *  store user data
     */
    public function userStore(Request $request)
    {
        $request->validate([
            'email'     => 'required|unique:users',
            'user_type'      => 'required',
            'name'      => 'required',
            'password'  => 'required',
        ]);
        $data = new User();
        $data->user_type = $request->user_type;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = Hash::make($request->password);
        $data->save();

        $notification = array(
            'message'   => 'User Inserted Successfully',
            'alert-type'   => 'success'
        );

        return redirect()->route('user.view')->with($notification);
    }
    /**
     * edit user data
     */
    public function userEdit($id)
    {
        $edit_data = User::find($id);
        return view('backend.user.edit_user', compact('edit_data'));
    }
    /**
     *  user update data
     */
    public function userUpdate(Request $request, $id)
    {
        $request->validate([
            'email'     => 'required',
            'user_type'      => 'required',
            'name'      => 'required'
        ]);

        $user = User::find($id);
        $user->user_type = $request->user_type;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->update();

        $notification = array(
            'message'   => 'User Updated Successfully',
            'alert-type'   => 'info'
        );

        return redirect()->route('user.view')->with($notification);
    }
    /**
     *  delete user data
     */
    public function userDelete($id)
    {
        $user = User::find($id);
        $user->delete();

        $notification = array(
            'message'   => 'User Deleted Successfully',
            'alert-type'   => 'info'
        );
        return redirect()->route('user.view')->with($notification);
    }
}
