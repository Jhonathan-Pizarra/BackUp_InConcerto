<?php

namespace Database\Seeders;

use App\Models\Feeding;

use Illuminate\Database\Seeder;

class FeedingsTableSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        Feeding::truncate(); //truncate es un método mágica

        $faker = \Faker\Factory::create(); //utilizaremos el método crear de Faker

        for ($i=0; $i < 3; $i++) {
            //Llamamos un método estático:
            Feeding::create([
                //Atributos $fillable
                'date' => $faker -> dateTime, //Genra LoremIpsum para name, de tipo dateTime
                'food' => $faker -> name,
                'observation' => $faker ->text,
                'quantityLunchs' => $faker -> randomDigitNotNull,
                'user_id' => $faker -> numberBetween(1, 3),
                'artist_id' => $faker -> numberBetween(1, 3),
                'place_id' => $faker -> numberBetween(1, 3)
            ]);

        }
    }
}
