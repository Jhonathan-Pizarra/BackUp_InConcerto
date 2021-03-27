<?php

use Illuminate\Database\Seeder;
use App\Concert;
use App\Resource;
use App\Artist;

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
            $concert = Concert::create([
                //Atributos $fillable
                'dateConcert' => $faker -> dateTime, //Genra LoremIpsum para name, de tipo dateTime
                'name' => $faker -> name,
                'duration' => $faker ->time('H:i:s'),
                'free' => $faker -> boolean,
                'insitu' => $faker -> boolean,
                'festival_id' => $faker -> numberBetween(1,5),
                'place_id' => $faker -> numberBetween(1,5),

            ]);

            //Un concierto puede tener 1 recurso, el recurso X,o  2 recursos (X e Y)... o todos los n recursos
            $concert->resources()->saveMany(
                $faker->randomElements(
                    array(
                        Resource::find(1),
                        Resource::find(2),
                        Resource::find(3),
                        Resource::find(4),
                        Resource::find(5),
                        Resource::find(6),
                        Resource::find(7)
                    ), $faker->numberBetween(1, 7), false)
            );


            //Un concierto puede tener 1 artista,  o 2.. o todos los 10
            $concert->artists()->saveMany(
                $faker->randomElements(
                    array(
                        Artist::find(1),
                        Artist::find(2),
                        Artist::find(3),
                        Artist::find(4),
                        Artist::find(5),
                        Artist::find(6),
                        Artist::find(7),
                        Artist::find(8),
                        Artist::find(9),
                        Artist::find(10)
                    ), $faker->numberBetween(1, 10), false)
            );

        }

    }
}
