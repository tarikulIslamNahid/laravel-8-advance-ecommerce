<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\blog_category;
use App\Models\blog_posts;
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
          $category->blog_category_slug_bn=strtolower(str_replace(' ', '-',$request->blog_category_name_bn));
          $category->created_at= Carbon::now();
          $category->save();
          $notification = array(
              'message' => 'Blog Category Created Successfully',
              'alert-type' => 'success'
          );

          return redirect()->back()->with($notification);

    }

        // show Blog Category edit page
        public function BlogCatEdit($id){
            $categories= blog_category::where('blog_category_slug_en',$id)->first();
            return view('admin.blogsystem.category.edit',compact('categories'));
        }

        public function BlogCatUpdate(Request $request,$id){
            $request->validate([
                'blog_category_name_en' =>'required|unique:blog_categories|max:400',
                'blog_category_name_bn' =>'required|unique:blog_categories|max:400',

              ]);

              $category=blog_category::where('blog_category_slug_en',$id)->first();

              $category->blog_category_name_en= $request->blog_category_name_en;
              $category->blog_category_slug_en= Str::slug($request->blog_category_name_en);
              $category->blog_category_name_bn= $request->blog_category_name_bn;
              $category->blog_category_slug_bn= strtolower(str_replace(' ', '-',$request->blog_category_name_bn));
              $category->updated_at= Carbon::now();
              $category->update();
              $notification = array(
                  'message' => 'Blog Category Updated Successfully',
                  'alert-type' => 'success'
              );

              return redirect()->route('blogcat.all')->with($notification);

        }

        // delete Blog category
        public function BlogCatDelete($id){
            $category=blog_category::findOrFail($id);

            $category->delete();

            $dnotification=array(
                'message'=> 'Blog Category Delete Sucessfully',
                'alert-type'=> 'error',
            );
            return redirect()->back()->with($dnotification);

        }



            //------------------------------------ Blog Post Area --------------------------------
   public function BlogPostIndex(){
    $posts= blog_posts::latest()->get();
    return view('admin.blogsystem.post.index',compact('posts'));
}

public function BlogPostCreate(){
    $categories= blog_category::latest()->get();
    return view('admin.blogsystem.post.create',compact('categories'));
}
}
