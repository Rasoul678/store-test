<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreRole;
use Spatie\Permission\Models\Role;

interface RolePermissionControllerInterface
{
    public function indexRole();

    public function indexPermission();

    public function createRole();

    public function storeRole(StoreRole $request);

    public function editRole(Role $role);

    public function updateRole(StoreRole $request,Role $role);

    public function deleteRole(Role $role);
}
