<?php

use Illuminate\Database\Seeder;
use App\Concert;
use App\Resource;

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
                'festival_id' => $faker -> numberBetween(1,3),
                'place_id' => $faker -> numberBetween(1,5),

            ]);
            //Un concierto puede tener 1 recurso, el recurso X,o  2 recursos (X e Y)... o todos los 7
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
        }

    }
}
