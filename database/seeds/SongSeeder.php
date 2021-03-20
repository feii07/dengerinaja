
<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class SongSeeder extends Seeder
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
        $artist = DB::table('artists')->pluck('id');
        foreach(range(0,5) as $i){
            DB::table('songs')->insert([
                'title'=>$faker->word,
                'releaseYear'=>$faker->year,
                'artist'=>$faker->randomElement($artist),
                'genre'=>$faker->randomElement($genre)
            ]);
        }
    }
}
