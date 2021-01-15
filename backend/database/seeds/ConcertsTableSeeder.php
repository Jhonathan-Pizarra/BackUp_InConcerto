<?php

use Illuminate\Database\Seeder;
use App\Concert;

class ConcertsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Concert::truncate(); //truncate es un método mágica

        $faker = \Faker\Factory::create(); //utilizaremos el método crear de Faker

        for ($i=0; $i < 7; $i++) {
            //Llamamos un método estático:
            Concert::create([
                //Atributos $fillable
                'dateConcert' => $faker -> dateTime, //Genra LoremIpsum para name, de tipo dateTime
                'name' => $faker -> name,
                'duration' => $faker ->time('H:i:s'),
                'free' => $faker -> boolean,
                'insitu' => $faker -> boolean,
                'festival_id' => $faker -> numberBetween(1,3),
                'place_id' => $faker -> numberBetween(1,5),

            ]);

        }
    }
}
