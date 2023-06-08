<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');
        $password = Hash::make('password');
        DB::table('users')->insert([
            'name' => $faker->name,
            'email' => 'admin@mail.com',
            'password' => $password,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        for ($i = 0; $i < 10; $i++) {
            $password = Hash::make('password');
            DB::table('users')->insert([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => $password,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
