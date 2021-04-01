<?php

namespace Database\Seeders;

use App\Models\FeedingPlace;

use Illuminate\Database\Seeder;

class FeedingPlacesTableSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        FeedingPlace::truncate(); //truncate es un método mágica

        $faker = \Faker\Factory::create(); //utilizaremos el método crear de Faker

        for ($i=0; $i < 6; $i++) {
            //Llamamos un método estático:
            FeedingPlace::create([
                //Atributos $fillable
                'name' => $faker -> name,
                'address' => $faker ->sentence,
                'permit' => $faker -> boolean,
                'aforo' => $faker -> randomDigitNotNull,
            ]);

        }
    }
}
