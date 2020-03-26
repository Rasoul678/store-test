<?php

use App\Models\Category;
use App\Models\Product;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;


class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds for product table.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $categories = ['mobile', 'clothes'];
        foreach ($categories as $category) {
            for ($i = 1; $i <= 5; $i++) {
                $product = new Product;
                $product->name = $faker->name;
                $product->description = $faker->text;
                $product->type = $faker->name;
                $product->price = $faker->randomFloat(2, 0, 500);
                $product->save();
                $category = Category::where('slug', $category)->first();
                $product->getCategories()->attach($category);
            }
        }
    }
}

