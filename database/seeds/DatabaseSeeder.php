<?php

use App\User;
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
        $faker = Faker\Factory::create();
        //
        User::create([
            'name'=>"kkkk",
            'email'=>"test@gmail.com",
            'password'=>bcrypt('123456'),
            'activation_token'=>str_random(60)

        ]);
        User::create([
            'name'=>"kkkk",
            'email'=>"test1@gmail.com",
            'password'=>bcrypt('123456'),
            'activation_token' => str_random(60)

        ]);
        for ($i=0; $i < 10; $i++) {
            User::create([
                'name' =>$faker->name,
                'email' => $faker->email,
                'password' => bcrypt('123456'),
                'activation_token' => str_random(60)
            ]);
        }
    }
}
