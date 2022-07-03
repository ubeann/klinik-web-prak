<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PatientSeeder extends Seeder
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
        for ($i = 0; $i < 10; $i++) {
            DB::table('patients')->insert([
                'name' => $faker->name,
                'email' => $faker->email,
                'birth_date' => $faker->dateTimeBetween('-60 years', '-18 years')->format('Y-m-d'),
                'number_phone' => $faker->phoneNumber,
                'address' => $faker->address,
                'password' => $password,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
