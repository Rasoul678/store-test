<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionsRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        /**
         *Defining permissions
         *
         * @var array $permissions
         */
        $permissions = [
            'admin',
            'add role',
            'edit role',
            'delete role',
            'add user',
            'edit user',
            'delete user',
            'add product',
            'edit product',
            'delete product',
            'permanent delete product',
            'add category',
            'edit category',
            'delete category',
            'permanent delete category',
            'add cart item',
            'edit cart item',
            'delete cart item',
            'add order',
            'edit order',
            'delete order',
        ];

        foreach ($permissions as $permission) {
            Permission::create([
                'name' => $permission,
            ]);
        }

        /**
         * Defining roles.
         */
        Role::create(['name' => 'SuperAdmin']);
        $customerRole = Role::create(['name' => 'Customer']);

        /**
         * Assigning permissions to customer role.
         */
        $customerRole->givePermissionTo('add cart item');
        $customerRole->givePermissionTo('edit cart item');
        $customerRole->givePermissionTo('delete cart item');
        $customerRole->givePermissionTo('add order');
    }
}
