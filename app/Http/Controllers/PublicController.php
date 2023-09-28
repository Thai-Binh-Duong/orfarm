<?php

namespace App\Http\Controllers;

use App\Post;
use App\Product;
use App\ProductCategory;
use App\Slide;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function __construct() {
        $this->middleware(function($request,$next){
            session(['nav_active' => 'home']);
            return $next($request);
        });
    }

    public function index(){
        $slides = Slide::all();
        $categories = ProductCategory::where('parent_cat_id','0')->limit(8)->get();

        $data = ProductCategory::all();

        $products = Product::limit(10)->orderBy('product_name','desc')->get();
        $all_product = Product::limit(10)->orderBy('product_name','desc')->get();
        $fresh_fruits = Product::where('category_id',9)->limit(6)->get();

        $cat_meat_id = get_id_data_tree($data, 7);
        // return $cat_meat_id;
        $fresh_meats = Product::whereIn('category_id', $cat_meat_id )->limit(6)->get();
        
        $fresh_vegetables = Product::where('category_id',8)->limit(6)->get();

        $cart = Cart::content();

        $posts = Post::limit(6)->get();

        return view('guest.home',compact('slides','categories','products','all_product','fresh_fruits','fresh_vegetables','data','fresh_meats','cart','posts'));
    }
}
