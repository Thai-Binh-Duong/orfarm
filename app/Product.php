<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    
    protected $fillable= [
        'product_name','product_old_price','product_new_price','product_quantity',
        'product_content','product_weight','product_slug','product_life','product_desc',
        'category_id','brand_id','product_status','product_image','admin_id'
    ];

    public function cat(){
        return $this->hasOne('App\ProductCategory','id','category_id');
    }

    public function brand(){
        return $this->hasOne('App\ProductBrand','id','brand_id');
    }

    function tag(){
        return $this->belongsToMany('App\ProductTag','tag_product','product_id','tag_id');
    }

}
