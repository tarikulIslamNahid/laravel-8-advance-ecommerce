<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\blog_category;
use App\Models\blog_posts;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;
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
public function BlogPostStore(Request $request){
     // validate
     $request->validate([
        'post_title_en' =>'required|unique:blog_posts|max:255',
        'post_title_bn' =>'required|unique:blog_posts|max:255',
        'category_id' =>'required',
        'post_image' =>'required',
        'post_details_en' =>'required',
        'post_details_bn' =>'required',
    ]);

    $blog_posts= new blog_posts;
    $blog_posts->category_id=$request->category_id;
    $blog_posts->post_title_en=$request->post_title_en;
    $blog_posts->post_slug_en= Str::slug($request->post_title_en) ;
    $blog_posts->post_title_bn= $request->post_title_bn;
    $blog_posts->post_slug_bn= strtolower(str_replace(' ', '-',$request->post_title_bn));
    $blog_posts->post_details_en= $request->post_details_en;
    $blog_posts->post_details_bn= $request->post_details_bn;


    if($request->file('post_image')){
        $file=$request->file('post_image');
        $fileName=date('YmdHi').uniqid().'.'.$file->getClientOriginalExtension();
        Image::make($file)->resize(780,433)->save('storage/post/'.$fileName);
        $blog_posts['post_image']=$fileName;


    }

    $blog_posts->save();

    $dnotification=array(
        'message'=> 'Blog Post Create Sucessfully',
        'alert-type'=> 'success',
    );
    return redirect()->route('blogpost.all')->with($dnotification);

}

public function BlogPostEdit($id){
    $post= blog_posts::where('post_slug_en',$id)->first();
    $categories= blog_category::latest()->get();

    return view('admin.blogsystem.post.edit',compact('post','categories'));
}

public function BlogPostUpdate(Request $request, $id){

        // validate
        $request->validate([
            'post_title_en' =>'required',
            'post_title_bn' =>'required',
            'category_id' =>'required',
            'post_details_en' =>'required',
            'post_details_bn' =>'required',
        ]);

        $blog_posts=blog_posts::findOrFail($id);
        $blog_posts->category_id=$request->category_id;
        $blog_posts->post_title_en=$request->post_title_en;
        $blog_posts->post_slug_en= Str::slug($request->post_title_en) ;
        $blog_posts->post_title_bn= $request->post_title_bn;
        $blog_posts->post_slug_bn= strtolower(str_replace(' ', '-',$request->post_title_bn));
        $blog_posts->post_details_en= $request->post_details_en;
        $blog_posts->post_details_bn= $request->post_details_bn;

        if($request->file('post_image')){
            $oldImg= $blog_posts->post_image;
            if (file_exists(public_path('storage/post/'.$oldImg))) {
             unlink(public_path('storage/post/'.$oldImg));
             }
             $file=$request->file('post_image');
             $fileName=date('YmdHi').uniqid().'.'.$file->getClientOriginalExtension();
             Image::make($file)->resize(780,433)->save('storage/post/'.$fileName);
             $blog_posts['post_image']=$fileName;


         }

        $blog_posts->update();

        $dnotification=array(
            'message'=> 'Blog Post Updated Sucessfully',
            'alert-type'=> 'success',
        );
        return redirect()->route('blogpost.all')->with($dnotification);



}

public function BlogPostDelete($id){
    $blog_posts=blog_posts::findOrFail($id);
  $image=  $blog_posts->post_image;
    if (file_exists(public_path('storage/post/'.$image))) {
        unlink(public_path('storage/post/'.$image));
        }
        $blog_posts->delete();

        $dnotification=array(
            'message'=> 'Blog Post Delete Sucessfully',
            'alert-type'=> 'error',
        );
        return redirect()->back()->with($dnotification);

}
}
