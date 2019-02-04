<?php
/**
 * Copyright (c) 2019.
 * sanjay kranthi  kranthi0987@gmail.com
 */

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(usertableseeder::class);
        $this->call(productcategorytableSeeder::class);
        $this->call(DevicesSeeder::class);
        // Role comes before User seeder here.
//        $this->call(RoleTableSeeder::class);
//        $this->call(roletable::class);
    }
}
