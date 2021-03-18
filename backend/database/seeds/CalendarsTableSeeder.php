<?php

use Illuminate\Database\Seeder;
use App\Calendar;

class CalendarsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Calendar::truncate(); //truncate es un método mágica

        $faker = \Faker\Factory::create(); //utilizaremos el método crear de Faker

        for ($i=0; $i < 7; $i++) {
            //Llamamos un método estático:
            Calendar::create([
                //Atributos $fillable
                'checkIn_Artist' => $faker -> dateTime, //Genra LoremIpsum para name, de tipo dateTime
                'checkOut_Artist' => $faker -> dateTime,
                'comingFrom' => $faker ->word,
                'flyNumber' => $faker -> word,
               // 'artist_id' => $faker -> unique()-> numberBetween(1,10),
            ]);

        }
    }
}
