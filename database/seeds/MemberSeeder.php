<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class MemberSeeder extends Seeder
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
            DB::table('members')->insert([
                'id'=>$faker->unique()->randomDigit,
                'name' => $faker->name,
                'joinedDate' => $faker->dateTimeBetween('-2 years','now')
            ]);
        }
        
    }
}
