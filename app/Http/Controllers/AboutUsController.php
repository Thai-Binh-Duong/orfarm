<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function __construct() {
        $this->middleware(function($request,$next){
            session(['nav_active' => 'about-us']);
            return $next($request);
        });
    }

    public function show(){
        return view('guest.about-us.show');
    }
}
