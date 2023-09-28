<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct() {
        $this->middleware(function($request,$next){
            session(['module_active' => 'dasboard']);
            return $next($request);
        });
    }

    public function show(){
        $orders = Order::orderBy('id','desc')->paginate(10);
        $complete_order_count = Order::where('status','complete')->count();
        $processing_order_count = Order::where('status','processing')->count();
        $cancel_order_count = Order::where('status','cancel')->count();
        $complete_order_price = Order::where('status','complete')->sum('price');
        return view('admin.dashboard',compact('orders','complete_order_count','processing_order_count','cancel_order_count','complete_order_price'));
    }
}
