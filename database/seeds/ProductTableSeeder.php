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
        foreach ($categories as $item) {
            $category = Category::where('slug', $item)->first();
            for ($i = 1; $i <= 5; $i++) {
                $product = new Product;
                $product->name = $faker->firstName();
                $product->description = $faker->sentence;
                $product->type = $faker->firstNameFemale;
                $product->price = $faker->randomFloat(2, 0, 500);
                $product->save();
                $product->getCategories()->attach($category);
            }
        }
    }
}

