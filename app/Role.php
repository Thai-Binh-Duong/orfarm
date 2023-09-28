<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'name','description',
    ];

    function permission(){
        return $this->belongsToMany('App\Permission','role_permission');
    }
}
