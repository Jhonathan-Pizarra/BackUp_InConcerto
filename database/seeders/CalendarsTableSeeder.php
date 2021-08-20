<?php

namespace Database\Seeders;

use App\Models\Calendar;

use Illuminate\Database\Seeder;

class CalendarsTableSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        Calendar::truncate(); //truncate es un método mágica

        $faker = \Faker\Factory::create(); //utilizaremos el método crear de Faker

        for ($i=0; $i < 3; $i++) {
            //Llamamos un método estático:
            Calendar::create([
                //Atributos $fillable
                'checkIn_Artist' => $faker -> dateTime, //Genra LoremIpsum para name, de tipo dateTime
                'checkOut_Artist' => $faker -> dateTime,
                'comingFrom' => $faker ->word,
                'flyNumber' => $faker -> word,
            ]);

        }
    }
}
