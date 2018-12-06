<?php
/**
 * Copyright (c) 2018.
 * sanjay kranthi  kranthi0987@gmail.com
 */

use Illuminate\Database\Seeder;

class productcategorytableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker\Factory::create();
        for ($i = 0; $i < 100; $i++) {
            \App\Models\ProductCategory::create([
                'product_category_name' => $faker->word,
                'product_category_description' => $faker->sentence

            ]);
        }
    }
}
