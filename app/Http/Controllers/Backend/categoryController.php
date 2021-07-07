<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\categories;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    public function index(){
        $categories= categories::latest()->get();
                return view('admin.category.index',compact('categories'));
    }
// category create page
    public function create(){
        return view('admin.category.create');
    }

     // create new Categories
     public function store(Request $request){
        // validate
        $request->validate([
            'category_name_en' =>'required|unique:Categories|max:255',
            'category_name_bn' =>'required|max:255',
            'category_icon' =>'required',
        ],
        // validation custom messages
        [
            'category_name_en.required' =>'Input category English Name',
            'category_name_en.unique' =>'category Name Already Exists',
            'category_name_bn.required' =>'Input category Bangla Name',
            'category_name_bn.unique' =>'category Name Already Exists',
        ]);

        $category= new categories;
        $category->category_name_en=$request->category_name_en;
        $category->category_slug_en= Str::slug($request->category_name_en) ;
        $category->category_name_bn= $request->category_name_bn;
        $category->category_slug_bn= strtolower(str_replace(' ', '-',$request->category_name_bn));
        $category->category_icon=$request->category_icon;
        $category->save();

        $dnotification=array(
            'message'=> 'category Create Sucessfully',
            'alert-type'=> 'success',
        );
        return redirect()->route('category.all')->with($dnotification);


    }


}
