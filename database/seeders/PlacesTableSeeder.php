<?php

namespace Database\Seeders;

use App\Models\Place;

use Illuminate\Database\Seeder;

class PlacesTableSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        Place::truncate();

        $faker = \Faker\Factory::create(); //utilizaremos el método crear de Faker

        for ($i=0; $i < 5; $i++) {
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
