<?php

namespace App\Http\Controllers;

use App\Order;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\JSON;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function __construct() {
        $this->middleware(function($request,$next){
            session(['module_active' => 'order']);
            return $next($request);
        });
    }

    public function add(Request $request){

        if( Cart::count() > 0 ){
            
        $request->validate(
            [
                'name' => 'required|string',
                'email' => 'required|string',
                'phone' => 'required',
                'address' => 'required|string'
            ],
            [
                'required' => 'Khong duoc de trong :attribute'
            ],
            [
                'name' => 'ten',
                'email' => 'email',
                'phone' => 'so dien thoai',
                'address' => 'dia chi',
            ]
        );

        $input['name'] = $request->input('name');
        $input['email'] = $request->input('email');
        $input['phone'] = $request->input('phone');
        $input['address'] = $request->input('address');

        if( $request->input('note') ){
            $input['note'] = $request->input('note');
        }else{
            $input['note'] = '';
        }

        $input['price'] = Cart::total(0,',','.');

        foreach( Cart::content() as $cart ){
            $result[$cart->id]['id'] = $cart->id;
            $result[$cart->id]['name'] = $cart->name;
            $result[$cart->id]['qty'] = $cart->qty;
            $result[$cart->id]['price'] = $cart->price;
            $result[$cart->id]['image'] = $cart->options->product_image;
        }
        // return $result;

        $input['status'] = 'processing';

        $input['order'] = json_encode($result); 

        $data_send_mail['name'] = $request->input('name');
        $data_send_mail['email'] = $request->input('email');
        $data_send_mail['phone'] = $request->input('phone');
        $data_send_mail['address'] = $request->input('address');
        $data_send_mail['note'] = $request->input('note');
        $data_send_mail['orders'] =  Cart::content();
        $price_total = Cart::total(0,',','.');
        $data_send_mail['price_total'] = $price_total;

            Order::create($input);
            Mail::to($request->input('email'))->send(new SendMail($data_send_mail));
            Cart::destroy();
            return redirect()->route('public.home')->with('orderSuccess','Bạn đã đặt hàng thành công');
            
        }else{
            return redirect()->route('cart.show')->with('status','Please Add Product To Cart');
        }
    }

    public function list(Request $request){
        // return $request->input('keyword');
        if( $request->input('status') == "trash" ){
            $list_action = [
                'restore' => 'Khôi phục',
                'forceDelete' => 'Xóa vĩnh viễn'
            ];
            $orders = Order::onlyTrashed()->paginate(10);
        }else{
            $list_action = [
                'delete' => 'Xóa tạm thời'
            ];
            if( $request->input('keyword') ){
                $keyword = $request->input('keyword');
            }else{
                $keyword = '';
            }
            $orders = Order::where('name','LIKE',"%{$keyword}%" )->paginate(10);
        }
        // $orders = Order::Paginate(10);
        $count_order_active = Order::count();
        $count_order_trash = Order::onlyTrashed()->count();
        return view('admin.order.list',compact('orders','count_order_active','count_order_trash','list_action'));
    }

    public function detail(Order $order, Request $request){
        $order_items = $order->order;
        // return $order_items;

        return view('admin.order.detail',compact('order','order_items'));
    }

    public function update(Request $request,Order $order){

        $status = $request->input('status');

        $order->update(['status' => $status]);
        return redirect()->route('admin.order.list')->with('status' , 'Cap nhat don hang thanh cong');
    }

    public function delete(Order $order){
        $order->delete();
        return redirect()->route('admin.order.list')->with('status','Da xoa don hang thanh cong');
    }

    public function action(Request $request){
        
        if( !empty( $request->input('action') )  ){
            $action = $request->input('action');
            
            if( $request->input('check') ){
                $list_check = $request->input('check') ;
                if( $action == 'delete' ){
                    Order::whereIn('id',$list_check)->delete();
                    return redirect()->route('admin.order.list')->with('status','Thành công xóa tạm thời các bản ghi đã chọn');
                }elseif(  $action == 'restore'  ){
                    Order::onlyTrashed()->whereIn('id',$list_check)->restore();
                    return redirect()->route('admin.order.list')->with('status','Khôi phục thành công các bản ghi đã chọn');
                }elseif(  $action == 'forceDelete'  ){
                    Order::onlyTrashed()->whereIn('id',$list_check)->forceDelete();
                    return redirect()->route('admin.order.list')->with('status','Đã xóa vĩnh viễn các bản ghi được chọn');

                }
            }else{
                return redirect()->route('admin.order.list')->with('status','Mời chọn các phần tử cần thực hiện tác vụ');
            }
            
        }else{
            return redirect()->route('admin.order.list')->with('status','Mời chọn hành động');
        }
    }
}
