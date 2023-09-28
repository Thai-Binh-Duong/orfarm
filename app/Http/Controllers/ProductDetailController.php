<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductDetailController extends Controller
{
    public function show( $id ){
        $product = Product::find($id);
        $products = Product::limit(3)->orderBy('product_name','desc')->get();
        
        return view('guest.product.detail',compact('products','product'));
    }
}
