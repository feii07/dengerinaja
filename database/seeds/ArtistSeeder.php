<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ArtistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach(range(0,5) as $i){
            DB::table('artists')->insert([
                'id'=>$faker->unique()->randomDigit,
                'name' => $faker->name,
                'country' => $faker->country
            ]);
        }
    }
}
