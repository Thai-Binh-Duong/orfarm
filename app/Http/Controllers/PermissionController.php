<?php

namespace App\Http\Controllers;

use App\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function __construct() {
        $this->middleware(function($request,$next){
            session(['module_active' => 'permission']);
            return $next($request);
        });
    }

    public function add(){

        $permissions = Permission::all()->groupBy( function($permission) {
            return explode('.',$permission->slug)[0];
        });
        // return $permissions;
        return view('admin.permission.add',compact('permissions'));
    }

    public function store(Request $request){
        $request->validate(
            [
                'name' => 'required|string',
                'slug' => 'required|string',
                'description' => 'required|string',
            ],
            [
                'required' => 'Truong :attribute khong duoc de trong',
            ],
            [
                'name' => "ten",
                'slug' => 'duong dan',
                'description' => 'mo ta',
            ]
        );

        // return $request->input();
        Permission::create([
            'name' => $request->input('name'),
            'slug' => $request->input('slug'),
            'description' =>  $request->input('description'),
        ]);

        return redirect('/admin/permission/add')->with('status','Da them permission thanh cong');
    }

    public function edit($id){
        $permissions = Permission::all()->groupBy( function($permission) {
            return explode('.',$permission->slug)[0];
        });

        $permission = Permission::find($id);
        // return $permission;
        return view('admin.permission.edit',compact('permissions','permission'));
    }

    public function update(Request $request,$id){
        $request->validate(
            [
                'name' => 'required|string',
                'slug' => 'required|string',
                'description' => 'required|string',
            ],
            [
                'required' => 'Truong :attribute khong duoc de trong',
            ],
            [
                'name' => "ten",
                'slug' => 'duong dan',
                'description' => 'mo ta',
            ]
        );
        // return $id;

        // return $request->input();
        Permission::where('id',$id)->update([
            'name' => $request->input('name'),
            'slug' => $request->input('slug'),
            'description' =>  $request->input('description'),
        ]);

        return redirect('admin/permission/add')->with('status','Cap nhat thanh cong');
    }

    public function delete($id){
        $permission = Permission::find($id);
        $permission->delete();
        return redirect('/admin/permission/add')->with('status','Xoa permission thanh cong');
    }

}
