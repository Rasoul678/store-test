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
            ->paginate(5);
        return view('admin.roles.index', compact('roles'));
    }

    public function indexPermission()
    {
        $permissions = Permission::orderBy('id')
            ->with('roles')
            ->paginate(10);
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
        flash('Role: ' . $role->name . ' has been successfully created.');
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
        flash('Role: ' . $role->name . ' has been successfully updated.');
        return $this->indexRole();
    }

    public function deleteRole(Role $role)
    {
        $role_name=$role->name;
        $role->delete();
        flash('Role: ' . $role_name . ' has been successfully deleted.');
        return $this->indexRole();
    }
}
