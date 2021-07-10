<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\categories;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;
class ProductController extends Controller
{
    // create product page
    public function create(){
        $categories= categories::latest()->get();
		$brands = Brand::latest()->get();
        return view('admin.product.create',compact('categories','brands'));
    }

    public function store(Request $request){

$request->validate([
    'brand_id' => 'required',
    'category_id' => 'required',
    'subcategory_id' => 'required',
    'subsubcategory_id' => 'required',
    'product_name_en' => 'required|unique:products',
    'product_name_bn' => 'required|unique:products',
    'product_code' => 'required|max:20',
    'product_qty' => 'required',
    'product_tags_en' => 'sometimes',
    'product_tags_bn' => 'sometimes',
    'product_size_en' => 'sometimes',
    'product_size_bn' => 'sometimes',
    'product_color_en' => 'sometimes',
    'product_color_bn' => 'sometimes',
    'selling_price' => 'required',
    'discount_price' => 'required',
    'short_descp_en' => 'required',
    'short_descp_bn' => 'required',
    'long_descp_en' => 'required',
    'long_descp_bn' => 'required',
    'hot_deals' => 'sometimes',
    'featured' => 'sometimes',
    'special_offer' => 'sometimes',
    'special_deals' => 'sometimes',
    'product_thambnail'   => 'required|mimes:jpeg,png,jpg|max:2048',
    'digital_file' => 'sometimes',
    'multi_img'   => 'required',
]);




// for Thumbnail Image
$image = $request->file('product_thambnail');
$name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

Image::make($image)->resize(917,1000)->save('storage/products/thambnail/'.$name_gen);
$save_url = 'upload/products/thambnail/'.$name_gen;

// for multi image upload
foreach($request->file('multi_img') as $file)
{
    $name = hexdec(uniqid()).'.'.$file->getClientOriginalExtension();

    Image::make($file)->resize(917,1000)->save('storage/products/multi-image/'.$name);

    $data[] = $name;
}
 $MultiImage= implode(',',$data);  // array to string for database
//  dd($MultiImage);
//$returnArray= explode(',',$MultiImage);  // string to array for show ,update,delete
//dd($returnArray);



$product= new Product;
$product->brand_id=$request->brand_id;
$product->category_id=$request->category_id;
$product->subcategory_id=$request->subcategory_id;
$product->subsubcategory_id=$request->subsubcategory_id;
$product->product_name_en=$request->product_name_en;
$product->product_name_bn=$request->product_name_bn;
$product->product_slug_en=strtolower(str_replace(' ', '-', $request->product_name_en));
$product->product_slug_bn=strtolower(str_replace(' ', '-', $request->product_name_bn));
$product->product_code=$request->product_code;
$product->product_qty=$request->product_qty;
$product->product_tags_en=$request->product_tags_en;
$product->product_tags_bn=$request->product_tags_bn;
$product->product_size_en=$request->product_size_en;
$product->product_size_bn=$request->product_size_bn;
$product->product_color_en=$request->product_color_en;
$product->product_color_bn=$request->product_color_bn;
$product->selling_price=$request->selling_price;
$product->discount_price=$request->discount_price;
$product->short_descp_en=$request->short_descp_en;
$product->short_descp_bn=$request->short_descp_bn;
$product->long_descp_en=$request->long_descp_en;
$product->long_descp_bn=$request->long_descp_bn;
$product->hot_deals=$request->hot_deals;
$product->featured=$request->featured;
$product->special_offer=$request->special_offer;
$product->special_deals=$request->special_deals;
$product->product_thambnail=$save_url;

// for digital file
$digitalItem=0;
if ($files = $request->file('digital_file')) {

    $destinationPath = 'storage/pdf'; // upload path
    $digitalItem = date('YmdHis') . "." . $files->getClientOriginalExtension();
    $files->move($destinationPath,$digitalItem);
}
$product->digital_file=$digitalItem;

$product->multi_img=$MultiImage;
$product->status=1;
$product->created_at=Carbon::now();


$product->save();

$dnotification=array(
    'message'=> 'Product Create Sucessfully',
    'alert-type'=> 'success',
);
return redirect()->route('product.create')->with($dnotification);


    }
}

