<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model
{
    protected $fillable=[
        'name', 'admin_id'
    ];

    function posts(){
        return $this->hasMany('App\Post','category_id');
    }
}
