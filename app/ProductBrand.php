<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductBrand extends Model
{
    protected $table='brands';
    protected $fillable = [
        'brand_name' , 'brand_desc' , 'brand_slug' , 'brand_status'
    ];

    function products(){
        return $this->hasMany('App\Product','brand_id');
    }
}
