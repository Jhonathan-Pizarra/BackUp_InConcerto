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
        $this->call(FeedingPlacesTableSeeder::class);
        $this->call(CalendarsTableSeeder::class);
        $this->call(FeedingsTableSeeder::class);
        $this->call(TransportsTableSeeder::class);
        $this->call(LodgingsTableSeeder::class);
        $this->call(ActivityFestivalsTableSeeder::class);
        $this->call(PlacesTableSeeder::class);
        $this->call(ArtistsTableSeeder::class);
        $this->call(ResourcesTableSeeder::class);
        $this->call(ConcertsTableSeeder::class);
        $this->call(EssaysTableSeeder::class);
        $this->call(FestivalsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        Schema::enableForeignKeyConstraints();


    }
}
