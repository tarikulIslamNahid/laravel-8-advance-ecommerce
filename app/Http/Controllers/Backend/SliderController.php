<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;
class SliderController extends Controller
{
    public function index(){
        $sliders=Slider::latest()->get();
        return view('admin.slider.index',compact('sliders'));
    }

    public function create(){
        return view('admin.slider.create');
    }


    // create new Slider
    public function store(Request $request){
        // validate
        $request->validate([
            'title' =>'sometimes|unique:sliders|max:255',
            'link' =>'sometimes|max:255',
            'description' =>'sometimes|max:255',
            'slider_img' =>'required',
        ],
        // validation custom messages
        [
            'slider_img.required' =>'Please Select One Image',
        ]);

        $slider= new Slider;
        $slider->title=$request->title;
        $slider->link= $request->link;
        $slider->description= $request->description;


        if($request->file('slider_img')){
            $file=$request->file('slider_img');
            $fileName=date('YmdHi').uniqid().'.'.$file->getClientOriginalExtension();
            Image::make($file)->resize(870,370)->save('storage/slider/'.$fileName);
            $slider['slider_img']=$fileName;
            // if (file_exists(public_path('storage/profile-photos/'.$brand->profile_photo_path))) {
            //     unlink(public_path('storage/profile-photos/'.$brand->profile_photo_path));
            //     }

        }

        $slider->save();

        $dnotification=array(
            'message'=> 'Slider Create Sucessfully',
            'alert-type'=> 'success',
        );
        return redirect()->route('slider.all')->with($dnotification);


    }

}
