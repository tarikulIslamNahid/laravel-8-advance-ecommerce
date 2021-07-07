<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategories extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'sub_category_name_en',
        'sub_category_slug_en',
        'sub_category_name_bn',
        'sub_category_slug_bn',
    ];

    public function category(){
    	return $this->belongsTo(categories::class,'category_id','id');
    }
}
