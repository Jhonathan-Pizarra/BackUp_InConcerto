<?php

namespace Database\Seeders;

use App\Models\Lodging;

use Illuminate\Database\Seeder;

class LodgingsTableSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        Lodging::truncate(); //truncate es un método mágica

        $faker = \Faker\Factory::create(); //utilizaremos el método crear de Faker

        for ($i=0; $i < 3; $i++) {
            //Llamamos un método estático:
            Lodging::create([
                //Atributos $fillable
                'name' => $faker -> name,
                'type' => $faker -> word,
                'description' => $faker ->word,
                'observation' => $faker -> sentence,
                'checkIn' => $faker -> date('Y-m-d'),
                'checkOut' => $faker -> date('Y-m-d'),
            ]);

        }
    }
}
