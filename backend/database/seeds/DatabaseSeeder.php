<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        // $this->call(UsersTableSeeder::class);

        Schema::disableForeignKeyConstraints();
        $this->call(FestivalsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        Schema::enableForeignKeyConstraints();
    }
}
