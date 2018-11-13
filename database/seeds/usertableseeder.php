<?php

use Illuminate\Database\Seeder;

class usertableseeder extends Seeder
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
        //
        User::create([
            'name' => "kkkk",
            'email' => "test@gmail.com",
            'password' => bcrypt('123456'),
            'activation_token' => str_random(60)

        ]);
        User::create([
            'name' => "kkkk",
            'email' => "test1@gmail.com",
            'password' => bcrypt('123456'),
            'activation_token' => str_random(60)

        ]);
        for ($i = 0; $i < 10; $i++) {
            User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => bcrypt('123456'),
                'activation_token' => str_random(60)
            ]);
        }
    }
}
