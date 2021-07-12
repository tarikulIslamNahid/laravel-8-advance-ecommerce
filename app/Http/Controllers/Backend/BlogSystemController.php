<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\blog_category;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class BlogSystemController extends Controller
{
        //------------------------------------ Blog Category Area --------------------------------
   public function BlogCatIndex(){
    $categories= blog_category::latest()->get();
    return view('admin.blogsystem.category.index',compact('categories'));
}

    public function BlogCatStore(Request $request){
        $request->validate([
            'blog_category_name_en' =>'required|unique:blog_categories|max:400',
            'blog_category_name_bn' =>'required|unique:blog_categories|max:400',

          ]);

          $category= new blog_category;
          $category->blog_category_name_en= $request->blog_category_name_en;
          $category->blog_category_slug_en= Str::slug($request->blog_category_name_en);
          $category->blog_category_name_bn= $request->blog_category_name_bn;
          $category->blog_category_slug_bn= Str::slug($request->blog_category_name_bn);
          $category->created_at= Carbon::now();
          $category->save();
          $notification = array(
              'message' => 'Blog Category Created Successfully',
              'alert-type' => 'success'
          );

          return redirect()->back()->with($notification);

    }
}