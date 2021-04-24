<?php

namespace Database\Seeders;

use App\Models\Festival;

use Illuminate\Database\Seeder;

class FestivalsTableSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        Festival::truncate();

        $faker = \Faker\Factory::create(); //utilizaremos el método crear de Faker
        $imagen = $faker->image('public/storage/festivals', 200,200, null, false);
        for ($i=0; $i < 3; $i++) {
            //Llamamos un método estático:
            Festival::create([
                //Atributos $fillable
                'name' => $faker -> name, //Genra LoremIpsum para name, de tipo name
                'description' => $faker -> sentence,
                //fala la iamgen
                'image' => 'festivals/'.$imagen
                //'image' => $faker->imageUrl(200, 200, null, false)
                //ya no falta la imágen...wao... :D :') !!!

            ]); //Laravel usa create, truncate, llamados a través de un método call statick

        }
    }
}
