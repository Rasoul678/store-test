<?php

use App\Models\Category;
use Faker\Factory as Faker;
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
        $faker = Faker::create();
        Category::create([
            'name' => 'Mobile',
            'description' => 'This category belongs to mobile phone.This category belongs to mobile phone.',
        ]);
        Category::create([
            'name' => 'Clothes',
            'description' => 'This category belongs to clothes.This category belongs to clothes.',
        ]);
    }
}
