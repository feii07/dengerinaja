<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class SubSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $genre = DB::table('genres')->pluck('id');
        $member = DB::table('members')->pluck('id');
        foreach(range(0,5) as $i){
            DB::table('subscriptions')->insert([
                'member'=>$faker->randomElement($member),
                'genre'=>$faker->randomElement($genre)
            ]);
        }
    }
}
