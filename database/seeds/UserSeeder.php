<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        for($i = 1; $i <= 50; $i++){
            DB::table('users')->insert([
                'nik' => $faker->nik,
                'name' => $faker->name,
                'birthdate' => Carbon::parse('2000-01-01'),
                'email' => $faker->name.'@gmail.com',
                'password' => Hash::make('password'),
            ]);
        }

    }
}
