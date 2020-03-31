<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
    
    class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'add admin',
            'add product',
            'add category',
            'edit product',
            'edit category',
            'delete product',
            'delete category'
            ];
        foreach ($permissions as $permission)
        {
            Permission::create([
                'name'      =>  $permission,
            ]);
        }
        
    }
}
