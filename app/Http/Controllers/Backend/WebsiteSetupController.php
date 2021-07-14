<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Websitesetup;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Http\Request;

class WebsiteSetupController extends Controller
{
    public function appearance(){

     $appearance=Websitesetup::findOrFail(1);

return view('admin.websitesetup.appearance',compact('appearance'));
    }

    public function appearanceUpdateGen(Request $request){

        $appearance= Websitesetup::findOrFail(1);
        $appearance->website_name=$request->website_name;
        $appearance->site_motto=$request->site_motto;

        if($request->file('site_logo')){
            $oldImg= $appearance->site_logo;
            if (file_exists(public_path('storage/websitesetup/'.$oldImg))) {
             unlink(public_path('storage/websitesetup/'.$oldImg));
             }
             $file=$request->file('site_logo');
             $fileName=date('YmdHi').uniqid().'.'.$file->getClientOriginalExtension();
             Image::make($file)->resize(139,36)->save('storage/websitesetup/'.$fileName);
             $appearance['site_logo']=$fileName;


         }
         $appearance->update();

         $dnotification=array(
             'message'=> 'Global Setting Updated Sucessfully',
             'alert-type'=> 'success',
         );

        return redirect()->back()->with($dnotification);

    }

    
}
