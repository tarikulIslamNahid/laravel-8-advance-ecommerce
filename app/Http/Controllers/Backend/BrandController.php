<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
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
        $brand= new Brand;
        $brand->brand_name_en=$request->brand_name_en;
        $brand->brand_slug_en= Str::slug($request->brand_name_en) ;
        $brand->brand_name_bn= $request->brand_name_bn;
        $brand->brand_slug_bn= Str::slug($request->brand_name_bn);


        if($request->file('brand_image')){
            $file=$request->file('brand_image');
            // if (file_exists(public_path('storage/profile-photos/'.$brand->profile_photo_path))) {

            //     unlink(public_path('storage/profile-photos/'.$brand->profile_photo_path));
            //     }
            $fileName=date('YmdHi').'.'.$file->getClientOriginalExtension();
            $file->move(public_path('storage/brand'),$fileName);
            $brand['brand_image']=$fileName;
        }

        $brand->save();

        $dnotification=array(
            'message'=> 'Brand Create Sucessfully',
            'alert-type'=> 'success',
        );
        return redirect()->route('brand.all')->with($dnotification);


    }
}
