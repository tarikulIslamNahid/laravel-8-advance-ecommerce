<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'brand_id',
        'category_id',
        'subcategory_id',
        'subsubcategory_id',
        'product_name_en',
        'product_name_bn',
        'product_slug_en',
        'product_slug_bn',
        'product_code',
        'product_qty',
        'product_tags_en',
        'product_tags_bn',
        'product_size_en',
        'product_size_bn',
        'product_color_en',
        'product_color_bn',
        'selling_price',
        'discount_price',
        'short_descp_en',
        'short_descp_bn',
        'long_descp_en',
        'long_descp_bn',
        'hot_deals',
        'featured',
        'special_offer',
        'special_deals',
        'product_thambnail',
        'digital_file',
        'multi_img',
        'status',
    ];
    public function category(){
    	return $this->belongsTo(Category::class,'category_id','id');
    }


    public function brand(){
    	return $this->belongsTo(Brand::class,'brand_id','id');
    }
}
