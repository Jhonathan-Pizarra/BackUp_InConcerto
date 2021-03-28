<?php

use Illuminate\Database\Seeder;
use App\Festival;

class FestivalsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Festival::truncate();

        $faker = \Faker\Factory::create(); //utilizaremos el método crear de Faker
        $imagen = asset('/storage/festivals/carnaval.jpg');
        for ($i=0; $i < 3; $i++) {
            //Llamamos un método estático:
            Festival::create([
                //Atributos $fillable
                'name' => $faker -> name, //Genra LoremIpsum para name, de tipo name
                'description' => $faker -> sentence,
                //fala la iamgen
                'image' => $imagen
                //'image' => $faker->imageUrl(200, 200, null, false)
                //ya no falta la imágen...wao... :D :') !!!

            ]); //Laravel usa create, truncate, llamados a través de un método call statick

        }
    }
}