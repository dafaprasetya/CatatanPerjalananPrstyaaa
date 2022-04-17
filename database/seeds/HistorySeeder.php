<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Faker\Factory as Faker;

class HistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        for($i = 1; $i <= 1000; $i++){

            DB::table('histories')->insert([
                'user_id' => $faker->numberBetween(1,51),
                'lokasi' => $faker->cityName(),
                'jam' => $faker->time('H:i'),
                'tanggal' => Carbon::parse($faker->dateTimeBetween('-1 week', '+1 week')),
                'suhu' => $faker->numberBetween(1,50),
            ]);
        }
    }
}
