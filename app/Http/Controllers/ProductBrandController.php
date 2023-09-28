<?php

namespace App\Http\Controllers;

use App\ProductBrand;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductBrandController extends Controller
{
    public function list(){
        $brands = ProductBrand::all();
        return view('admin.product.brand.list',compact('brands'));
    }

    public function store(Request $request){
        $request->validate(
            [
                'brand_name' => 'required|string|unique:brands,brand_name',
                'brand_slug' => 'required|string'
            ],
            [
                'required' => 'Khong duoc de trong :attribute',
                'unique' => 'Ten danh muc da ton tai'
            ],
            [
                'brand_name' => 'ten nhan hang',
                'brand_slug' => 'duong dan'
            ]
        );

        $input['brand_name'] = $request->input('brand_name');
        $input['brand_desc'] = $request->input('brand_desc');
        $input['brand_slug'] =  Str::slug($request->input('brand_slug'));
        $input['brand_status'] = $request->input('status');
        
        ProductBrand::create($input);
        return redirect()->route('product.brand.list')->with('status','Da them brand thanh cong');
    }

    public function edit(Request $request , ProductBrand $brand){
        $brands = ProductBrand::all();
        return view('admin.product.brand.edit',compact('brands','brand'));
    }

    public function update(Request $request , ProductBrand $brand){
        $request->validate(
            [
                'brand_name' => 'required|string|unique:brands,brand_name,'.$brand->id,
                'brand_slug' => 'required|string'
            ],
            [
                'required' => 'Khong duoc de trong :attribute',
                'unique' => 'Ten danh muc da ton tai'
            ],
            [
                'brand_name' => 'ten nhan hang',
                'brand_slug' => 'duong dan'
            ]
        );

        // return $request->all();
        $input['brand_name'] = $request->input('brand_name');
        $input['brand_desc'] = $request->input('brand_desc');
        $input['brand_slug'] = $request->input('brand_slug');
        $input['brand_status'] = $request->input('status');
        
        $brand->update($input);

        return redirect()->route('product.brand.list')->with('status','Da update brand thanh cong');
    }
    public function delete(ProductBrand $brand){
        $brand->delete();
        return redirect()->route('product.brand.list')->with('status','Da xoa brand thanh cong');
    }
}
