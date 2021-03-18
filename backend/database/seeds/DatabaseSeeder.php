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

        Schema::disableForeignKeyConstraints();
        $this->call(ArtistsTableSeeder::class);
        $this->call(ResourcesTableSeeder::class);
        $this->call(ConcertsTableSeeder::class);
        $this->call(EssaysTableSeeder::class);
        $this->call(FestivalsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        Schema::enableForeignKeyConstraints();
      
    }
}
