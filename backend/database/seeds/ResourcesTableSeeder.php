<?php

use Illuminate\Database\Seeder;
use App\Resource;

class ResourcesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Resource::truncate(); //truncate es un método mágica

        $faker = \Faker\Factory::create(); //utilizaremos el método crear de Faker

        for ($i=0; $i < 7; $i++) {
            //Llamamos un método estático:
            Resource::create([
                //Atributos $fillable
                'name' => $faker -> name,
                'quantity' => $faker ->randomDigitNotNull, //Numero entero sin digitos
                'description' => $faker -> text,
            ]);

        }
    }
}
