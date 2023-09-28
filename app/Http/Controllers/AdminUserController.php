<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    public function __construct() {
        $this->middleware(function($request,$next){
            session(['module_active' => 'user']);
            return $next($request);
        });
    }

    public function list(Request $request){

        $status = $request->input('status');

        $list_action = [
            'delete' => "Xoa tam thoi",
        ];

        if( $status == 'active' || $status == ''){
            $keyword="";
            if($request->input('keyword')){
                $keyword = $request->input('keyword');
            }
            
            $users = User::where('name','LIKE',"%{$keyword}%")->paginate(10);
        }elseif( $status == 'trash' ){
            $list_action = [
                'restore' => "Khoi phuc",
                'forceDelete' => "Xoa vinh vien"
            ];
            $users = User::onlyTrashed()->paginate(10);
        }
        
        $count_user_active = User::count();
        $count_user_trash = User::onlyTrashed()->count();

        $count = [
            'count_user_active' => $count_user_active,
            'count_user_trash' => $count_user_trash
        ];

        // return $users;
        // dd($users->total());

        return view('admin.user.list',compact('users','count','list_action'));
    }

    public function add(){
        $roles = Role::all();
        return view('admin.user.add',compact('roles'));
    }

    public function store(Request $request){
        $request->validate(
            [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ],
            [
                'required' => "Khong duoc de trong truong :attribute",
                'max' => "Truong :attribute chi co nhieu nhat :max ki tu",
                'min' => "Truong :attribute co it nhat :min ki tu",
                'confirmed' => "Moi xac nhan lai mat khau",
            ],
            [
                'name' => "Ho ten",
                'email'=> 'Email',
                'password' => 'Mat khau',
            ]
        );

        // if( $request->input('btn-add') ){
        //     dd($request->input()) ;
        // }

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        $user->role()->attach($request->input('role'));

        return redirect('/admin/user/list')->with('status',"Them User thanh cong");
    }

    public function delete(User $user){

        // $user = User::find($id);
        $user->delete();
        return redirect('/admin/user/list')->with('status','Da xoa user thanh cong');
    }

    public function action(Request $request){
        $list_check = $request->input('list_check');

        if($list_check){
            // return $request->input('list_check');
            foreach( $list_check as $k => $id ){
                if( Auth::id() == $id ){
                    unset($list_check[$k]);
                }
            }
            if( !empty( $list_check ) ){
                $act = $request->input('act');
                // return $act;
                if( $act == 'delete' ){
                    User::destroy($list_check);
                    return redirect('/admin/user/list')->with('status','Xoa tam thoi thanh cong');
                }
                if( $act == 'restore' ){
                    User::withTrashed()->whereIn('id',$list_check)
                    ->restore();
                    return redirect('/admin/user/list')->with('status','Khoi phuc thanh cong');
                }
                if( $act == 'forceDelete' ){
                    User::withTrashed()->whereIn('id',$list_check)->forceDelete();
                    return redirect('/admin/user/list')->with('status','Xoa vinh vien thanh cong');
                }
            }return redirect('/admin/user/list');
        }return redirect('/admin/user/list');
    }

    public function edit(User $user){
        // $user = User::find($id);
        $roles = Role::all();
        return view('admin.user.update',compact('user','roles'));
    }

    public function update(Request $request ,User $user){
        $request->validate(
            [
                'name' => ['required', 'string', 'max:255'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ],
            [
                'required' => "Khong duoc de trong truong :attribute",
                'max' => "Truong :attribute chi co nhieu nhat :max ki tu",
                'min' => "Truong :attribute co it nhat :min ki tu",
                'confirmed' => "Moi xac nhan lai mat khau",
            ],
            [
                'name' => "Ho ten",
                'password' => 'Mat khau',
            ]
        );

        // User::where('id',$id)->update([
        //     'name' => $request->input('name'),
        //     'password' => Hash::make($request->input('password')) ,
        // ]);
        $user->update([
            'name' => $request->input('name'),
            'password' => Hash::make($request->input('password')) ,
        ]);

        $user->role()->sync( $request->input('role',[]));

        return redirect('/admin/user/list')->with('status','Cap nhat nguoi dung thanh cong');
    }
}
