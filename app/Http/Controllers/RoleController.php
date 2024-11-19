<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function index(){
        $roles = Role::get();
        return view('role-permission.role.index ', [
            'roles' => $roles
        ]);
    }

    public function create(){
           return view('role-permission.role.create');
    }

    public function store(Request $request){
         $request->validate([
            'name' =>[
                'required',
                'string',
                'unique:roles,name'
            ]
            ]);
      Role::create([
         'name' => $request->name
      ]);
        return redirect('roles') ->with('status','Responsibility Confirmed Successfully');
    }

    public function edit(Role $role){
         return view('role-permission.role.edit',[
            'role'=> $role
         ]);
    }

    public function update(Request $request, Role $role){

        $request->validate([
            'name' => [
                'required',
                'string',
                'unique:roles,name,'.$role->id
            ]

            ]);

            $role->update([
                'name' => $request->name
            ]);

            return redirect('roles')->with('status','Responsibility Modified Successfully');

    }

    public function destroy($roleId){
        $role =Role::find($roleId);
        $role->delete();
        return redirect('roles')->with('status', 'Responsibility Deleted Successfully');
    }

public function addPermissionToRole($roleId){
    $permissions = Permission::get();
    $role = Role::findOrFail($roleId);
    return view('role-permission.role.add-permissions', [
        'role'=>$role,
        'permissions' => $permissions
    ]);
}

public function givePermissionToRole(Request $request, $roleId)
{
    $request->validate([
        'permission' => 'required'
    ]);
    $role =Role::findOrFall($roleId);
    $role->syncPermissions($request->permission);

    return redirect()->back()->with('status','Entitlement added to Responsibility');
}
}
