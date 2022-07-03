<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');
        for ($i = 0; $i < 10; $i++) {
            DB::table('doctors')->insert([
                'name' => $faker->name,
                'birth_date' => $faker->dateTimeBetween('-60 years', '-18 years')->format('Y-m-d'),
                'specialization' => $faker->jobTitle,
                'number_SIP' => $faker->numberBetween(100000000, 999999999),
                'number_phone' => $faker->phoneNumber,
                'address' => $faker->address,
                'image' => 'https://i.pravatar.cc/300?u=' . $i,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
