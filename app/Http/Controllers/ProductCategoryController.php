<?php

namespace App\Http\Controllers;

use App\ProductBrand;
use App\ProductCategory;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB as FacadesDB;

class ProductCategoryController extends Controller
{
    public function __construct() {
        $this->middleware(function($request,$next){
            session(['module_active' => 'product']);
            return $next($request);
        });
    }

    public function list(){
        $categories = ProductCategory::all();
        
        return view('admin.product.category.list',compact('categories'));
    }

    public function store(Request $request){
        
        $request->validate(
            [
                'name' => 'required|string|unique:product_categories,name',
            ],
            [
                'required' => 'Khong duoc de trong :attribute',
                'unique' => 'Ten danh muc da ton tai'
            ]
        );

        // $parent_cat_id = $request->input('parent_category');
        // $t = ProductCategory::find($parent_cat_id);
        // return ++$t->level ;
        
        // $input = $request->all();
        $input['name'] = $request->input('name');
        $input['status'] = $request->input('status');

        if( $request->input('parent_category') == '' ){
            $input['parent_cat_id'] = 0 ;
            $input['level'] = 1 ;
        }else{
            $parent_cat_id = $request->input('parent_category');
            $input['parent_cat_id'] = $parent_cat_id ;
            $parent_cat = ProductCategory::find($parent_cat_id);
            $level = ++$parent_cat->level;
            $input['level'] = $level ;
        }

        $input['image_url'] = null;
        
        // return $input;

        if($request->hasFile('upload_file')){
            // echo "Co file"."<br>";
            // lay kich thuoc file , duoi file , ten file
            $file = $request->file('upload_file');

            // dd($file) ;

            $fileName =  $file->getClientOriginalName();
            // return $fileName;

            // echo $file->getSize()."<br>";

            $file->move('public/storage/photos',$file->getClientOriginalName());

            $thumbnail = "public/storage/photos/".$fileName;

            $input['image_url'] = $thumbnail;
        }

        ProductCategory::create(
            [
                'name' => $input['name'],
                'status' => $input['status'] ,
                'parent_cat_id' => $input['parent_cat_id'] ,
                'level' => $input['level']  ,
                'image_url' => $input['image_url']
            ]
        );

        return redirect()->route('product.category.list')->with('status','Đã thêm danh mục sản phẩm thành công');
    }

    public function edit(ProductCategory $cat){

        $categories = ProductCategory::all();

        return view('admin.product.category.edit',compact('categories','cat'));
    }

    public function update(ProductCategory $cat, Request $request){
        
        $request->validate(
            [
                'name' => 'required|string|unique:product_categories,name,'.$cat->id,
            ],
            [
                'required' => 'Khong duoc de trong :attribute',
                'unique' => 'Ten danh muc da ton tai'
            ]
        );

        // dd($request->file('upload_file')) ;
        // return $request->all();

        if( $request->input('parent_category') == '' ){
            $parent_cat_id = 0 ;
            $level = 1 ;
        }else{
            $parent_cat_id = $request->input('parent_category');
            $parent_cat = ProductCategory::find($parent_cat_id);
            $level = ++$parent_cat->level;
        }

        if($request->hasFile('upload_file')){
            echo "Co file"."<br>";
            // lay kich thuoc file , duoi file , ten file
            $file = $request->file('upload_file');

            // dd($file) ;

            $fileName =  $file->getClientOriginalName();
            // return $fileName;

            // echo $file->getSize()."<br>";

            $file->move('public/storage/photos',$file->getClientOriginalName());

            $thumbnail = "public/storage/photos/".$fileName;
        }else{
            $thumbnail = $cat->image_url;
        }

        // return $thumbnail;

        $cat->update([
            'name' => $request->input('name'),
            'parent_cat_id' => $parent_cat_id,
            'status' =>  $request->input('status'),
            'level' => $level,
            'image_url' =>  $thumbnail
        ]); 
        return redirect()->route('product.category.list')->with('status','Da cap nhat thanh cong');
    }
    public function delete(ProductCategory $cat){
        $cat->delete();
        return redirect()->route('product.category.list')->with('status','Da xoa thanh cong');
        // return "Delete {$cat}";
    }

    // GUEST
    // FILTER CATEGORY
    public function filterCategory(ProductCategory $category){
        $categories = ProductCategory::all();
        $brands = ProductBrand::all();
        $products = $category->products;
        $cat = $category;
        return view('guest.product.category',compact('cat','categories','brands','products'));
    }
}
