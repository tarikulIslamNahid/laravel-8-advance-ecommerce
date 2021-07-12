<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class blog_posts extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'post_title_en',
        'post_title_bn',
        'post_slug_en',
        'post_slug_bn',
        'post_image',
        'post_details_en',
        'post_details_bn',
    ];

    public function category(){
    	return $this->belongsTo(blog_category::class,'category_id','id');
    }
}
