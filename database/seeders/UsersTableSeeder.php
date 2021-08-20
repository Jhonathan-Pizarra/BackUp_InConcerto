<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Lodging;
use App\Models\Calendar;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        // Vaciar la tabla
        User::truncate();

        $faker = \Faker\Factory::create();

        // Crear la misma clave para todos los usuarios
        // conviene hacerlo antes del for para que el seeder
        // no se vuelva lento.
        $password = Hash::make('123123');
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@mail.com',
            'password' => $password,
        ]);

        // Generar algunos usuarios para nuestra aplicacion
        for ($i = 0; $i < 3; $i++) {
            $user = User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => $password,
            ]);

            //Un usuario puede tener 1 hospedaje,  cualquiera de esos 3 pero solo 1
            $user->lodgings()->saveMany(
                $faker->randomElements(
                    array(
                        Lodging::find(1),
                        Lodging::find(2),
                        Lodging::find(3)
                    ), $faker->numberBetween(1, 2), false)
            );

            //Un usuario puede tener 1 calendario, cualquiera de esos 7 pero solo 1
            //Si quiero que sea único: // 'artist_id' => $faker -> unique()-> numberBetween(1,10),
            $user->calendars()->saveMany(
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
