<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('permission:view role',['only' =>['index']]);
        $this->middleware('permission:create role',['only' =>['create','store']]);
        $this->middleware('permission:update role',['only' =>['update','edit']]);
        $this->middleware('permission:delete role',['only' =>['destroy']]);

    }
    public function index(){
        $permissions = Permission::get();
        return view('role-permission.permission.index ', [
            'permissions' => $permissions
        ]);
    }

    public function create(){
           return view('role-permission.permission.create');
    }

    public function store(Request $request){
         $request->validate([
            'name' =>[
                'required',
                'string',
                'unique:permissions,name'
            ]
            ]);
      Permission::create([
         'name' => $request->name
      ]);
        return redirect('permissions') ->with('status','Entitlement Confirmed Successfully');
    }

    public function edit(Permission $permission){
         return view('role-permission.permission.edit',[
            'permission'=> $permission
         ]);
    }

    public function update(Request $request, Permission $permission){

        $request->validate([
            'name' => [
                'required',
                'string',
                'unique:permissions,name,'.$permission->id
            ]

            ]);

            $permission->update([
                'name' => $request->name
            ]);

            return redirect('permissions')->with('status','Entitlements Modified Successfully');

    }

    public function destroy($permissionId){
        $permission =Permission::find($permissionId);
        $permission->delete();
        return redirect('permissions')->with('status', 'Entitlement Deleted Successfully');
    }
}
