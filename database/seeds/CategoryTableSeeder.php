<?php

use App\Models\Category;
use Illuminate\Database\Seeder;


class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds for category table.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name'          =>  'Root',
            'description'   =>  'This is the root category, don\'t delete this one',
            'parent_id'     =>  null,
        ]);
        
        Category::create([
            'name' => 'Mobiles',
            'description' => 'This category belongs to mobile phone.This category belongs to mobile phone.',
            'parent_id'     =>  1,
        ]);
        Category::create([
            'name' => 'Clothes',
            'description' => 'This category belongs to clothes.This category belongs to clothes.',
            'parent_id'     =>  1,
        ]);
    }
}
