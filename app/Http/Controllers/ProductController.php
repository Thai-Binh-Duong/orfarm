<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Product;
use App\ProductBrand;
use App\ProductCategory;
use App\ProductTag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function __construct() {
        $this->middleware(function($request,$next){
            session(['module_active' => 'product','nav_active' => 'shop']);
            return $next($request);
        });
    }

    public function list(Request $request){

        // return $request->status;   <=>   return $request->input('status');
        $status = $request->input('status') ;

        if( $status == 'trash' ){
            $list_action = [
                'restore' => 'Khôi phục',
                'forceDelete' => 'Xóa vĩnh viễn'
            ];
            $products = Product::onlyTrashed()->paginate(10); // lấy các phần tử đã được xóa bằng onlyTrash
        }else{
            $list_action = [
                'delete' => 'Xóa tạm thời'
            ];
            if( $request->input('keyword') ){
                $keyword = $request->input('keyword');
            }else{
                $keyword = "";
            }
            // return $keyword;
    
            $products = Product::where('product_name','LIKE',"%{$keyword}%")->paginate(10);
    
        }

        $count_product_active = Product::count();
        $count_product_trash = Product::onlyTrashed()->count();

        $categories = ProductCategory::all();

        return view('admin.product.list',compact('products','categories','count_product_active','count_product_trash','list_action'));
    }

    public function add(){
        $categories = ProductCategory::all();
        $brands = ProductBrand::all();
        $tags = ProductTag::all();
        return view('admin.product.add',compact('categories','brands','tags'));
    }

    public function store(Request $request){
        // return $request->all();
        $request->validate(
            [
                'product_name' => 'required|string|unique:products,product_name',
                'product_old_price' => 'required',
                'product_new_price'=> 'required',
                'product_quantity' => 'required',
                'product_desc' => 'required|string',
                'product_content' => 'required|string',
                'product_weight' => 'required',
                'product_slug' => 'required',
                'product_life' => 'required',
                'category_id'  => 'required',
                'brand_id'  => 'required',
            ],
            [
                'required' => 'Khong duoc de trong truong :attribute'
            ],
            [
                'product_name' => 'ten san pham',
                'product_old_price' => 'gia cu san pham',
                'product_new_price' => 'gia moi san pham',
                'product_quantity' => 'so luong san pham',
                'product_desc'  => 'mo ta ngan',
                'product_content' => 'noi dung san pham',
                'product_weight' => 'can nang san pham',
                'product_slug' => 'duong dan san pham',
                'product_life' => 'han su dung san pham',
                'category_id'  => 'danh muc san pham',
                'brand_id'  => 'nhan hang san pham',
            ]
        );

        
        $input['product_name'] = $request->input('product_name');
        $input['product_old_price'] = $request->input('product_old_price');
        $input['product_new_price'] = $request->input('product_new_price');
        $input['product_quantity'] = $request->input('product_quantity');
        $input['product_content'] = $request->input('product_content');
        $input['product_weight'] = $request->input('product_weight');
        $input['product_slug'] = Str::slug($request->input('product_slug'));
        $input['product_life'] = $request->input('product_life');
        $input['admin_id'] = Auth::user()->id;
        $input['product_desc'] = $request->input('product_desc');
        $input['category_id'] = $request->input('category_id');
        $input['brand_id'] = $request->input('brand_id');
        $input['product_status'] = $request->input('status');

        if($request->hasFile('upload_file')){
            // return "co file";
            $file = $request->file('upload_file');
            // dd($file) ;
            $fileName =  $file->getClientOriginalName();
            // return $fileName;
            $file->move('public/storage/photos/products',$file->getClientOriginalName());

            $thumbnail = "public/storage/photos/products/".$fileName;

            $input['product_image'] = $thumbnail;
        }else{
            $input['product_image'] = '';
        }

        // return $input;
        $product = Product::create($input);

        $product->tag()->attach($request->input('tags'));

        return redirect()->route('admin.product.list')->with('status','Da them san pham thanh cong');
    }

    public function edit(Product $product){

        $categories = ProductCategory::all();

        $brands = ProductBrand::all();

        $tags = ProductTag::all();

        return view('admin.product.edit',compact('product','categories','brands','tags'));
    }

    public function action(Request $request){
        $list_check = $request->input('check');
        // return $list_check;
        $action = $request->input('action');
        if( $list_check ){
            if( !empty($action) ){
                if( $action == 'restore'){
                    Product::onlyTrashed()->whereIn('id', $list_check )->restore();
                    return redirect()->route('admin.product.list')->with('status','Đã khôi phục sản phẩm được chọn');
                }elseif( $action == 'delete' ){
                    Product::withTrashed()->destroy($list_check);
                    return redirect()->route('admin.product.list')->with('status','Đã xóa sản phẩm được chọn');
                }elseif( $action == 'forceDelete' ){
                    Product::onlyTrashed()->whereIn('id',$list_check)->forceDelete();
                    return redirect()->route('admin.product.list')->with('status','Đã xóa vĩnh viễn sản phẩm được chọn');
                }
            }else{
                return redirect()->route('admin.product.list')->with('status','Chọn tác vụ cần thực hiện');
            }
        }else{
            return redirect()->route('admin.product.list')->with('status','Chọn sản phẩm cần thực hiện tác vụ');
        }

    }

    function update(Product $product,Request $request){
        // return "Update"."-".$product;

        $request->validate(
            [
                'product_name' => 'required|string|unique:products,product_name,'.$product->id,
                'product_old_price' => 'required',
                'product_new_price'=> 'required',
                'product_quantity' => 'required',
                'product_desc' => 'required|string',
                'product_content' => 'required|string',
                'product_weight' => 'required',
                'product_slug' => 'required',
                'product_life' => 'required',
                'category_id'  => 'required',
                'brand_id'  => 'required',
            ],
            [
                'required' => 'Khong duoc de trong truong :attribute'
            ],
            [
                'product_name' => 'ten san pham',
                'product_old_price' => 'gia cu san pham',
                'product_new_price' => 'gia moi san pham',
                'product_quantity' => 'so luong san pham',
                'product_desc'  => 'mo ta ngan',
                'product_content' => 'noi dung san pham',
                'product_weight' => 'can nang san pham',
                'product_slug' => 'duong dan san pham',
                'product_life' => 'han su dung san pham',
                'category_id'  => 'danh muc san pham',
                'brand_id'  => 'nhan hang san pham',
            ]
        );

        if($request->hasFile('upload_file')){
            // return "co file";
            $file = $request->file('upload_file');
            // dd($file) ;
            $fileName =  $file->getClientOriginalName();
            // return $fileName;
            $file->move('public/storage/photos/products',$file->getClientOriginalName());

            $thumbnail = "public/storage/photos/products/".$fileName;

        }else{
            $thumbnail  = $product->product_image;
        }

        $product->update([
            'product_name' => $request->input('product_name'),
            'product_old_price' => $request->input('product_old_price'),
            'product_new_price' => $request->input('product_new_price'),
            'product_quantity' => $request->input('product_quantity'),
            'product_content' => $request->input('product_content'),
            'product_weight' => $request->input('product_weight'),
            'product_slug' => Str::slug($request->input('product_slug')),
            'product_life' => $request->input('product_life'),
            'admin_id'=> Auth::user()->id,
            'product_desc' => $request->input('product_desc'),
            'category_id' => $request->input('category_id'),
            'brand_id' => $request->input('brand_id'),
            'product_status' => $request->input('status'),
            'product_image' => $thumbnail
        ]);

        $product->tag()->sync($request->input('tags',[]));
        return redirect()->route('admin.product.list')->with('status','Da cap nhat san pham thanh cong');
    }

    public function delete(Product $product){
        $product->delete();
        return redirect()->route('admin.product.list')->with('status','Da xoa san pham tam thoi');
    }
    
    public function show(Request $request){

        if($request->get('categories')){
            return $request->get('categories');
        }
        if(isset( $request->categories)  ){
            $products = Product::whereIn('category_id' , $request->categories) ->paginate(8);
        }else{
            $products = Product::Paginate(8);
        }
        // $products = $this->ajaxFilterProductByCategory($request);
        
        $categories = ProductCategory::all();
        $brands = ProductBrand::all();
        return view('guest.shop.show',compact('products','categories','brands'));
    }

    // public function ajaxFilterProductByCategory(Request $request ){

    //     if($request->get('categories')){
    //         return $request->get('categories');
    //     }
    //     if(isset($_GET['category'])  ){
    //         $products = Product::whereIn('category_id' , json_decode($_GET['category'],true) )->paginate(8);
    //         // $products = Product::Paginate(8);
    //     }else{
    //         $products = Product::Paginate(8);
    //     }

    //     return $products;
    // }

    public function filter(Request $request ){
        // if( $request->get('categories') ){
        //     return $request->get('categories');
        // }

        if ($request->input('categories')) {
            $categories_name = ProductCategory::whereIn('id',$request->input('categories'))->get();
            $brands_name = '';
            $products = Product::whereIn('category_id',$request->input('categories'))->paginate(20);
        }elseif($request->input('brands')){
            $brands_name = ProductBrand::whereIn('id',$request->input('brands'))->get();
            $products = Product::whereIn('brand_id',$request->input('brands'))->paginate(20);
            $categories_name = '';
        }else{
            $categories_name = '';
            $brands_name = '';
            $products = Product::paginate(8);
        }
        
        $categories = ProductCategory::all();
        $brands = ProductBrand::all();
        return view('guest.shop.filter',compact('products','categories','brands','categories_name','brands_name'));
    }

    public function search(Request $request){
        // return $request->all();
        $categories = ProductCategory::all();
        $brands = ProductBrand::all();

        if( $request->input('search') ){
            $name_product = $request->input('search');
            $product = Product::where('product_name' , 'LIKE' , "%{$name_product}%")->get();
            if( !empty($product)  ){
                $products = $product;
            }else{
                return redirect()->route('shop.show')->with('not_product_search',"Dont have product with this name");
            }
        }else{
            return redirect()->route('shop.show');
        }

        return view('guest.product.search',compact('products','categories', 'brands','name_product'));
    }

    public function filterProductByCategory($id){
        // return $id;

        $products = Product::where('category_id',$id)->paginate(20);
        $categories = ProductCategory::all();
        $brands = ProductBrand::all();
        $categories_name = ProductCategory::where('id',$id)->get();
        $brands_name = '';
        return view('guest.shop.filter',compact('products','categories','brands','categories_name','brands_name'));
    }
}
