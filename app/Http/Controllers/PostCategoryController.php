<?php

namespace App\Http\Controllers;

use App\PostCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class PostCategoryController extends Controller
{
    public function __construct() {
        $this->middleware(function($request,$next){
            session(['module_active' => 'post']);
            return $next($request);
        });
    }
    
    public function list(){
        $categories = PostCategory::all();
        $admins = User::all();
        return view('admin.post.category.list',compact('categories','admins'));
    }

    public function store(Request $request){
        $request->validate(
            [
                'name' => 'required|string|unique:post_categories,name'
            ],
            [
                'required' => 'Khong duoc de trong truong :attribute'
            ],
            [
                'name' => 'ten'
            ]
        );

        $input['name'] = $request->input('name');
        $input['admin_id'] = Auth::user()->id;
        
        PostCategory::create($input);

        return redirect()->route('admin.post.category.list')->with('status','Da them danh muc bai viet thanh cong');
    }

    public function edit(Request $request,PostCategory $post){
        $categories = PostCategory::all();
        $admins = User::all();
        return view('admin.post.category.edit',compact('categories','post','admins'));
    }

    public function update(Request $request,PostCategory $post){
        $request->validate(
            [
                'name' => 'required|string|unique:post_categories,name'
            ],
            [
                'required' => 'Khong duoc de trong truong :attribute'
            ],
            [
                'name' => 'ten'
            ]
        );

        $post->update([
            'name' => $request->input('name')
        ]);

        return redirect()->route('admin.post.category.list')->with('status','Da cap nhat danh muc bai viet thanh cong');
    }

    public function delete(PostCategory $post){
        $post->delete();
        return redirect()->route('admin.post.category.list')->with('status','Da xoa danh muc bai viet thanh cong');
    }
}
