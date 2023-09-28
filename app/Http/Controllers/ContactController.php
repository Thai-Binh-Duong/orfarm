<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function __construct() {
        $this->middleware(function($request,$next){
            session(['nav_active' => 'contact-us']);
            return $next($request);
        });
    }

    public function show(){
        return view('guest.contact.show');
    }
}
