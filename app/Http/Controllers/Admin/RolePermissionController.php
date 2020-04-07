<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRole;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionController extends Controller implements RolePermissionControllerInterface
{
    public function __construct()
    {
        $this->middleware(['role:SuperAdmin', 'permission:add role|edit role|delete role']);
    }

    public function indexRole()
    {
        $roles = Role::where('name', '!=', 'SuperAdmin')
            ->orderBy('id')
            ->with('permissions')
            ->get();
        return view('admin.roles.index', compact('roles'));
    }

    public function indexPermission()
    {
        $permissions = Permission::orderBy('id')
            ->with('roles')
            ->get();
        return view('admin.roles.permissionsIndex', compact('permissions'));
    }

    public function createRole()
    {
        $permissions = Permission::all();
        return view('admin.roles.create', compact('permissions'));
    }

    public function storeRole(StoreRole $request)
    {
        $role = Role::create(['name' => $request->validated()['name']]);
        $role->givePermissionTo($request->validated()['permissions']);
        return $this->indexRole();
    }

    public function editRole(Role $role)
    {
        $permissions = Permission::orderBy('id')->get();
        return view('admin.roles.edit')
            ->with(compact('role'))
            ->with(compact('permissions'));
    }

    public function updateRole(StoreRole $request, Role $role)
    {
        $role->syncPermissions($request->validated()['permissions']);
        $role->name = $request->validated()['name'];
        $role->save();
        return redirect()->back();
    }

    public function deleteRole(Role $role)
    {
        $role->delete();
        return redirect()->back();
    }
}
