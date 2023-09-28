<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'post_title','post_image','post_description','post_content','admin_id','category_id'
    ];

    function category(){
        return $this->hasOne('App\PostCategory','id','category_id');
    }
    
    function admin(){
        return $this->hasOne('App\User','id','admin_id');
    }
}
