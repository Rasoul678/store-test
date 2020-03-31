<?php

use Illuminate\Database\Seeder;
    use Spatie\Permission\Models\Permission;
    use Spatie\Permission\Models\Role;
    
    class RoleHasPermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::findById(1);
        $permissions = Permission::all();
        $role->syncPermissions($permissions);
    }
}
