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


        }

        $slider->save();

        $dnotification=array(
            'message'=> 'Slider Create Sucessfully',
            'alert-type'=> 'success',
        );
        return redirect()->route('slider.all')->with($dnotification);


    }
    // show Slider edit page
    public function edit($id){
        $sliders= Slider::findOrFail($id);
        return view('admin.slider.edit',compact('sliders'));
    }


    public function update(Request $request,$id){
        $slider=Slider::findOrFail($id);

        if($request->file('slider_img')){
           $oldImg= $slider->slider_img;
           if (file_exists(public_path('storage/slider/'.$oldImg))) {
            unlink(public_path('storage/slider/'.$oldImg));
            }
            $file=$request->file('slider_img');
            $fileName=date('YmdHi').uniqid().'.'.$file->getClientOriginalExtension();
            Image::make($file)->resize(300,300)->save('storage/slider/'.$fileName);
            $slider['slider_img']=$fileName;


        }
        $slider->title=$request->title;
        $slider->link= $request->link;
        $slider->description= $request->description;
        $slider->update();

        $dnotification=array(
            'message'=> 'Slider Updated Sucessfully',
            'alert-type'=> 'success',
        );
        return redirect()->route('slider.all')->with($dnotification);

    }


    public function inactive($id){
    	Slider::findOrFail($id)->update(['status' => 0]);

    	$notification = array(
			'message' => 'Slider Inactive Successfully',
			'alert-type' => 'info'
		);

		return redirect()->back()->with($notification);

    }

    public function active($id){
    	Slider::findOrFail($id)->update(['status' => 1]);

    	$notification = array(
			'message' => 'Slider Active Successfully',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);

    }

    public function delete($id){
        $slider=Slider::findOrFail($id);
      $image=  $slider->slider_img;
        if (file_exists(public_path('storage/slider/'.$image))) {
            unlink(public_path('storage/slider/'.$image));
            }
            $slider->delete();

            $dnotification=array(
                'message'=> 'Slider Delete Sucessfully',
                'alert-type'=> 'error',
            );
            return redirect()->back()->with($dnotification);

    }

}
