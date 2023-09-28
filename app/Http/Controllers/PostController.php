<?php

namespace App\Http\Controllers;

use App\Post;
use App\PostCategory;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function __construct() {
        $this->middleware(function($request,$next){
            session(['module_active' => 'post','nav_active' => 'blog']);
            return $next($request);
        });
    }

    public function list(Request $request){
        // return $request->all();

        if( $request->input('keyword'))  {
            $keyword = $request->input('keyword');
        }else{
            $keyword = '';
        }
        // return $keyword;
        
        $posts = Post::where('post_title','LIKE',"%{$keyword}%")->paginate(10);

        // return $posts;

        $categories = PostCategory::all();
        
        $admins = User::where('is_admin','1')->get();
        return view('admin.post.list',compact('posts','categories','admins'));
    }

    public function action(Request $request){
        $action = $request->input('action');
        $check = $request->input('check');

        if( !empty($action) ){
            if( !empty($check) ){
                if( $action == 'delete' ){
                    Post::whereIn('id',$check)->delete();
                    return redirect()->route('admin.post.list')->with('status','Da xoa bai viet thanh cong');
                }
            }else{
                return redirect()->route('admin.post.list')->with('status','Moi chon bai viet');
            }
        }else{
            return redirect()->route('admin.post.list')->with('status','Moi chon nhiem vu can thuc hien');
        }
    }

    public function add(){
        $categories = PostCategory::all();
        return view('admin.post.add', compact('categories'));
    }

    public function store(Request $request){
        // return $request->all();
        $request->validate(
            [
                'post_title' => 'required|string|unique:posts,post_title',
                'post_description' => 'required|string',
                'post_content' => 'required|string',
                'category_id' => 'required',
            ],
            [
                'required' => 'Khong duoc de trong truong :attribute',
                'unique' => 'Ten bai viet da ton tai , moi chon ten khac'
            ],
            [
                'post_title' => 'tieu de bai viet',
                'post_description' => 'mo ta bai viet',
                'post_content' => 'noi dung bai viet',
                'category_id' => 'danh muc bai viet',
            ]
        );

        $input['post_title'] = $request->input('post_title');
        $input['post_description'] = $request->input('post_description');
        $input['post_content'] = $request->input('post_content');
        $input['admin_id'] = Auth::user()->id;
        $input['category_id'] = $request->input('category_id');

        // dd($file) ;
        if( $request->hasFile('post_image') ){
            $file = $request->file('post_image');
            $fileName = $file->getClientOriginalName();
            $file->move('public/storage/photos/1/blog',$file->getClientOriginalName());
            $thumbnail = "public/storage/photos/1/blog/".$fileName;
            $input['post_image'] = $thumbnail;
        }else{
            $input['post_image'] = '';
        }

        Post::create($input);
        return redirect()->route('admin.post.list')->with('status','Da them bai viet thanh cong');

    }
    public function edit(Request $request,Post $post){
        $categories = PostCategory::all();
        return view('admin.post.edit',compact('post','categories'));
    }
    public function update(Request $request,Post $post){
        $request->validate(
            [
                'post_title' => 'required|string|unique:posts,post_title,'.$post->id,
                'post_description' => 'required|string',
                'post_content' => 'required|string',
                'category_id' => 'required',
            ],
            [
                'required' => 'Khong duoc de trong truong :attribute',
                'unique' => 'Ten bai viet da ton tai , moi chon ten khac'
            ],
            [
                'post_title' => 'tieu de bai viet',
                'post_description' => 'mo ta bai viet',
                'post_content' => 'noi dung bai viet',
                'category_id' => 'danh muc bai viet',
            ]
        );

        // dd($file) ;
        if( $request->hasFile('post_image') ){
            $file = $request->file('post_image');
            $fileName = $file->getClientOriginalName();
            $file->move('public/storage/photos/1/blog',$file->getClientOriginalName());
            $thumbnail = "public/storage/photos/1/blog/".$fileName;
            // delete old image
            $old_file = $post->post_image;
            if (file_exists($old_file)) {
                unlink($old_file);
            }
            
        }else{
            $thumbnail = $post->post_image;
        }
        $post->update([
            'post_title' => $request->input('post_title'),
            'post_description' => $request->input('post_description'),
            'post_content' => $request->input('post_content'),
            'category_id' => $request->input('category_id'),
            'post_image' => $thumbnail
        ]);

        return redirect()->route('admin.post.list')->with('status','Da cap nhat bai viet thanh cong');

    }
    public function delete(Post $post){
        $post->delete();
        return redirect()->route('admin.post.list')->with('status','Da xoa bai viet thanh cong');
    }

    // GUEST
    public function show(Request $request){
        if( $request->input('keyword') ){
            $keyword = $request->input('keyword');
        }else{
            $keyword = '';
        }

        $posts = Post::where('post_title','LIKE',"%$keyword%")->paginate(6);
        $categories = PostCategory::all();
        $recent_posts = Post::orderBy('id','desc')->limit(6)->get();
        $special_posts = Post::orderBy('post_title','desc')->limit(3)->get();
        return view('guest.post.show',compact('posts','categories','recent_posts','special_posts'));
    }

    public function detail(Post $post){
        $admin = $post->admin->name;
        $category = $post->category->name;
        // get previous post
        $previous = Post::where('id','<', $post->id)->max('id');
        $previous_post = Post::find($previous);
        // get next post
        $next = Post::where('id','>', $post->id)->min('id');
        $next_post = Post::find($next);
        // return $previous."--".$next."--".$post->id;
        
        return view('guest.post.detail',compact('admin','category','post','previous_post','next_post'));
    }

    public function filter(PostCategory $category){
        $posts = Post::where('category_id',$category->id)->get();
        // return $posts;
        return view('guest.post.detail-category',compact('category','posts'));
    }
}
