<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class BrandController extends Controller
{

    public function index(){
$brands= Brand::latest()->get();
        return view('admin.brand.index',compact('brands'));
    }
    public function create(){
                return view('admin.brand.create');
            }

    // create new brand
    public function store(Request $request){
        // validate
        $request->validate([
            'brand_name_en' =>'required|unique:brands|max:255',
            'brand_name_bn' =>'required|max:255',
            'brand_image' =>'required',
        ],
        // validation custom messages
        [
            'brand_name_en.required' =>'Input Brand English Name',
            'brand_name_en.unique' =>'Brand Name Already Exists',
            'brand_name_bn.required' =>'Input Brand Bangla Name',
            'brand_name_bn.unique' =>'Brand Name Already Exists',
        ]);

        $brand= new Brand;
        $brand->brand_name_en=$request->brand_name_en;
        $brand->brand_slug_en= Str::slug($request->brand_name_en) ;
        $brand->brand_name_bn= $request->brand_name_bn;
        $brand->brand_slug_bn= strtolower(str_replace(' ', '-',$request->brand_name_bn));


        if($request->file('brand_image')){
            $file=$request->file('brand_image');
            $fileName=date('YmdHi').uniqid().'.'.$file->getClientOriginalExtension();
            Image::make($file)->resize(300,300)->save('storage/brand/'.$fileName);
            $brand['brand_image']=$fileName;
            // if (file_exists(public_path('storage/profile-photos/'.$brand->profile_photo_path))) {
            //     unlink(public_path('storage/profile-photos/'.$brand->profile_photo_path));
            //     }

        }

        $brand->save();

        $dnotification=array(
            'message'=> 'Brand Create Sucessfully',
            'alert-type'=> 'success',
        );
        return redirect()->route('brand.all')->with($dnotification);


    }


    // show brand edit page
    public function edit($id){
        $brands= Brand::where('brand_slug_en',$id)->first();
        return view('admin.brand.edit',compact('brands'));
    }
    public function update(Request $request,$id){
        $brand=Brand::where('brand_slug_en',$id)->first();

        if($request->file('brand_image')){
           $oldImg= $brand->brand_image;
           if (file_exists(public_path('storage/brand/'.$oldImg))) {
            unlink(public_path('storage/brand/'.$oldImg));
            }
            $file=$request->file('brand_image');
            $fileName=date('YmdHi').uniqid().'.'.$file->getClientOriginalExtension();
            Image::make($file)->resize(300,300)->save('storage/brand/'.$fileName);
            $brand['brand_image']=$fileName;


        }
        $brand->brand_name_en=$request->brand_name_en;
        $brand->brand_slug_en= Str::slug($request->brand_name_en) ;
        $brand->brand_name_bn= $request->brand_name_bn;
        $brand->brand_slug_bn= strtolower(str_replace(' ', '-',$request->brand_name_bn));


        $brand->update();

        $dnotification=array(
            'message'=> 'Brand Updated Sucessfully',
            'alert-type'=> 'success',
        );
        return redirect()->route('brand.all')->with($dnotification);

    }
    public function delete($id){
        $brand=Brand::findOrFail($id);
      $image=  $brand->brand_image;
        if (file_exists(public_path('storage/brand/'.$image))) {
            unlink(public_path('storage/brand/'.$image));
            }
            $brand->delete();

            $dnotification=array(
                'message'=> 'Brand Delete Sucessfully',
                'alert-type'=> 'error',
            );
            return redirect()->back()->with($dnotification);

    }
}
