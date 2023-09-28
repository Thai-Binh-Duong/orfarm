<?php

namespace App\Http\Controllers;

use App\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class SlideController extends Controller
{
    public function __construct() {
        $this->middleware(function($request,$next){
            session(['module_active' => 'slide']);
            return $next($request);
        });
    }

    public function list(){
        $slides = Slide::all();
        return view('admin.slide.list',compact('slides'));
    }

    public function add(){
        return view('admin.slide.add');
    }

    public function store(Request $request){

        $request->validate(
            [
                'slide_link' => 'required|string',
                'slide_slug' => 'required|string',
            ],
            [
                'required' => 'Khong duoc de trong truong :attribute',
            ],
            [
                'slide_link' => 'link',
                'slide_slug' => 'slug',
            ]
        );

        $input['slide_link'] = $request->input('slide_link');
        $input['slide_slug'] = Str::slug($request->input('slide_slug'));
        $input['admin'] = Auth::user()->name;

        if( $request->hasFile('slide_image') ){
            $file  = $request->file('slide_image');
            $fileName = $file->getClientOriginalName();
            $file->move('public/storage/photos/1/slide',$file->getClientOriginalName());
            $thumbnail = "public/storage/photos/1/slide/".$fileName;
            $input['slide_image'] = $thumbnail;
        }else{
            // $request->session()->flash('error_slide_image','Không được để trống hình ảnh slide');
            session(['error_slide_image' => 'Không được để trống hình ảnh slide']);
            // $error['slide_image'] = "Không được để trống hình ảnh slide";
        }

        Slide::create($input);
        return redirect()->route('admin.slide.list')->with('status','Da them slide thanh cong');
    }

    public function edit(Request $request,Slide $slide){

        return view('admin.slide.edit',compact('slide'));
    }

    public function update(Request $request,Slide $slide){
        $request->validate(
            [
                'slide_link' => 'required|string',
                'slide_slug' => 'required|string',
            ],
            [
                'required' => 'Khong duoc de trong truong :attribute',
            ],
            [
                'slide_link' => 'link',
                'slide_slug' => 'slug',
            ]
        );

        if( $request->hasFile('slide_image') ){
            $file  = $request->file('slide_image');
            $fileName = $file->getClientOriginalName();
            $file->move('public/storage/photos/1/slide',$file->getClientOriginalName());
            $thumbnail = "public/storage/photos/1/slide/".$fileName;
        }else{
            $thumbnail = $slide->slide_image;
        }

        $slide->update([
            'slide_link' => $request->input('slide_link'),
            'slide_slug' => Str::slug($request->input('slide_slug')),
            'slide_image' => $thumbnail
        ]);
        return redirect()->route('admin.slide.list')->with('status','Da cap nhat slide thanh cong');
    }

    public function delete(Slide $slide){
        $slide->delete();
        return redirect()->route('admin.slide.list')->with('status','Da xoa slide thanh cong');
    }
}
