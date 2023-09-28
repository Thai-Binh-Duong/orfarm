<?php

namespace App\Http\Controllers;

use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Request $request,$id){

        $product = Product::find($id);
        // $category = Product::find($id)->cat;
        // $cat_name = $category->name;
        // $brand = Product::find($id)->brand;
        // $brand_name = $brand->brand_name;
        // return $brand_name;
        // return $product;
        // "id":5,"product_name":"farm chicken",
        //     "product_quantity":10,"product_slug":"txfarm-chicken",
        //     "category_id":18,"brand_id":3,"product_desc":"farm chicken",
        //     "product_content":"TXFarm chicken","product_new_price":60000,
        //     "product_old_price":55000,
        //     "product_image":"public\/storage\/photos\/products\/product-chicken-1.webp",
        //     "product_weight":1000,"product_life":4,"admin_id":1,"product_status":"pending",
        //     "created_at":"2023-07-26T07:27:55.000000Z","updated_at":"2023-07-27T04:21:01.000000Z",
        //     "deleted_at":null

        // return $request->input('quantity');

        if($request->input('quantity')){
            $quantity = $request->input('quantity');
        }else{
            $quantity = 1;
        }
        
        Cart::add([
            'id' => "$product->id", 'name' => "$product->product_name",
            'qty' =>  "$quantity", 
            'price' => "$product->product_new_price",
            'options' => ['product_image' => "$product->product_image" , 'quantity' => "$product->product_quantity"]
        ]);
        // return Cart::content();
        return redirect()->route('cart.show')->with('addSuccess','Thêm giỏ hàng thành công');
    }

    public function show(){
        
        $cart = Cart::content();
        $total = Cart::total(0,',','.');
        // $total = (int)Cart::total();
        return view('guest.cart.show',compact('cart','total'));
    }

    public function remove($rowId){
        Cart::remove($rowId);
        return redirect()->route('cart.show');
    }

    public function update_ajax(){
        $rowId =  $_POST['rowId'];
        $id =  $_POST['id'];
        $qty =  $_POST['qty'];

        Cart::update($rowId,$qty);
        // $total_price = money_format((float)Cart::total()*1000)." ".currency();
        $total_price =Cart::total(0,',','.')." ".currency();

        $current_cart = Cart::get($rowId);
        $subtotal = money_format($current_cart->subtotal).currency();

        $data['rowId'] = $rowId;
        $data['id'] = $id;
        $data['qty'] = $qty;
        $data['subtotal'] = $subtotal;
        $data['total_price'] = $total_price;

        return $data;
    }
}
