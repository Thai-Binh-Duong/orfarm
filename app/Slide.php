<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    protected $fillable = [
        'slide_image','slide_link','slide_slug','admin'
    ];
}
