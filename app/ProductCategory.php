<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductCategory extends Model
{
    // protected $table = 'product_categories';

    protected $fillable = [
        'name' , 'parent_cat_id' , 'status' , 'level' , 'image_url'
    ];

    public function get_category_by_id($id){
        $category = ProductCategory::find($id)->name->get;
        return $category;
    }

    function products(){
        return $this->hasMany('App\Product','category_id','id');
    }

}
