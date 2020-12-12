<?php

use Illuminate\Database\Seeder;
use App\Artist;

class ArtistsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Artist::truncate(); //truncate es un método mágica

        $faker = \Faker\Factory::create(); //utilizaremos el método crear de Faker

        for ($i=0; $i < 7; $i++) {
            //Llamamos un método estático:
            Artist::create([
                //Atributos $fillable
                'ciOrPassport' => $faker ->dateTime, //Genra LoremIpsum para name, de tipo dateTime
                'artisticOrGroupName' => $faker ->name,
                'name' => $faker ->firstName,
                'lastName' => $faker ->lastName,
                'nationality' => $faker ->country,
                'mail' => $faker ->email,
                'phone' => $faker ->phoneNumber,
                'passage' => $faker ->boolean,
                'instruments' => $faker ->name,
                'emergencyPhone' => $faker ->phoneNumber,
                'emergencyMail' => $faker ->email,
                'foodGroup' => $faker ->word,
                'observation' => $faker ->sentence,

            ]);
        }
    }
}
