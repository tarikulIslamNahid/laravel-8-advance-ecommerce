<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
   public function index(){
    return view('frontend.home.index');
   }
   public function loginpage(){
    if(auth()->check()){
        return redirect('/');
      }else{

          return view('frontend.auth.login');

      }

   }
   public function userprofile(){
       $id= Auth::user()->id;
       $user=User::findOrFail($id);
    return view('frontend.panel.profile',compact('user'));
   }
   public function userprofileupdate(Request $request){
    $user=User::findOrFail(Auth::user()->id);
    $user->name=$request->name;
    $user->email=$request->email;
    $user->phone=$request->phone;
    if($request->file('profile_photo_path')){
        $file=$request->file('profile_photo_path');
        if (file_exists(public_path('storage/profile-photos/'.$user->profile_photo_path))) {

            unlink(public_path('storage/profile-photos/'.$user->profile_photo_path));
            }
        $fileName=date('YmdHi').'.'.$file->getClientOriginalExtension();
        $file->move(public_path('storage/profile-photos'),$fileName);
        $user['profile_photo_path']=$fileName;
    }
    $user->update();

    $dnotification=array(
        'message'=> ''.$user->name.' Profile Updated Sucessfully',
        'alert-type'=> 'success',
    );
    return redirect()->route('user.profile')->with($dnotification);

   }

public function userprofileupdatepass(Request $request){
    $user=User::findOrFail(Auth::user()->id);
    $dbPass =$user->password;
    if(Hash::check($request->oldpass, $dbPass)){

        $user->password=Hash::make($request->newpass);
        $user->save();
        Auth::logout();
        $notification=array(
            'message'=> 'Password reset Successfully',
            'alert-type'=> 'success',
        );
        return redirect()->route('logout')->with($notification);

    }else{
        $notification=array(
            'message'=> 'Password reset Failed',
            'alert-type'=> 'error',
        );
        return redirect()->back()->with($notification);
    }

}

   public function logout(){
    Auth::logout();
    return redirect()->route('login');
   }
   public function resetpass(){
    return view('frontend.auth.forgot');

   }
}
