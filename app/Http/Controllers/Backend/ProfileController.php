<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index(){

        $admin=Admin::find(1);
        return view('admin.profile.index',compact('admin'));

    }

    public function edit(){

        $admin=Admin::find(1);
        return view('admin.profile.edit',compact('admin'));

    }

    public function update(Request $request){

        $user=Admin::find(1);
        $user->name=$request->name;
        $user->email=$request->email;
        if($request->file('profile_photo_path')){
            $file=$request->file('profile_photo_path');
             unlink(public_path('storage/profile-photos/'.$user->profile_photo_path));
            $fileName=date('YmdHi').'.'.$file->getClientOriginalExtension();
            $file->move(public_path('storage/profile-photos'),$fileName);
            $user['profile_photo_path']=$fileName;
        }
        $user->update();

        $dnotification=array(
            'message'=> 'Admin Profile Updated Sucessfully',
            'alert-type'=> 'success',
        );
        return redirect()->route('profile.view')->with($dnotification);

    }



    public function passupdate(Request $request){
        $user=Admin::find(1);
        $dbPass =$user->password;
        if(Hash::check($request->oldpass, $dbPass)){

            $user->password=Hash::make($request->newpass);
            $user->save();
            Auth::logout();
            return redirect()->route('admin.logout');
        }else{
            $notification=array(
                'message'=> 'Password reset Failed',
                'alert-type'=> 'error',
            );
            return redirect()->back()->with($notification);
        }

    }

}
