<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\categories;
use Illuminate\Support\Str;
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


    // show Category edit page
    public function edit($id){
        $categories= categories::where('category_slug_en',$id)->first();
        return view('admin.category.edit',compact('categories'));
    }


    // update category
    public function update(Request $request,$id){
        $category=categories::where('category_slug_en',$id)->first();

        $category->category_name_en=$request->category_name_en;
        $category->category_slug_en= Str::slug($request->category_name_en) ;
        $category->category_name_bn= $request->category_name_bn;
        $category->category_slug_bn= strtolower(str_replace(' ', '-',$request->category_name_bn));
        $category->category_icon=$request->category_icon;


        $category->update();

        $dnotification=array(
            'message'=> 'category Updated Sucessfully',
            'alert-type'=> 'success',
        );
        return redirect()->route('category.all')->with($dnotification);

    }

    // delete category
    public function delete($id){
        $category=categories::findOrFail($id);

        $category->delete();

        $dnotification=array(
            'message'=> 'category Delete Sucessfully',
            'alert-type'=> 'error',
        );
        return redirect()->back()->with($dnotification);

    }

}
