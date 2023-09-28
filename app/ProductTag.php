<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductTag extends Model
{
    protected $table='tags';

    protected $fillable = [ 'name' ];

    function product(){
        return $this->belongsToMany('App\Product');
    }
}
