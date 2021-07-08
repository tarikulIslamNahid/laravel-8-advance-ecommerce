<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subsubcategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'subcategory_id',
        'subsub_category_name_en',
        'subsub_category_slug_en',
        'subsub_category_name_bn',
        'subsub_category_slug_bn',
    ];

    public function category(){
    	return $this->belongsTo(categories::class,'category_id','id');
    }
    public function subcategory(){
    	return $this->belongsTo(Subcategories::class,'subcategory_id','id');
    }
}
