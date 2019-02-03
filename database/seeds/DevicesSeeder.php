<?php
/**
 * Copyright (c) 2019.
 * sanjay kranthi  kranthi0987@gmail.com
 */

use App\Models\DeviceModel;
use Illuminate\Database\Seeder;

class DevicesSeeder extends Seeder
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
        for ($i = 0; $i < 10; $i++) {
            DeviceModel::create([
                'device_model' => $faker->md5,
                'device_resolution' => $faker->md5,
                'device_id' => $faker->md5,
                'registered' => $faker->boolean
            ]);
        }
    }
}
