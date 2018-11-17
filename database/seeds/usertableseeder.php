<?php

use App\User;
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
        $faker = Faker\Factory::create();
        User::create([
            'user_name' => "kkkk",
            'email' => "test@gmail.com",
            'user_id' => $faker->numberBetween(1, 999),
            'address_id' => $faker->numberBetween(0, 999),
            'user_phone_number' => $faker->phoneNumber,
            'password' => bcrypt('123456'),
            'user_other_details' => $faker->address,
            'activation_token' => str_random(60)
//roles()->attach()$faker->randomElement(['seller', 'buyer']),

        ]);
        User::create([
            'user_name' => "kkkk",
            'email' => "test1@gmail.com",
            'user_id' => $faker->numberBetween(1, 999),
            'address_id' => $faker->numberBetween(0, 999),
            'user_phone_number' => $faker->phoneNumber,
            'user_other_details' => $faker->address,
            'password' => bcrypt('123456'),
            'activation_token' => str_random(60)

        ]);
        for ($i = 0; $i < 3; $i++) {
            User::create([
                'user_name' => $faker->name,
                'email' => $faker->email,
                'user_id' => $faker->numberBetween(1, 999),
                'address_id' => $faker->numberBetween(0, 999),
                'user_phone_number' => $faker->phoneNumber,
                'user_other_details' => $faker->address,
                'password' => bcrypt('123456'),
                'activation_token' => str_random(60)
            ]);
        }

    }
}
