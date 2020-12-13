<?php

use Illuminate\Database\Seeder;
use App\ActivityFestival;

class ActivityFestivalsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ActivityFestival::truncate(); //truncate es un método mágica

        $faker = \Faker\Factory::create(); //utilizaremos el método crear de Faker

        for ($i=0; $i < 7; $i++) {
            //Llamamos un método estático:
            ActivityFestival::create([
                //Atributos $fillable
                'name' => $faker -> name,
                'date' => $faker -> date('Y-m-d'),
                'description' => $faker ->sentence,
                'observation' => $faker -> sentence,

            ]);
        }
    }
}
