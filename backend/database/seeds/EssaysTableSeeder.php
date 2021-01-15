<?php

use Illuminate\Database\Seeder;
use App\Essay;

class EssaysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Essay::truncate(); //truncate es un método mágica

        $faker = \Faker\Factory::create(); //utilizaremos el método crear de Faker

        for ($i=0; $i < 15; $i++) {
            //Llamamos un método estático:
            Essay::create([
                //Atributos $fillable
                'dateEssay' => $faker -> dateTime, //Genra LoremIpsum para name, de tipo dateTime
                'name' => $faker -> name,
                'place' => $faker -> name,
                'festival_id' => $faker -> numberBetween(1,3),

            ]);

        }
    }
}
