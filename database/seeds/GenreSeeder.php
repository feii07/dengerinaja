<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class GenreSeeder extends Seeder
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
            DB::table('genres')->insert([
                'id'=>$faker->unique()->word
            ]);
        }
    }
}
