<?php

namespace Database\Seeders;

use App\Models\Transport;

use Illuminate\Database\Seeder;

class TransportsTableSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        Transport::truncate(); //truncate es un método mágica

        $faker = \Faker\Factory::create(); //utilizaremos el método crear de Faker

        for ($i=0; $i < 3; $i++) {
            //Llamamos un método estático:
            Transport::create([
                //Atributos $fillable
                'type' => $faker -> name,
                'capacity' => $faker ->randomDigitNotNull,
                'instruments_capacity' => $faker -> randomFloat(2, 0, 1),
                'disponibility' => $faker -> boolean,
                'licence_plate' => $faker -> word,
                'calendar_id' => $faker -> numberBetween(1,3),

            ]);

        }
    }
}
