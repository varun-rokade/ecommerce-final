<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminProfileController extends Controller
{
    public function profile()
    {
        $admin = Admin::find(1);
        return view('admin.admin_profile', compact('admin'));
    }

    public function edit()
    {
        $admin = Admin::find(1);
        return view('admin.admin_profile_edit', compact('admin'));
    }

    public function update(Request $request)
    {
        $data = Admin::find(1);
        $data->name = $request->name;
        $data->email = $request->email;
        
        if($request->file('profile_photo_path'))
        {
            $file = $request->file('profile_photo_path');
            unlink(public_path('upload/admin_images/'.$data->profile_photo_path));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'), $filename);
            $data->profile_photo_path = $filename;
        }
        $data->save();
        $notification = array(
            'message' => 'Admin profile updated successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.profile')->with($notification);
    }

    public function changepass()
    {
        $admin = Admin::find(1);
        return view('admin.admin_change_password', compact('admin'));
    }

    public function updatepass(Request $request)
    {
        $validate = $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed',
        ]);

        $hashpass = Admin::find(1)->password;
        if(Hash::check($request->current_password, $hashpass))
        {
            $admin = Admin::find(1);
            $admin->password = Hash::make($request->password);
            $admin->save();
            Auth::logout();
            return redirect()->route('admin.logout');
        }
        else
        {
            return redirect()->back();
        }
    }

    public function allusers()
    {
        $admin = Admin::find(1);
        $users = User::latest()->get();
        return view('backend.users.all_users', compact('users', 'admin'));
    }

    public function edituser($user_id)
    {
        $admin = Admin::find(1);
        $user = User::findOrfail($user_id);
        return view('backend.users.user_edit', compact('user', 'admin'));
    }

    public function updateuser(Request $request)
    {
        $validate = $request->validate([
            'phone' => 'max:10|min:10'
        ]);
        $data = User::findOrfail($request->id);
        $data->name = $request->name;
        $data->phone = $request->phone;
        $data->email = $request->email;
        
        if($request->file('profile_photo_path'))
        {
            $file = $request->file('profile_photo_path');
            unlink(public_path('upload/user_images/'.$data->profile_photo_path));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/user_images'), $filename);
            $data->profile_photo_path = $filename;
        }
        $data->save();
        $notification = array(
            'message' => 'User profile updated successfully',
            'alert-type' => 'success',
        );
    
        return redirect()->route('all.users')->with($notification);
    }

    public function deleteuser($user_id)
    {
        $user = User::findOrfail($user_id);
        $img = $user->profile_photo_path;
        unlink('upload/user_images/'.$img);
        User::findOrfail($user_id)->delete();
        $notification = array(
            'message' => 'User deleted successfully',
            'alert-type' => 'error',
        );
        return redirect()->back()->with($notification);
    }
}
