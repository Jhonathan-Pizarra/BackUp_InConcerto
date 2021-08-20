<?php

namespace Database\Seeders;

use App\Models\Lodging;
use App\Models\Calendar;
use App\Models\Artist;

use Illuminate\Database\Seeder;

class ArtistsTableSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        Artist::truncate(); //truncate es un método mágica

        $faker = \Faker\Factory::create(); //utilizaremos el método crear de Faker

        for ($i=0; $i < 3; $i++) {
            //Llamamos un método estático:
            $artist = Artist::create([
                //Atributos $fillable
                'ciOrPassport' => $faker ->buildingNumber, //Genra LoremIpsum para name, de tipo dateTime
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

            //Un artista puede tener 1 hospedaje,  cualquiera de esos 13 pero solo 1
            $artist->lodgings()->saveMany(
                $faker->randomElements(
                    array(
                        Lodging::find(1),
                        Lodging::find(2),
                        Lodging::find(3)
                    ), $faker->numberBetween(1, 1), false)
            );

            $artist->calendars()->saveMany(
                $faker->randomElements(
                    array(
                        Calendar::find(1),
                        Calendar::find(2),
                        Calendar::find(3)
                    ), $faker->numberBetween(1, 1), false)
            );
        }
    }
}
