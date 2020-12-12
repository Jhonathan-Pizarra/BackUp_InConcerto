<?php

use Illuminate\Database\Seeder;
use App\Place;

class PlacesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Place::truncate();

        $faker = \Faker\Factory::create(); //utilizaremos el método crear de Faker

        for ($i=0; $i < 7; $i++) {
            //Llamamos un método estático:
            Place::create([
                //Atributos $fillable
                'name' => $faker -> name, //Genra LoremIpsum para name, de tipo name
                'address' => $faker -> sentence,
                'permit' => $faker -> boolean,
                'aforo' => $faker -> randomDigitNotNull,
                'description' => $faker -> text,

            ]);

        }
    }
}
