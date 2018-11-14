<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;

class roletable extends Seeder
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
        $role_client = Role::where('name', 'client')->first();
        $role_admin = Role::where('name', 'admin')->first();


        $client = new User();
        $client->name = 'client Name';
        $client->email = $faker->email;
        $client->password = bcrypt('123456');
        $client->activation_token = str_random(60);
        $client->save();
        $client->roles()->attach($role_client);


        $admin = new User();
        $admin->name = 'admin Name';
        $admin->email = $faker->email;
        $admin->password = bcrypt('123456');
        $admin->activation_token = str_random(60);
        $admin->save();
        $admin->roles()->attach($role_admin);

        $admin = new User();
        $admin->name = 'admin Name';
        $admin->email = $faker->email;
        $admin->password = bcrypt('123456');
        $admin->activation_token = str_random(60);
        $admin->save();
        $admin->roles()->attach($faker->randomElement([$role_client, $role_admin]));

    }
}
