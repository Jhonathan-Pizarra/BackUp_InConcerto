<?php

namespace Database\Seeders;

use App\Models\ActivityFestival;
use Illuminate\Database\Seeder;

class ActivityFestivalsTableSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        ActivityFestival::truncate(); //truncate es un método mágica

        $faker = \Faker\Factory::create(); //utilizaremos el método crear de Faker

        for ($i=0; $i < 3; $i++) {
            //Llamamos un método estático:
            ActivityFestival::create([
                //Atributos $fillable
                'name' => $faker -> name,
                'date' => $faker -> date('Y-m-d'),
                'description' => $faker ->sentence,
                'observation' => $faker -> sentence,
                'festival_id' => $faker -> numberBetween(1, 3),
                'user_id' => $faker -> numberBetween(1, 3),
            ]);
        }
    }
}
