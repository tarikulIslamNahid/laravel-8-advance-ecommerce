<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\categories;
use Illuminate\Support\Str;
use App\Models\Subcategories;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index(){
        $subcategories= Subcategories::latest()->get();
                return view('admin.subcategory.index',compact('subcategories'));
    }

    // category create page
    public function create(){
        $categories= categories::latest()->get();
        return view('admin.subcategory.create',compact('categories'));
    }

         // create new Sub Categories
         public function store(Request $request){
            // validate
            $request->validate([
                'sub_category_name_en' =>'required|unique:subcategories|max:255',
                'sub_category_name_bn' =>'required|max:255',
                'category_id' =>'required',
            ],
            // validation custom messages
            [
                'sub_category_name_en.required' =>'Input category English Name',
                'sub_category_name_en.unique' =>'category Name Already Exists',
                'sub_category_name_bn.required' =>'Input category Bangla Name',
                'sub_category_name_bn.unique' =>'category Name Already Exists',
            ]);

            $subcategory= new Subcategories;
            $subcategory->sub_category_name_en=$request->sub_category_name_en;
            $subcategory->sub_category_slug_en= Str::slug($request->sub_category_name_en) ;
            $subcategory->sub_category_name_bn= $request->sub_category_name_bn;
            $subcategory->sub_category_slug_bn= strtolower(str_replace(' ', '-',$request->sub_category_name_bn));
            $subcategory->category_id=$request->category_id;
            $subcategory->save();

            $dnotification=array(
                'message'=> 'Sub Category Create Sucessfully',
                'alert-type'=> 'success',
            );
            return redirect()->route('subcategory.all')->with($dnotification);


        }

    // show Sub Category edit page
    public function edit($id){
        $categories= categories::latest()->get();

        $subcategory= Subcategories::where('sub_category_slug_en',$id)->first();
        return view('admin.subcategory.edit',compact('subcategory','categories'));
    }

        // update Sub category
        public function update(Request $request,$id){
            $subcategory=Subcategories::where('sub_category_slug_en',$id)->first();

            $subcategory->sub_category_name_en=$request->sub_category_name_en;
            $subcategory->sub_category_slug_en= Str::slug($request->sub_category_name_en) ;
            $subcategory->sub_category_name_bn= $request->sub_category_name_bn;
            $subcategory->sub_category_slug_bn= strtolower(str_replace(' ', '-',$request->sub_category_name_bn));
            $subcategory->category_id=$request->category_id;

            $subcategory->update();

            $dnotification=array(
                'message'=> 'Sub Category Updated Sucessfully',
                'alert-type'=> 'success',
            );
            return redirect()->route('subcategory.all')->with($dnotification);

        }

   // delete category
    public function delete($id){
        $category=Subcategories::findOrFail($id);

        $category->delete();

        $dnotification=array(
            'message'=> 'Sub Category Delete Sucessfully',
            'alert-type'=> 'error',
        );
        return redirect()->back()->with($dnotification);

    }
}
