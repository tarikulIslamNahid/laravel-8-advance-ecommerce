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
            if($oldImg!=''){
            if (file_exists(public_path('storage/websitesetup/'.$oldImg))) {
             unlink(public_path('storage/websitesetup/'.$oldImg));
             }
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


    public function appearanceUpdateMeta(Request $request){

        $appearance= Websitesetup::findOrFail(1);
        $appearance->meta_title=$request->meta_title;
        $appearance->meta_desc=$request->meta_desc;

        if($request->file('meta_img')){
            $oldImg= $appearance->meta_img;
            if($oldImg!=''){
                if (file_exists(public_path('storage/websitesetup/'.$oldImg))) {
                    unlink(public_path('storage/websitesetup/'.$oldImg));
                    }
            }

             $file=$request->file('meta_img');
             $fileName=date('YmdHi').uniqid().'.'.$file->getClientOriginalExtension();
             Image::make($file)->resize(139,36)->save('storage/websitesetup/'.$fileName);
             $appearance['meta_img']=$fileName;


         }
         $appearance->update();

         $dnotification=array(
             'message'=> 'Global Seo Setting Updated Sucessfully',
             'alert-type'=> 'success',
         );

        return redirect()->back()->with($dnotification);

    }


}
