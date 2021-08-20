<?php

namespace Database\Seeders;

use App\Models\Concert;
use App\Models\Resource;
use App\Models\Artist;

use Illuminate\Database\Seeder;

class ConcertsTableSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        Concert::truncate(); //truncate es un método mágica

        $faker = \Faker\Factory::create(); //utilizaremos el método crear de Faker

        for ($i=0; $i < 3; $i++) {
            //Llamamos un método estático:
            $concert = Concert::create([
                //Atributos $fillable
                //'dateConcert' => $faker -> date('Y-m-d'), //Genra LoremIpsum para name, de tipo dateTime
                'dateConcert' => $faker -> dateTime, //Genra LoremIpsum para name, de tipo dateTime
                'name' => $faker -> name,
                'duration' => $faker ->time('H:i'),
                'free' => $faker -> boolean,
                'insitu' => $faker -> boolean,
                'festival_id' => $faker -> numberBetween(1,3),
                'place_id' => $faker -> numberBetween(1,3),

            ]);

            //Un concierto puede tener 1 recurso, el recurso X,o  2 recursos (X e Y)... o todos los n recursos
            $concert->resources()->saveMany(
                $faker->randomElements(
                    array(
                        Resource::find(1),
                        Resource::find(2),
                        Resource::find(3)
                    ), $faker->numberBetween(1, 3), false)
            );


            //Un concierto puede tener 1 artista,  o 2.. o todos los 3
            $concert->artists()->saveMany(
                $faker->randomElements(
                    array(
                        Artist::find(1),
                        Artist::find(2),
                        Artist::find(3)
                    ), $faker->numberBetween(1, 3), false)
            );

        }

    }
}
