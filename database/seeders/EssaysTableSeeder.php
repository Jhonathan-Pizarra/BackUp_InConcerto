<?php

namespace Database\Seeders;

use App\Models\Essay;

use Illuminate\Database\Seeder;

class EssaysTableSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        Essay::truncate(); //truncate es un método mágica

        $faker = \Faker\Factory::create(); //utilizaremos el método crear de Faker

        for ($i=0; $i < 3; $i++) {
            //Llamamos un método estático:
            Essay::create([
                //Atributos $fillable
                'dateEssay' => $faker -> dateTime, //Genra LoremIpsum para name, de tipo dateTime
                'name' => $faker -> name,
                'place' => $faker -> name,
                'festival_id' => $faker -> numberBetween(1, 3),

            ]);

        }
    }
}
