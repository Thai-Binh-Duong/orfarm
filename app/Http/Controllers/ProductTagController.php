<?php

namespace App\Http\Controllers;

use App\ProductTag;
use Illuminate\Http\Request;

class ProductTagController extends Controller
{
    public function list(){
        $tags = ProductTag::all();
        return view('admin.product.tag.list',compact('tags'));
    }

    public function store(Request $request){
        $request->validate(
            [
                'name' => 'required|string|unique:tags,name',
            ],
            [
                'required' => 'Khong duoc de trong :attribute',
                'unique' => 'Ten tag da ton tai'
            ],
            [
                'name' => 'tag',
            ]
        );

        $input['name'] = $request->input('name');
        
        ProductTag::create($input);
        return redirect()->route('product.tag.list')->with('status','Da them tag thanh cong');
    }

    public function edit(Request $request , ProductTag $tag){
        $tags = ProductTag::all();
        return view('admin.product.tag.edit',compact('tags','tag'));
    }

    public function update(Request $request , ProductTag $tag){
        $request->validate(
            [
                'name' => 'required|string|unique:tags,name,'.$tag->id,
            ],
            [
                'required' => 'Khong duoc de trong :attribute',
                'unique' => 'Ten tag da ton tai'
            ],
            [
                'name' => 'tag'
            ]
        );

        // return $request->all();
        $input['name'] = $request->input('name');
        
        $tag->update($input);

        return redirect()->route('product.tag.list')->with('status','Da update tag thanh cong');
    }

    public function delete(ProductTag $tag){
        $tag->delete();
        return redirect()->route('product.tag.list')->with('status','Da xoa tag thanh cong');
    }
}
