<?php

namespace App\Http\Controllers;

use App\Permission;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class RoleController extends Controller
{
    public function list(){
        // if( Auth::user()->hasPermission('post.add') ){
        //     dd("Duoc phep add quyen") ;
        // }else{
        //     dd(" 0 Duoc phep add quyen");
        // }

        // return Gate::allows('role.view');
            
        // if (!Gate::allows('role.view')) {
        //     abort(403);
        // }

        $roles = Role::all();
        // return $roles;

        return view('admin.role.list',compact('roles'));
    }

    public function add(){
        $permissions = Permission::all()->groupBy( function($permission){
            return explode('.',$permission->slug)[0];
        } );

        // return $permissions;

        return view('admin.role.add',compact('permissions'));
    }

    public function store(Request $request){
        $request->validate(
            [
                'name' => 'required|string|unique:roles,name',
                'description' => 'required|string',
            ],
            [
                'required' => 'Truong :attribute khong duoc de trong',
                'unique' => ':attribute da ton tai tren he thong'
            ],
            [
                'name' => "ten",
                'description' => 'mo ta',
            ]
        );

        $role = Role::create([
            'name' => $request->input('name'),
            'description' => $request->input('description')
        ]);

        $role->permission()->attach($request->input('permission_id'));

        return redirect('admin/role')->with('status','Ban da them role thanh cong');
    }

    // public function edit($id){
    //     $role = Role::find($id);
    //     // return $role;
    //     $permissions = Permission::all()->groupBy( function($permission){
    //         return explode('.',$permission->slug)[0];
    //     } );

    //     return view('admin.role.edit',compact('role','permissions'));
    // }

    public function edit(Role $role){
        // return $role;
        $permissions = Permission::all()->groupBy( function($permission){
            return explode('.',$permission->slug)[0];
        } );

        return view('admin.role.edit',compact('role','permissions'));
    }

    public function update(Request $request , Role $role){
        $request->validate(
            [
                'name' => 'required|unique:roles,name,'.$role->id,
                'permission_id' => 'nullable|array',
                'permission_id.*' => 'exists:permissions,id',
            ]
        );

        $role->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ]);

        $role->permission()->sync( $request->input('permission_id',[]) );

        return redirect('/admin/role')->with('status','Da cap nhat role thanh cong');
    }

    public function delete(Role $role){
        $role->delete();
        return redirect('/admin/role')->with('status','Da xoa vai tro thanh cong');
    }
}
